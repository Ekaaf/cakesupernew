<?php
declare(strict_types=1);

namespace SuperAdmin\Controller;
use Cake\Mailer\Mailer;
use App\Controller\AppController as BaseController;

class AppController extends BaseController
{
	public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');
        $this->viewBuilder()->setLayout('SuperAdmin.superadmin');

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->allowUnauthenticated(['login','verifyOtp','forgotPassword', 'resetPassword']);
    }

    public function sendmail($to, $subject, $template=null, $text)
    {   
        $mailer = new Mailer('default');
        $mailer->setTransport('gmail');
        $mailer->setFrom(['developer.lalsobuj@gmail.com' => 'Red-Graduation'])
            ->setTo($to)
            ->setSubject($subject)
            ->deliver($text);
        
    }
}
