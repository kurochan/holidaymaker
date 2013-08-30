<?php

class GenerateController extends AppController{

    public function index(){
        if(!$this->Session->read('login')){
            $this->redirect('/login?co='.$this->name.'&ac='.$this->action);
            return;
        }

        $date = date("Y/M/D");

        $redis = self::getRedis();
        $plan_id = max($redis->lindex('plan_id_list',-1), $redis->lindex('generated_plan_id_list',-1)) + 1;
        $redis->rpush('generated_plan_id_list', $plan_id);
        $title = "ジェネレーター";
        $area = "";
        $person = rand(1, 5);
        $money =2500;
        $user_id = $this->Session->read('user_id');
        $redis->hmset('plan_'.$plan_id,'title',$title,'area',$area,'person',$person,'date',$date,'money',$money,'user_id',$user_id);
        $redis->zadd('plan_scores', 0, $plan_id);

        $len = $redis->llen('action_id_list');
        for ($i = 0; $i < rand(1, 4); $i++) {
            $redis->rpush('plan_'.$plan_id.'_list', $lindex('action_id_list', rand(0, $len)));
        }

        $this->redirect($this->webroot.'plans/'.$id);
    }
}
