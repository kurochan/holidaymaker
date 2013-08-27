<?php

class LoginController extends AppController{

	public function index(){
        $facebook = self::getFacebook();
        $user = $facebook->getUser();
        if ($user) {
            try {
                //ログインしていたら、自分のユーザプロファイルを取得
                $user_profile = $facebook->api('/me');
                echo "OK!";

            } catch (FacebookApiException $e) {
                //ユーザプロファイル取得失敗 = ログインしていない
                $user = null;
                echo "NO!";
            }
        } else {
            echo "<a href=\"".$facebook->getLoginUrl()."\">login!</a>";
        }
        exit();
    }

    private function isFBLoggedIn(){
    }
}
