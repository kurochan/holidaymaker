<?php

class LoginController extends AppController{

	public function index(){
        if (self::isFBLoggedIn()) {
            $this->redirect(array('controller' => 'Tops', 'action' => 'index'));
        } else {
            $this->Session->write('redirect', $this->referer());
            $facebook = self::getFacebook();
            $this->redirect(self::getFacebook()->getLoginUrl());
        }
    }
}
