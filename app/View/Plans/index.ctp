<h1> <?php echo $title ?> </h1> <br>

    <div class="row">
        <div class="span4 offset6">
            <div class="span1 badge badge-info"> <font size="+1"><?php echo $area; ?></font></div>
            <div class="span1 badge badge-success"><font size="+1"><?php echo $person; ?>人</font></div>
            <div class="span1 badge badge-warning"><font size="+1"><?php echo $money; ?>円</font></div>
        </div>
     </div>

<br><br><br><br>

<div class="row">
    <div class="span9 offset1">
        <table class="table table-bordered" style="border:1px solid gray;">

            <?php foreach ($plan as $p){ ?>
                <td rowspan="3" width="20%"> <?php echo $p['stime'] .'～' .$p['etime']; ?> </td>
                <td width="80%"> <div align="center"> <font size="+1"> <strong> <?php echo $p['place']; ?> </strong></font></div> </td> <tr>
                <td width="80%"> <div align="center"> <?php echo $p['money']; ?> </div></td><tr>
                <td width="80%"> <?php echo $p['text']; ?> </td><tr>
                <?php if(!empty($p['image'])){ ?>
                <td width="80%"> <div align="center"><img src="<?php echo $this->webroot ?>img/spot/<?php echo $p['image'] ?>" /></div></td><tr>
                <?php }?>

            <?php } ?>

        </table> 
    </div>
 </div>

<div class="row">
    <div class="span4 offset5">
        <div class="form_action">   
            <?php if($liked == false){ ?>
            <a href="<?php echo $this->Html->url(array('controller' => 'rating', 'action' => 'post','id' => $plan_id,'like' => 'true',)) ?>" class="btn btn-primary"><i class="icon-thumbs-up icon-white"></i>&nbsp;<?php echo __('いいね！') ?><span class="badge badge-important"><?php echo $liked_number ?></span></a>
            <?php }else{ ?>
            <button class="btn disabled btn-inverse"><i class="icon-thumbs-up icon-white"></i>&nbsp;<?php echo __('いいね！') ?><span class="badge badge-important"><?php echo $liked_number ?></span></button>
            <?php } ?>

        </div>
    </div>
</div>
