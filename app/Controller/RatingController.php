<?php

class RatingController extends AppController{

	public function index(){
        $this->autoRender = false;
        $id = $this->params['url']['id'];
        $redis = self::getRedis();
        echo $redis->scard('plan_'.$id.'_liked');
    }

	public function post(){
        $this->autoRender = false;
        $id = $this->params['url']['id'];
        $like = $this->params['url']['like'];
        $redis = self::getRedis();
        $plan = $redis->hget('plan_'.$id, 'title');
        $user_id = $this->Session->read('user_id');
        if(!$id || !$plan || !$user_id){
            echo "invalid parameter";
            return;
        }
        if($like == 'true'){
            $redis->sadd('plan_'.$id.'_liked', $user_id);
            echo "liked";
        }else{
            $redis->srem('plan_'.$id.'_liked', $user_id);
            echo "unliked";
        }
    }
}
