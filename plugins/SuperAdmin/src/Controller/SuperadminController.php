<?php
declare(strict_types=1);

namespace SuperAdmin\Controller;

use SuperAdmin\Controller\AppController;
use Authentication\PasswordHasher\DefaultPasswordHasher;

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
    }


    public function beforeFilter(\Cake\Event\EventInterface $event)
	{
	    parent::beforeFilter($event);

	    $this->Authentication->allowUnauthenticated(['login','verifyOtp']);
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
	    		// dd($verifyUser);
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

	}


	public function verifyOtp(){
		if ($this->request->is('post')) {
			$user = $this->request->getSession()->read('user');
			$otp = $this->request->getData()['otp'];
			$matchOtp = $this->matchOtp($user['id'], $otp);
    		if($matchOtp){
    			$updateOtp = $this->UsersOtp->query();
				$updateOtp->update()
				    ->set(['status' => 2])
				    ->where(['user_id' => $user['id']])
				    ->execute();
	    		$this->request->getSession()->write(['Auth' => $user]);
	    		$redirect = $this->request->getQuery('redirect', [
		        	'plugin' => 'SuperAdmin',
		            'controller' => 'Superadmin',
		            'action' => 'index',
		        ]);
		        return $this->redirect($redirect);
	    	}
	    	else{
	    		$this->Flash->error('Otp did not match');
	    	}
	    }
	}


	public function matchOtp(int $user_id, string $otp){
		$userByOtp = $this->UsersOtp->find('all')
	    		->where(['UsersOtp.user_id' => $user_id, 'UsersOtp.otp' => $otp])->first()->toArray();
	    $currentTime = strtotime("now");
	   	$expireTime = strtotime('+5 minutes', strtotime($userByOtp['created']));
	    return $userByOtp;
	}

	public function verifyUser(array $data){
		$hash = new DefaultPasswordHasher();
    	$hashedPassword = $hash->hash($data['password']);
    	$user = $this->Users->find('all')
	    		->where(['Users.email' => $data['email']])->first()->toArray();
	    if (password_verify($data['password'], $hashedPassword)) {
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
}
