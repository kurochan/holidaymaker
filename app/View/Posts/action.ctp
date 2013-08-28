<div class="posts form">

	<legend><?php echo __('行動プランの登録'); ?></legend>

	<a href="<?php echo $this->Html->url(array('controller' => 'Tops', 'action' => 'index')) ?>"  class="btn btn-info btn" onClick='if (confirm("<?php echo __('行動プランの登録を完了します。よろしいですか') ?>")){ return true; } else { return false; }'></i>&nbsp;<?php echo __('登録終了') ?></a>

	<form action="#" method="post">
 		場所<br>
 		<input type="text" name="place" /><br>
 		何をしたか<br>
 		 <textarea name="text" rows="8" cols="40"></textarea><br>
 		費用<br>
 		<input type="text" name="money" /><br>
 		開始時間<br>
 		<input type="text" name="stime" /><br>
 		終了時間<br>
 		<input type="text" name="etime" /><br>
 	<input type="submit" value="登録" />
	</form>

</div>




<!--<div class="posts form">
<?php echo $this->Form->create('Project'); ?>
  <fieldset>
    <legend><?php echo __('行動プランの登録'); ?></legend>
  <?php
    echo $this->Form->input('place',array('label' => '場所'));
    echo $this->Form->input('start',array('label' => '開始時間'));
    echo $this->Form->input('end',array('label' => '終了時間'));
    echo $this->Form->input('detail',array('type' => 'textarea','label' => '詳細'));
    echo $this->Form->input('price',array('label' => '費用'));
  ?>
  </fieldset>
<?php echo $this->Form->end(__('登録完了')); ?>
<?php echo $this->Form->end(__('もう1件追加')); ?>
</div>