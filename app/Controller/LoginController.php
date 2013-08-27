<?php

class LoginController extends AppController{

	public function index(){
        $redirectUrl = $this->Session->read('redirect');
        $redirectUrl = $redirectUrl ? $redirectUrl : '/';
        if($this->Session->check('redirect')){
            $this->Session->delete('redirect');
            $this->redirect($redirectUrl);
            return;
        }

        if (self::isFBLoggedIn()) {
            $this->redirect(array('controller' => 'Top', 'action' => 'index'));
        } else {
            $this->Session->write('redirect', $this->referer());
            $facebook = self::getFacebook();
            $this->redirect(self::getFacebook()->getLoginUrl());
        }
    }
}
