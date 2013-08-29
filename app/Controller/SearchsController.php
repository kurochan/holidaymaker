<?php

App::uses("Sanitize", "Utility");
class SearchsController extends AppController{
    public function index(){

        $sword = htmlspecialchars($_POST['sword']);
        //$sword = $this->params['url']['sword'];//検索ワード(エリア)獲得
        $sword = Sanitize::stripAll($sword);

        $redis = self::getRedis();
        $plan_id_list = $redis->lrange('plan_id_list', 0, -1);
        $searchd_plans = array();

        foreach($plan_id_list as $plan_id){
            $area = $redis->hmget('plan_'.$plan_id, 'area');
            $area = $area[0];
            if($sword != $area){
                continue;
            }
            $array = $redis->hgetall('plan_'.$plan_id);
            $searchd_plans['id'] = $plan_id;
            array_push($searchd_plans, $array);
        }

        $this->set('plans', $searchd_plans);
        $this->set('search_word', $sword);
    }
}
