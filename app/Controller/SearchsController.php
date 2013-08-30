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
            $area = $redis->hget('plan_'.$plan_id, 'area');
            $title = $redis->hget('plan_'.$plan_id, 'title');
            if(!strstr($sword, $area) && !strstr($sword, $title)){
                continue;
            }
            $array = $redis->hgetall('plan_'.$plan_id);
            $array['id'] = $plan_id;
            array_push($searchd_plans, $array);
        }

        $this->set('plans', $searchd_plans);
        $this->set('search_word', $sword);
    }
}
