<?php

class LoginController extends AppController{

	public function index(){
        $redirect = array('controller' => 'Tops', 'action' => 'index');
        $redirect['controller'] = $this->Session->read('controller') ?
            $this->Session->read('controller') : $redirect['controller'];
        $redirect['action'] = $this->Session->read('action') ?
            $this->Session->read('action') : $redirect['action'];

        if (self::isFBLoggedIn()) {
            $this->Session->write('login', 'true');
            $this->Session->delete('controller');
            $this->Session->delete('action');
            $this->redirect($redirect);
        } else {
            $this->Session->write('controller', $this->params['url']['co']);
            $this->Session->write('action', $this->params['url']['ac']);
            $facebook = self::getFacebook();
            $this->redirect(self::getFacebook()->getLoginUrl());
        }
    }
}
