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
        $id = $this->request->named['id'];
        $like = $this->request->named['like'];

        $redis = self::getRedis();
        $plan = $redis->hget('plan_'.$id, 'title');
        $user_id = $this->Session->read('user_id');
        if(!$id || !$plan || !$user_id){
            $this->redirect('/login?co='.$this->name.'&ac='.$this->action);
            return;
        }
        if($like == 'true'){
            if($redis->sadd('plan_'.$id.'_liked', $user_id)){
                $redis->zincrby('plan_scores', 1, $id);
            } 
            echo "liked";
        }else{
            if($redis->srem('plan_'.$id.'_liked', $user_id)){
                $redis->zincrby('plan_scores', -1, $id);
            }
            echo "unliked";
        }
        $this->redirect($this->webroot.'plans/'.$id);
    }
}
