<?php

class LoginController extends AppController{

	public function index(){
        if($this->Session->check('redirect')){
            $redirectUrl = $this->Session->read('redirect');
            $redirectUrl = $redirectUrl ? $redirectUrl : '/';
            $this->Session->delete('redirect');
            $this->redirect($redirectUrl);
            return;
        }

        if (self::isFBLoggedIn()) {
            echo "OK!";
        } else {
            $this->Session->write('redirect', $this->referer());
            $facebook = self::getFacebook();
            $this->redirect(self::getFacebook()->getLoginUrl());
        }
    }
}
