<div class="posts form">
<?php echo $this->Form->create('Project'); ?>
  <fieldset>
    <legend><?php echo __('プランの新規投稿'); ?></legend>
  <?php
    echo $this->Form->input('name',array('label' => 'プラン名'));
    echo $this->Form->input('spot',array('label' => '地域'));
    echo $this->Form->input('people',array('label' => '人数'));
    echo $this->Form->input('price',array('label' => '費用'));
  ?>
  </fieldset>
<?php echo $this->Form->end(__('次へ')); ?>
</div>