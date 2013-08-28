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
            $user_check();
            $this->redirect($redirect);
        } else {
            if($this->params['url']['co'] && $this->params['url']['ac']) {
                $this->Session->write('controller', $this->params['url']['co']);
                $this->Session->write('action', $this->params['url']['ac']);
            }
            $facebook = self::getFacebook();
            $this->redirect(self::getFacebook()->getLoginUrl());
        }
    }

    private function user_check() {
        $facebook = self::getFacebook();
        $profile = $facebook->api('/me');
        var_dump($profile);
        exit();
        $id = 1;
        $name = "テスト";
        $redis = self::getRedis();
        $status = $redis->sadd('user_id_set', $id);
        $redis->hset('user_'.$id, 'name', $name);
        return $status ? true : false;
    }
}
