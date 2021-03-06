<div class="row">
    <div class="span1">
    </div>
    <div class="span10">
        <?php echo $this->Html->image('top.jpg'); ?>
    </div>
    <div class="span1">
    </div>
</div>

<div class="row">
<div class="span1">
</div>
<div class="span10">
<div class="tabbable"> <!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">新着プラン</a></li>
    <li><a href="#tab2" data-toggle="tab">人気プラン</a></li>
  </ul>
  <div class="tab-content">

    <div class="tab-pane active" id="tab1">
    <table class="table table-bordered table-condensed">
    <thead>
        <tr style="background-color:#f89406"><th>プラン名</th><th>場所</th><th>投稿者</th></tr>
    </thead>
    <tbody>
        <?php foreach($new_plans as $plan){ ?>
        <tr><td><a href="<?php echo $this->webroot ?>Plans/index/<?php echo $plan['id']; ?>" target="_self"><?php echo $plan['title'] ?> </a></td><td><?php echo $plan['area'] ?></td><td><?php echo $plan['user_name'] ?></td></tr>
        <?php } ?>
    </tbody>
    </table>
    </div>

    <div class="tab-pane" id="tab2">
    <table class="table table-bordered table-condensed">
    <thead>
        <tr style="background-color:#4169e1;color:#ffffff;"><th>プラン名</th><th>場所</th><th>投稿者</th></tr>
    </thead>
    <tbody>
        <?php foreach($liked_plans as $i => $plan){ ?>
        <tr><td><span class="badge badge-warning"><?php echo ($i + 1) ?>位</span>&nbsp&nbsp<a href="<?php echo $this->webroot ?>Plans/index/<?php echo $plan['id']; ?>" target="_self"><?php echo $plan['title'] ?>&nbsp&nbsp&nbsp&nbsp&nbsp<span class="label label-info"><?php echo $plan['liked_number']; ?>いいね！</span></a></td><td><?php echo $plan['area'] ?></td><td><?php echo $plan['user_name'] ?></td></tr>
        <?php } ?>
    </tbody>
    </table>
    </div>
  </div>
</div>
</div>
<div class="span1">
</div>
</div>
