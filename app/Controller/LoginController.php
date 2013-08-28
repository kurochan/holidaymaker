<?php

class LoginController extends AppController{

	public function index(){
        if ($this->Session->read('login') || self::isFBLoggedIn()) {
            $this->redirect(array('controller' => 'Tops', 'action' => 'index'));
            $this->Session->write('login', 'true');
        } else {
            $facebook = self::getFacebook();
            $this->redirect(self::getFacebook()->getLoginUrl());
        }
    }
}
