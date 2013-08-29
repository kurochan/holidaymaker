<?php

class SearchsController extends AppController{
    public function index($id = null){
    
        App::import("sanitize");
        $sword = '自宅';//$this->params['form']['sword'];//検索ワード(エリア)獲得
        //$sword = Sanitize::stripAll($sword);
        
        /*if(!is_numeric($id)) {
            $this->redirect(array('controller' => 'Tops', 'action' => 'index'));
            return;
        }*/

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
            /*$hash = array();
            for($i = 0; $i < count($array)-1; $i++){
                $hash[$array[$i]] = $array[$i+1];
            }*/
            array_push($searchd_plans, $array);
        }
        
        $this->set('plans', $searchd_plans);
        $this->set('search_word', $sword);
    }
}

?>