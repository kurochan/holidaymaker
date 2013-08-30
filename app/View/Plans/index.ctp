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
        <table class="table table-bordered" style="border:1px solid black;">

            <?php foreach ($plan as $p){ ?>
                <tr style="vertical-align:middle;">
                    <td rowspan="3" width="20%" style="text-align:center; border-bottom-style:none;border-top-width:1;border-top-color:black;"><br><br> <?php echo $p['stime'] .'～' .$p['etime']; ?> </td>
                    <td width="80%" style="border-top-style:solid;border-top-width:1;border-top-color:black;border-left-width:1;border-left-color:black;border-left-style:solid;" background="<?php echo $this->webroot ?>img/images.jpg">
                        <div align="center"> <font size="+1"> <strong> <?php echo $p['place']; ?> </strong></font></div>
                    </td> 
                </tr>
                <tr><td width="80%" style="border-left-width:1;border-left-color:black;border-left-style:solid;">
                        <div class="span1 badge badge-warning" align="center"><font size="+0">費用</font></div><div align="center" ><?php echo $p['money'].'円'; ?> </div>
                    </td>
                </tr>
                <tr>
                    <td width="80%" style="border-left-width:1;border-left-color:black;border-left-style:solid;">
                        <div class="span1 badge badge-success" align="center"><font size="+0">メモ</font></div><div align="center"><?php echo $p['text']; ?> </div>
                    </td>
                </tr>
                <?php if(!empty($p['image'])){ 
                    $original_path = WWW_ROOT.'img/spot/'.$p['image'];
					$extension = pathinfo($original_path, PATHINFO_EXTENSION);
					if($extension == 'jpg'){$extension = 'jpeg';}
					/* 1. 元画像を開く */	
					$function = "imagecreatefrom".$extension;
					$original = $function($original_path);
					$x = imagesx($original);
					$y = imagesy($original);

					/* 2. 新規TrueColorイメージをリサイズ後のサイズで作る */
					$resize = imagecreatetruecolor('300', '200');

					/* 3. 1をコピー元、2をコピー先で再サンプリング */
					imagecopyresampled($resize, $original, 0, 0, 0, 0, '300', '200', $x, $y);

					/* 4. 2を適切な名前で保存、もしくは表示する */
					$function = 'image'.$extension;
					$function($resize, WWW_ROOT.'img/spot/rs_'.$p['image']/*$original_path*/);

					/* 5. イメージリソースを開放 */	
					imagedestroy($original);
					imagedestroy($resize);
				?>
                <tr>
                    <td width="20%" style="border-top-style:none;"></td>
                    <td width="80%" style="border-left-width:1;border-left-color:black;border-left-style:solid;">
                        <div align="center"><img src="<?php echo $this->webroot ?>img/spot/<?php echo $p['image'] ?>" /></div>
                    </td>
                </tr>
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
