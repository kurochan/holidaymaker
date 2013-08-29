<?php

class PostsController extends AppController{

	public function plan(){
        if(!$this->Session->read('login')){
            $this->redirect('/login?co='.$this->name.'&ac='.$this->action);
            return;
        }
		
		$date = date("Y/M/D");
		
		if($this->request->isPost() || $this->request->isPut()){

			$redis = self::getRedis();
			$id = $redis->lindex('plan_id_list',-1)+1;
			$redis->rpush('plan_id_list',$id);
            $title = htmlspecialchars($_POST['title']);
            $area = htmlspecialchars($_POST['area']);
            $person = htmlspecialchars($_POST['person']);
            //$date = htmlspecialchars($_POST['date']);
            $money = htmlspecialchars($_POST['money']);
            $user_id = $this->Session->read('user_id');
			$redis->hmset('plan_'.$id,'title',$title,'area',$area,'person',$person,'date',$date,'money',$money,'user_id',$user_id);

			$this->Session->setFlash(__('プランを登録しました.'),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
			);
			$this->redirect(array('controller' => 'posts', 'action' => 'action', 'plan_id' => $id));
		}
	}

	public function action(){
        if(!$this->Session->read('login')){
            $this->redirect('/login?co='.$this->name.'&ac='.$this->name);
            return;
        }

		$plan_id = $this->request->named['plan_id'];
		$file_path = $this->webroot.'img/spot';
		$this->set('file_path',$file_path);
		
		if(!empty($plan_id)){

			if($this->request->isPost() || $this->request->isPut()){

				$redis = self::getRedis();
				$id = $redis->lindex('action_id_list',-1)+1;
                $place = htmlspecialchars($_POST['place']);
                $text = htmlspecialchars($_POST['text']);
                $money = htmlspecialchars($_POST['money']);
                $stime = htmlspecialchars($_POST['stime']);
                $etime = htmlspecialchars($_POST['etime']);
                $picture1 =  $_FILES["picture1"]["name"];

                //拡張子チェック
                $extension = pathinfo($picture1, PATHINFO_EXTENSION);
                if($extension == "jpg" or $extension == "jpeg" or $extension == "gif" or $extension == "png") {
                switch($extension){
                	case "jpg":
                		$pic = move_uploaded_file($_FILES["picture1"]["tmp_name"], WWW_ROOT.'img/spot/action_'.$id.'.jpg');
                		break;
                	case "png":
                		$pic = move_uploaded_file($_FILES["picture1"]["tmp_name"], WWW_ROOT.'img/spot/action_'.$id.'.png');
                		break;
                	case "gif":
                		$pic = move_uploaded_file($_FILES["picture1"]["tmp_name"], WWW_ROOT.'img/spot/action_'.$id.'.gif');
                		break;
                	case "jpeg":
                		$pic = move_uploaded_file($_FILES["picture1"]["tmp_name"], WWW_ROOT.'img/spot/action_'.$id.'.jpeg');
                		break;
                }
				$redis->rpush('action_id_list',$id);
				$redis->hmset('action_'.$id,'plan_id',$plan_id,'place',$place,'text',$text,'money',$money,'stime',$stime,'etime',$etime,'image','action_'.$id.'.'.$extension);
				$redis->rpush('plan_'.$plan_id.'_list',$id);

				$this->Session->setFlash(__('行動プランを登録しました.'),
						'alert',
						array(
							'plugin' => 'TwitterBootstrap',
							'class' => 'alert-success'
						)
				);
				$this->redirect(array('controller' => 'posts', 'action' => 'action', 'plan_id' => $plan_id));

				}else{
					$this->Session->setFlash(__('画像の拡張子を確認してください.'),
						'alert',
						array(
							'plugin' => 'TwitterBootstrap',
							'class' => 'alert-error'
						)
				);
				$this->redirect(array('controller' => 'posts', 'action' => 'action', 'plan_id' => $plan_id));
				}
			}
		}
		else
		{

			$this->Session->setFlash(__('まずはプランをしてください.'),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
			);
			$this->redirect(array('controller' => 'posts', 'action' => 'plan'));
		}
	}

}

