<?php

class RedistestsController extends AppController{


	public function index(){
        $list = "test-key";
        $redis = self::getRedis();
        $redis->lpush($list, "hoge");
        $redis->lpush($list, "huga");
        $redis->lpush($list, "foo");
        $num= $redis->llen($list);
        echo "データ数：" .$num. "<br>\n";

        for ($i = 0; $i < $num ; $i++) {

            // 先頭から値を取り出す
            echo $redis->lindex($list, $i) . "<br>";

        }    // end of for ($i = 0; $i < $num ; $i++)

        $redis->quit();

        exit();
    }
}
