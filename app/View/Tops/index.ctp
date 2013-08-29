
<?php echo $this->Html->image('top.png'); ?>

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
    <tbody>
        <?php foreach($liked_plans as $i => $plan){ ?>
        <tr><td><span class="badge badge-warning"><?php echo ($i + 1) ?>位</span>  <a href="http://ciassff-abq-app000.c4sa.net/Plans/index/<?php echo $plan['id']; ?>" target="_self"><?php echo $plan['title'] ?> </a></td><td><?php echo $plan['area'] ?></td><td><?php echo $plan['user_name'] ?></td></tr>
        <?php } ?>
    </tbody>
    </table>
    </div>

  </div>

</div>
