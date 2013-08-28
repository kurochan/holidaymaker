<div class="posts form">
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