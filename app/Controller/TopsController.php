<?php

class TopsController extends AppController{

    public function index(){
        $this->set('new_plans', self::getNew());
    }

    private function getNew(){
        $redis = self::getRedis();
        $plan_id_list = $redis->lrange('plan_id_list', -3, -1);
        $plans = array();
        foreach($plan_id_list as $plan_id){
            $plan = $redis->hgetall('plan_'.$plan_id); 
            $plan['id'] = $plan_id;
            $plan['user_name'] = $redis->hget('user_'.$plan['user_id'], 'name');
            array_unshift($plans, $plan);
        }
        return $plans;
    }
}
