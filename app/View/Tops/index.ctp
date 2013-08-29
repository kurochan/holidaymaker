<?php echo $this->Html->image('top.png'); ?>

<div class="tabbable"> <!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">新着プラン</a></li>
    <li><a href="#tab2" data-toggle="tab">人気プラン</a></li>
    <li><a href="#tab3" data-toggle="tab">新着レビュー</a></li>
  </ul>
  <div class="tab-content">

    <div class="tab-pane active" id="tab1">
    <table class="table table-bordered table-condensed">
    <thead>
        <tr><th>場所</th><th>プラン名</th><th>投稿者</th></tr>
    </thead>
    <tbody>
        <?php foreach($new_plans as $plan){ ?>
        <tr><td><?php echo $plan['area'] ?></td><td><?php echo $plan['title'] ?></td><td><?php echo $plan['user_name'] ?></td></tr>
        <?php } ?>
    </tbody>
    </table>
    </div>

    <div class="tab-pane" id="tab2">
    <table class="table table-bordered table-condensed">
    <tbody>
        <tr><td><span class="badge badge-warning">1位</span></td></tr>
        <tr><td>データ１－１</td></tr>
        <tr><td><span class="badge badge-info">2位</td></tr>
        <tr><td>データ２－１</td></tr>
        <tr><td><span class="badge badge-success">3位</td></tr>
        <tr><td>データ３－１</td></tr>
    </tbody>
    </table>
    </div>

    <div class="tab-pane" id="tab3">
    <table class="table table-bordered table-condensed">
    <thead>
        <tr><th>投稿者名</th><th>レピュー</th></tr>
    </thead>
    <tbody>
        <tr><td>データ１－１</td><td>データ１－２</td></tr>
        <tr><td>データ２－１</td><td>データ２－２</td></tr>
        <tr><td>データ３－１</td><td>データ３－２</td></tr>
    </tbody>
    </table>
    </div>

  </div>

</div>

<!--<h3>新着プラン</h3>
<table class="table table-bordered table-condensed">
    <thead>
        <tr><th>プラン名</th><th>場所</th><th>投稿者</th></tr>
    </thead>
    <tbody>
        <tr><td>データ１－１</td><td>データ１－２</td><td>データ１－３</td></tr>
        <tr><td>データ２－１</td><td>データ２－２</td><td>データ２－３</td></tr>
        <tr><td>データ３－１</td><td>データ３－２</td><td>データ３－３</td></tr>
    </tbody>
</table>

<h3>人気プラン</h3>
<table class="table table-bordered table-condensed">
    <tbody>
        <tr><td><span class="badge badge-warning">1位</span></td></tr>
        <tr><td>データ１－１</td></tr>
        <tr><td><span class="badge badge-info">2位</td></tr>
        <tr><td>データ２－１</td></tr>
        <tr><td><span class="badge badge-success">3位</td></tr>
        <tr><td>データ３－１</td></tr>
    </tbody>
</table>

<h3>新着レビュー</h3>
<table class="table table-bordered table-condensed">
    <thead>
        <tr><th>投稿者名</th><th>レピュー</th></tr>
    </thead>
    <tbody>
        <tr><td>データ１－１</td><td>データ１－２</td></tr>
        <tr><td>データ２－１</td><td>データ２－２</td></tr>
        <tr><td>データ３－１</td><td>データ３－２</td></tr>
    </tbody>
</table>
