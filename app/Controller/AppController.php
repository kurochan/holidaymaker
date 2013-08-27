<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');
App::import('Vendor', 'predis/autoload');
App::import('Vendor', 'facebook-php-sdk/src/facebook');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    private static $redis;
    private static $facebook;

    public static function getRedis() {
        if (is_null(self::$redis)) {
            self::$redis = new Predis\Client(Configure::read('redis-client'));
            self::$redis->auth(Configure::read('redis-auth'));
        }
        return self::$redis;
    }

    public static function getFacebook() {
        self::$facebook = new Facebook(array(
            'appId'  => Configure::read('fb-app-id'),
            'secret' => Configure::read('fb-secret'),
        ));
        return self::$facebook;
    }

    public static function isFBLoggedIn() {
        $facebook = self::getFacebook();
        $user = $facebook->getUser();
        if ($user) {
            try {
                return true;
            } catch (FacebookApiException $e) {
                $user = null;
                echo "Facebook認証に失敗しました。";
                exit();
            }
        } else {
            return false;
        }
    }
}
