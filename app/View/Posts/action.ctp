<div class="posts form">

	<legend><?php echo __('行動プランの登録'); ?></legend>

	<a href="<?php echo $this->Html->url(array('controller' => 'Tops', 'action' => 'index')) ?>"  class="btn btn-info btn" onClick='if (confirm("<?php echo __('行動プランの登録を完了します。よろしいですか') ?>")){ return true; } else { return false; }'></i>&nbsp;<?php echo __('登録終了') ?></a>

	<form action="#" method="post" enctype="multipart/form-data">
 		場所<br>
 		<input type="text" name="place" /><br>
 		何をしたか<br>
 		 <textarea name="text" rows="8" cols="40"></textarea><br>
 		費用<br>
 		<input type="text" name="money" /><br>
 		開始時間&nbsp&nbsp<small>午前9時30分なら"09:30"と入力</small><br>
 		<input type="text" name="stime" /><br>
 		終了時間&nbsp&nbsp<small>午後11時30分なら"23:30"と入力</small><br>
 		<input type="text" name="etime" /><br>
    参考URL&nbsp&nbsp<small>行動プラント関係するURLを入力してください</small><br>
    <input type="text" name="url" /><br>
    関連写真<br>
    <input type="file" name="picture1" size="30" /><br />
    <small>※jpg,jpeg,png,gif形式のみ対応しています</small><br>
    <br>
 	<input type="submit" value="登録" />
	</form>

</div>