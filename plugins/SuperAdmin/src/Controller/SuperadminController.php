<?php
declare(strict_types=1);

namespace SuperAdmin\Controller;

use SuperAdmin\Controller\AppController;
use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\I18n\FrozenTime;

/**
 * Superadmin Controller
 *
 * @method \SuperAdmin\Model\Entity\Superadmin[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SuperadminController extends AppController
{	

	public function initialize(): void
    {	
    	parent::initialize();
        $this->loadModel('Users');
        $this->loadModel('SuperAdmin.UsersOtp');
        $this->loadModel('SuperAdmin.UserLoginAttempt');
        $this->loadModel('SuperAdmin.PasswordReset');
    }


    public function beforeFilter(\Cake\Event\EventInterface $event)
	{
	    parent::beforeFilter($event);

	    $this->Authentication->allowUnauthenticated(['login','verifyOtp','forgotPassword', 'resetPassword']);
	}

    public function login()
	{	
		// $user = $this->Users->newEntity();
		$user = $this->Users->newEmptyEntity();
		$result = $this->Authentication->getResult();
	    // If the user is logged in send them away.
	    if ($result->isValid()) {
	    	$redirect = $this->request->getQuery('redirect', [
	        	'plugin' => 'SuperAdmin',
	            'controller' => 'Superadmin',
	            'action' => 'index',
	        ]);
	        return $this->redirect($redirect);
	    }

	    // if login form is submitted
		if ($this->request->is('post')) {
			$data = $this->request->getData();
	    	$user = $this->Users->patchEntity($user, $data,['validate' => 'login']);
	    	if(!$user->getErrors()){
	    		$verifyUser = $this->verifyUser($data);
		    	if($verifyUser){
		    		$this->saveUserLoginAttempt($verifyUser->id);
		    		// save otp for login
		    		$otpSaveSuccess = $this->saveUsersOtp($verifyUser->id, $verifyUser->email);
		    		if($otpSaveSuccess['status'] == 'success'){
		    			$text = "Your OTP is ".$otpSaveSuccess['otp']." and is valid for next 5 minutes";
						$this->sendmail($verifyUser->email, "OTP", $template=null, $text);
			    		$this->request->getSession()->write(['user' => $verifyUser->toArray()]);
			    		$redirect = $this->request->getQuery('redirect', [
				        	'plugin' => 'SuperAdmin',
				            'controller' => 'Superadmin',
				            'action' => 'verifyOtp',
				        ]);
				        return $this->redirect($redirect);
			    	}
			    	else{
			    		$this->Flash->error('Could not send OTP');
			    	}
		    	}
		    	else{
		    		$this->Flash->error('Username and password does not match');
		    	}
	    	}
	    	

		}
		$this->set('user', $user);
	}


	public function saveUserLoginAttempt(int $user_id){
		$userLoginAttempt = $this->UserLoginAttempt->newEmptyEntity();
		$userLoginAttempt->user_id = $user_id;
		$this->UserLoginAttempt->save($userLoginAttempt);
		
	}

	public function saveUsersOtp($user_id,$user_email){
		$result = [];
		$updateOtp = $this->UsersOtp->query();
		$updateOtp->update()
		    ->set(['status' => 0])
		    ->where(['user_id' => $user_id])
		    ->execute();
		$otp = $this->generateNumericOTP(6);
		$usersOtp = $this->UsersOtp->newEmptyEntity();
		$usersOtp->user_id = $user_id;
		$usersOtp->otp = $otp;
		$usersOtp->status = 1;
		if ($this->UsersOtp->save($usersOtp)) {
			$result['otp']= $otp;
			$result['status'] = 'success';
		}
		else{
			$result['status'] = 'fail';
		}
		return $result;
	}

	public function generateNumericOTP($n) { 
		
		$generator = "1357902468"; 
		$result = ""; 
		for ($i = 1; $i <= $n; $i++) { 
			$result .= substr($generator, (rand()%(strlen($generator))), 1); 
		} 
		return $result; 
	} 

	


	public function index(){
		// dd($this->Authentication->getIdentity());
		// dd($this->request->getSession()->read('Auth'));
		// dd($identity->get('email'));
	}


	public function verifyOtp(){
		if(!$this->request->getSession()->read('user')){
			$redirect = $this->request->getQuery('redirect', [
	        	'plugin' => 'SuperAdmin',
	            'controller' => 'Superadmin',
	            'action' => 'login',
	        ]);
	        return $this->redirect($redirect);
		}
		$usersOtp = $this->UsersOtp->newEmptyEntity();
		if ($this->request->is('post')) {
			$user = $this->request->getSession()->read('user');
			$otp = $this->request->getData()['otp'];
			$usersOtp = $this->UsersOtp->patchEntity($usersOtp, $this->request->getData());
			if(!$usersOtp->getErrors()){
				$matchOtp = $this->matchOtp($user['id'], $otp);
	    		if($matchOtp == 'success'){
	    			$updateOtp = $this->UsersOtp->query();
					$updateOtp->update()
					    ->set(['status' => 2])
					    ->where(['user_id' => $user['id'], 'otp' => $otp])
					    ->execute();
					$this->request->getSession()->destroy();
		    		$this->request->getSession()->write(['Auth' => $user]);
		    		$action = 'index';
		    	}
		    	else if($matchOtp == 'expired'){
		    		$action = 'login';
		    	}
		    	else{
		    		$action = 'verifyOtp';
		    	}
		    	$redirect = $this->request->getQuery('redirect', [
		        	'plugin' => 'SuperAdmin',
		            'controller' => 'Superadmin',
		            'action' => $action,
		        ]);
		        return $this->redirect($redirect);
		    }
	    }
	    $this->set('usersOtp', $usersOtp);
	}


	public function matchOtp(int $user_id, string $otp){
		$result = 0;
		$userByOtp = $this->UsersOtp->find('all')
	    		->where(['UsersOtp.user_id' => $user_id, 'UsersOtp.otp' => $otp, 'UsersOtp.status' => 1])->first();
	    if($userByOtp){
	    	$currentTime = strtotime("now");
		    $expireTime = strtotime('+5 minutes', strtotime($userByOtp->created->format('Y-m-d H:i:s')));
		   	if($currentTime <= $expireTime){
		   		$result = 'success';
		   	}
		   	else if($currentTime > $expireTime){
		   		$updateOtp = $this->UsersOtp->query();
				$updateOtp->update()
				    ->set(['status' => 3])
				    ->where(['user_id' => $user_id, 'otp' => $otp])
				    ->execute();
		   		$result = 'expired';
		   		$this->Flash->error('OTP expired');
		   	}
		   	else{
		   		$result = 'fail';
		   		$this->Flash->error('OTP did not match');
		   	}
	    }
	    else{
	    	$result = 'fail';
	    	$this->Flash->error('OTP did not match');
	    }
	    
	    return $result;
	}

	public function verifyUser(array $data){
		$user = $this->Users->find('all')
	    		->where(['Users.email' => $data['email']])->first();
	    if ($user && password_verify($data['password'], $user->password)) {
	    	$result = $user;
		} else {
		    $result = [];
		}
		return $result;
	}

	public function logout()
	{
	    $result = $this->Authentication->getResult();
	    if ($result->isValid()) {
	        $this->Authentication->logout();
	        $redirect = $this->request->getQuery('redirect', [
	        	'plugin' => 'SuperAdmin',
	            'controller' => 'Superadmin',
	            'action' => 'login',
	        ]);
			return $this->redirect($redirect);
	    }
	}


	public function forgotPassword(){
		$passwordReset = $this->PasswordReset->newEmptyEntity();
		if ($this->request->is('post')) {
			$data = $this->request->getData();
			$user = $this->Users->find('all')
	    		->where(['Users.email' => $data['email']])->first();
	    	if(!$user){
	    		$this->Flash->error('Email does not exist');
	    	}
	    	else{
	    		$updateToken = $this->PasswordReset->query();
				$updateToken->update()
				    ->set(['status' => 0])
				    ->where(['email' => $data['email'], 'status' => 1])
				    ->execute();
				$token = md5($data['email']).rand(10,999999999);
				$passwordReset->email = $data['email'];
				$passwordReset->token = $token;
				$passwordReset->status = 1;
				$passwordReset = $this->PasswordReset->patchEntity($passwordReset, $passwordReset->toArray());
				if($this->PasswordReset->save($passwordReset)){
					$text = "Please click the following link to reset your password. <br>http://".$_SERVER['HTTP_HOST']."/super-admin/reset-password/".$token;
					$this->sendmail($data['email'], "OTP", $template=null, $text);
					$this->Flash->success('A reset link has been sent to your mail');
				}
				else{
					$this->Flash->error('Could not reset password. Please try again later');
				}
	    	}
			
		}
		$this->set('passwordReset', $passwordReset);
	}


	public function resetPassword($token){
		$user = $this->Users->newEmptyEntity();
		$resetSuccess = $this->resetPasswordCheck($token);
		$action = '';
		if($resetSuccess['status'] == 'expired'){
			$this->Flash->error('Token expired');
			$action = 'login';
		}
		elseif($resetSuccess['status'] == 'fail'){
			$this->Flash->error('Invalid link');
			$action = 'login';
		}
		elseif ($resetSuccess['status'] == 'success' && $this->request->is('post')) {
			$data = $this->request->getData();
			if($data['new_password'] =='' || $data['confirm_password'] == ''){
				$this->Flash->error('Password cannot be null');
			}
			elseif( $data['new_password'] !== $data['confirm_password']){
				$this->Flash->error('Password do not match');
			}
			else{
				if($resetSuccess['status'] == 'success'){
					$hash = new DefaultPasswordHasher();
	    			$hashedPassword = $hash->hash($data['new_password']);
					$updateUser = $this->Users->query();
					$updateUser->update()
					    ->set(['password' => $hashedPassword])
					    ->where(['email' => $resetSuccess['email']])
					    ->execute();
					$this->Flash->success('Password reset successfull');
					$action = 'login';
				}
				elseif($resetSuccess['status'] == 2){
					$this->Flash->error('Token expired');
					$action = 'resetPassword';
				}
			}

		}

		if($action != ''){
			$redirect = $this->request->getQuery('redirect', [
	        	'plugin' => 'SuperAdmin',
	            'controller' => 'Superadmin',
	            'action' => $action,
	        ]);
			return $this->redirect($redirect);
		}
		$this->set('user', $user);
	}


	public function resetPasswordCheck($token){
		$result = [];
		$resetPass = $this->PasswordReset->find('all')
    		->where(['PasswordReset.token' => $token])->first();
    	if(is_null($resetPass)){
    		$result['status'] = 'fail';
    	}
    	else{
    		$currentTime = strtotime("now");
		    $expireTime = strtotime('+5 minutes', strtotime($resetPass->created->format('Y-m-d H:i:s')));
		   	if($currentTime <= $expireTime){
		   		$result['status'] = 'success';
		   		$result['email'] = $resetPass->email;
		   		$status = 2;
		   	}
		   	else if($currentTime > $expireTime){
		   		$result['status'] = 'expired';
		   		$status = 3;
		   	}
		   	else{
		   		$result['fail'] = 'fail';
		   	}
		   	$updatePassReset = $this->PasswordReset->query();
			$updatePassReset->update()
			    ->set(['status' => $status])
			    ->where(['token' => $token])
			    ->execute();
    	}
    	
	    return $result;
	}
}
