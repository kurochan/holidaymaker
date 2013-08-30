<?php

class TopsController extends AppController{

    public function index(){
        
        $this->set('new_plans', self::getNew());
        $this->set('liked_plans', self::getMostLiked());
        
    }

    private function getNew(){
        $redis = self::getRedis();
        $plan_id_list = $redis->lrange('plan_id_list', -6, -1);
        $plans = array();
        foreach($plan_id_list as $plan_id){
            $plan = $redis->hgetall('plan_'.$plan_id); 
            $plan['id'] = $plan_id;
            $plan['user_name'] = $redis->hget('user_'.$plan['user_id'], 'name');
            array_unshift($plans, $plan);
        }
        return $plans;
    }

    private function getMostLiked(){
        $redis = self::getRedis();
        $plan_id_list = $redis->zrevrange('plan_scores', 0, 6);
        $plans = array();
        foreach($plan_id_list as $plan_id){
            $plan = $redis->hgetall('plan_'.$plan_id); 
            $plan['id'] = $plan_id;
            $plan['user_name'] = $redis->hget('user_'.$plan['user_id'], 'name');
            $plan['liked_number'] = $redis->scard('plan_'.$plan_id.'_liked');
            array_push($plans, $plan);
        }
        return $plans;
    }
}
