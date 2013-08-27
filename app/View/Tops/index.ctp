<!--<div class="hero-unit">
    <h1>holidaymaker</h1>
    <h3>〜あなたの休日を本物に〜</h3>
</div>-->

<div class="row">
    <div class="span4">
        <form class="form-search">
            <input type="text" class="input-medium search-query"  value="キーワードで検索">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
</div>

<?php echo $this->Html->image('top.png'); ?>

<h3>新着プラン</h3>
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