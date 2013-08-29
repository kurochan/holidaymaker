<?php
/*    $plan0['title'] = 'タイトル';
    $plan0['area'] = '地域';
    $plan0['persons'] = '人数';
    $plan0['money'] = '合計金額';
    $plan0['link'] = 'https://www.google.co.jp';//プラン詳細ページへのリンク
	
	$plan1['title'] = 'タイトル1';
    $plan1['area'] = '地域1';
    $plan1['persons'] = '人数1';
    $plan1['money'] = '合計金額1';
    $plan1['link'] = 'https://www.google.co.jp';//プラン詳細ページへのリンク
 
    $plans[0] = $plan0;
    $plans[1] = $plan1;
	
	$search_word = '検索キーワード'*/

?>

<h1> 検索結果 &nbsp;&quot;<?php echo $search_word ?>&quot; </h1> <br>

<br><br><br><br>

<?php //件数が多いときは次のページへの遷移ボタンのための表示属性が設定される
$hidden = 'style="visibility:hidden"';
?>

<div class="row">
    <div class="span9 offset1">            
            <?php for ($i = 0; $i < count($plans); $i++){ ?>
            <a href="<?php echo $this->webroot.'Plans/index/'.$plans[$i]['id']; ?>" target="_self"> <!--plans[$i]の詳細情報ページへのリンクが欲しい-->
                <table style="border:1px solid gray;" class="table table-bordered" width="100%">
                    <td background="<?php echo $this->webroot ?>img/s_gradation5.gif"><br><font size="+4" color="black" style="FONT-WEIGHT:EXTRA-LIGHT;FONT-STYLE:ITALIC;"><?php echo $plans[$i]['title']; ?></font><br><br><tr>
                    <td><div class="pull-right"><div align="center" class="span1 badge badge-info"> <font size="+1"> <strong> <?php echo $plans[$i]['area']; ?> </strong> </font> </div>
                    <div align="center" class="span1 badge badge-success"> <font size="+1"> <strong> <?php echo $plans[$i]['person']; ?> </strong> </font> </div>
                    <div align="center" class="span1 badge badge-warning"> <font size="+1"> <strong> <?php echo $plans[$i]['money']; ?> </strong> </font> </div>
                    </div></td>
                </table>
			    <!--<div  style="border-style: solid ; border-width: 1px;">
                    <p><font size="+10" color="black" style="FONT-WEIGHT:EXTRA-LIGHT;FONT-STYLE:ITALIC;"><?php echo $plans[$i]['title']; ?></font><br><br><br><p>
                    <p align="right" size="+1"><strong><div align="center" class="span1 badge badge-info"> <?php echo $plans[$i]['area']; ?> 
                    <div align="center" class="span1 badge badge-success"> <?php echo $plans[$i]['person']; ?> </div>
                    <div align="center" class="span1 badge badge-warning"> <?php echo $plans[$i]['money']; ?> </div></strong></p>
                </div>-->
                <br>
            </a>
			<?php
            array_shift($plans);
			/*if($i+1 >= 10){//10このプランを1ページに表示
			//planの数が10件より多いときは次のページへの遷移ボタンのための表示属性が設定される
			$hidden = 'style="visibility:visible"';
			break;
			}*/
            } ?>       
    </div>
 </div>

<div class="row">
    <div class="span4 offset8">
	    <div class="form_action">
            <button class="btn btn-large btn-primary" <?php echo $hidden; ?> >次のページへ</button>
		</div>
	</div>
</div>