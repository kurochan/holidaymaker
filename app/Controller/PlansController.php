<?php

class PlansController extends AppController{
    public function index($id = null){
        if(!is_numeric($id)) {
            $this->redirect(array('controller' => 'Tops', 'action' => 'index'));
            return;
        }

        $redis = self::getRedis();
        $plan = $redis->hmget('plan_'.$id, 'title', 'area', 'person', 'date', 'money');
        if(!$plan || !$plan[0]) {
            $this->redirect(array('controller' => 'Tops', 'action' => 'index'));
            return;
        }

        $action_id_list = $redis->lrange('plan_'.$id.'_list', 0, -1);
        $actions = array();
        foreach($action_id_list as $action_id) {
            array_push($actions, $redis->hgetall('action_'.$action_id));
        }

        $this->set('title', $plan[0]);
        $this->set('area', $plan[1]);
        $this->set('person', $plan[2]);
        $this->set('date', $plan[3]);
        $this->set('money', $plan[4]);
        $this->set('plan', $actions);
        $this->set('liked', self::liked($id));
        $tihs->set('liked_number', $redis->scard('plan_'.$id.'_liked');
    }

    private function liked($id){
        if(!$this->Session->read('login')){
            return false;    
        }
        $user_id = $this->Session->read('user_id');
        $redis = self::getRedis();
        return $redis->sismember('plan_'.$id.'_liked', $user_id) ? true : false;
    }
}
