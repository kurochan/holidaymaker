<?php

class LoginController extends AppController{

	public function index(){
        if (self::isFBLoggedIn()) {
            $this->Session->write('login', 'true');
            $this->redirect(array('controller' => 'Tops', 'action' => 'index'));
        } else {
            $facebook = self::getFacebook();
            $this->redirect(self::getFacebook()->getLoginUrl());
        }
    }
}
