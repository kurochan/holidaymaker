<?php

class PostsController extends AppController{

	//public $uses = array('Post');

	public function plan(){

		$date = date("Y/M/D");
		
		if($this->request->isPost() || $this->request->isPut()){

			$redis = self::getRedis();
			$id = $redis->lindex('plan_id_list',-1)+1;
			$redis->rpush('plan_id_list',$id);
			$redis->hmset('plan_'.$id,'title',$_POST['title'],'area',$_POST['area'],'person',$_POST['person'],'date',$date,'money',$_POST['money']);

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

		$plan_id = $this->request->named['plan_id'];
		
		if(!empty($plan_id)){

			if($this->request->isPost() || $this->request->isPut()){

				$redis = self::getRedis();
				$id = $redis->lindex('action_id_list',-1)+1;
				$redis->rpush('action_id_list',$id);
				$redis->hmset('action_'.$id,'plan_id',$plan_id,'place',$_POST['place'],'text',$_POST['text'],'money',$_POST['money'],'stime',$_POST['stime'],'etime',$_POST['etime']);
				$redis->rpush('plan_'.$plan_id.'_list',$id);

				$this->Session->setFlash(__('行動プランを登録しました.'),
						'alert',
						array(
							'plugin' => 'TwitterBootstrap',
							'class' => 'alert-success'
						)
				);
				$this->redirect(array('controller' => 'posts', 'action' => 'action', 'plan_id' => $plan_id));

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