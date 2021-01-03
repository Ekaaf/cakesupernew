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
		if ($this->request->is('post')) {
	    	$data = $this->request->getData();
	    	$verifyUser = $this->verifyUser($data);
	    	if(count($verifyUser)>0){
	    		$this->saveUserLoginAttempt($verifyUser['id']);
	    		$otpSaveSuccess = $this->saveUsersOtp($verifyUser['id']);
	    		if($otpSaveSuccess){
		    		$this->request->getSession()->write(['user' => $verifyUser]);
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
	    		$this->Flash->error('Invalid username or password');
	    	}

		}
	}


	public function saveUserLoginAttempt(int $user_id){
		$userLoginAttempt = $this->UserLoginAttempt->newEmptyEntity();
		$userLoginAttempt->user_id = $user_id;
		$this->UserLoginAttempt->save($userLoginAttempt);
		
	}


	
	public function generateNumericOTP($n) { 
		
		$generator = "1357902468"; 
		$result = ""; 
		for ($i = 1; $i <= $n; $i++) { 
			$result .= substr($generator, (rand()%(strlen($generator))), 1); 
		} 
		return $result; 
	} 

	public function saveUsersOtp($user_id){
		
		$updateOtp = $this->UsersOtp->query();
		$updateOtp->update()
		    ->set(['status' => 0])
		    ->where(['user_id' => $user_id])
		    ->execute();

		$usersOtp = $this->UsersOtp->newEmptyEntity();
		$usersOtp->user_id = $user_id;
		$usersOtp->otp = $this->generateNumericOTP(6);
		$usersOtp->status = 1;
		if ($this->UsersOtp->save($usersOtp)) {
			return 1;
		}
		else{
			return 0;
		}
    }


	public function index(){
		// dd($this->Authentication->getIdentity());
		// dd($this->request->getSession()->read('Auth'));
		// dd($identity->get('email'));
	}


	public function verifyOtp(){
		if ($this->request->is('post')) {
			$user = $this->request->getSession()->read('user');
			$otp = $this->request->getData()['otp'];
			$matchOtp = $this->matchOtp($user['id'], $otp);
    		if($matchOtp == 1){
    			$updateOtp = $this->UsersOtp->query();
				$updateOtp->update()
				    ->set(['status' => 2])
				    ->where(['user_id' => $user['id'], 'otp' => $otp])
				    ->execute();
	    		$this->request->getSession()->write(['Auth' => $user]);
	    		$redirect = $this->request->getQuery('redirect', [
		        	'plugin' => 'SuperAdmin',
		            'controller' => 'Superadmin',
		            'action' => 'index',
		        ]);
		        return $this->redirect($redirect);
	    	}
	    	else if($matchOtp == 2){
	    		$redirect = $this->request->getQuery('redirect', [
		        	'plugin' => 'SuperAdmin',
		            'controller' => 'Superadmin',
		            'action' => 'login',
		        ]);
		        return $this->redirect($redirect);
	    	}
	    	else{
	    		$redirect = $this->request->getQuery('redirect', [
		        	'plugin' => 'SuperAdmin',
		            'controller' => 'Superadmin',
		            'action' => 'login',
		        ]);
		        return $this->redirect($redirect);
	    	}
	    }
	}


	public function matchOtp(int $user_id, string $otp){
		$result = 0;
		$userByOtp = $this->UsersOtp->find('all')
	    		->where(['UsersOtp.user_id' => $user_id, 'UsersOtp.otp' => $otp, 'UsersOtp.status' => 1])->first()->toArray();
	    $currentTime = strtotime("now");
	    $expireTime = strtotime('+5 minutes', strtotime($userByOtp['created']->format('Y-m-d H:i:s')));
	   	if($currentTime <= $expireTime){
	   		$result = 1;
	   	}
	   	else if($currentTime > $expireTime){
	   		$updateOtp = $this->UsersOtp->query();
			$updateOtp->update()
			    ->set(['status' => 3])
			    ->where(['user_id' => $user_id, 'otp' => $otp])
			    ->execute();
	   		$result = 2;
	   	}
	   	else{
	   		$result = 0;
	   	}
	    return $result;
	}

	public function verifyUser(array $data){
		$hash = new DefaultPasswordHasher();
    	$hashedPassword = $hash->hash($data['password']);
    	$user = $this->Users->find('all')
	    		->where(['Users.email' => $data['email']])->first()->toArray();
	    if (password_verify($data['password'], $user['password'])) {
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
		if ($this->request->is('post')) {
			$data = $this->request->getData();
			$updateToken = $this->PasswordReset->query();
			$updateToken->update()
			    ->set(['status' => 0])
			    ->where(['email' => $data['email'], 'status' => 1])
			    ->execute();
			$passwordReset = $this->PasswordReset->newEmptyEntity();
			$passwordReset->email = $data['email'];
			$passwordReset->token = md5($data['email']).rand(10,999999999);
			$passwordReset->status = 1;
			if($this->PasswordReset->save($passwordReset)){
				dd('password sent');
			}
			else{

			}
		}
	}


	public function resetPassword($token){
		$resetSuccess = $this->resetPasswordCheck($token);
		if($resetSuccess['success'] == 2){
			$this->Flash->error('Token expired');
		}
		elseif($resetSuccess['success'] == 1){
			$this->Flash->error('Invalid Token');
		}
		if ($this->request->is('post')) {
			$result = 0;
			$data = $this->request->getData();
			if($resetSuccess['success'] == 1){
				$hash = new DefaultPasswordHasher();
    			$hashedPassword = $hash->hash($data['new_password']);
				$updateUser = $this->Users->query();
				$updateUser->update()
				    ->set(['password' => $hashedPassword])
				    ->where(['email' => $resetSuccess['email']])
				    ->execute();
				$this->Flash->error('Password changed successfull');
			}
			elseif($resetSuccess['success'] == 2){
				$this->Flash->error('Password changed error');
			}
		}
	}


	public function resetPasswordCheck($token){
		$result = [];
		$resetPass = $this->PasswordReset->find('all')
    		->where(['PasswordReset.token' => $token])->first();
    	if(is_null($resetPass)){
    		$result['success'] = 0;
    	}
    	else{
    		$currentTime = strtotime("now");
		    $expireTime = strtotime('+5 minutes', strtotime($resetPass->created->format('Y-m-d H:i:s')));
		   	if($currentTime <= $expireTime){
		   		$result['success'] = 1;
		   		$result['email'] = $resetPass['email'];
		   		$status = 2;
		   	}
		   	else if($currentTime > $expireTime){
		   		$result['success'] = 2;
		   		$status = 3;
		   	}
		   	else{
		   		$result['success'] = 0;
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
