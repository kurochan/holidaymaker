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
            <a href="<?php echo $plans[$i]['link']; ?>" target="_self"> <!--plans[$i]の詳細情報ページへのリンクが欲しい-->
                <table class="table table-bordered">
                    <td width="100%"> <font size="+3" color="black"> <strong> <?php echo $plans[$i]['title']; ?> </strong></font></div> <br><br><br>
                    <div align="center" class="span1 badge badge-info"> <font size="+1"> <strong> <?php echo $plans[$i]['area']; ?> </strong> </font> </div>
                    <div align="center" class="span1 badge badge-success"> <font size="+1"> <strong> <?php echo $plans[$i]['person']; ?> </strong> </font> </div>
                    <div align="center" class="span1 badge badge-warning"> <font size="+1"> <strong> <?php echo $plans[$i]['money']; ?> </strong> </font> </div>
                    </td>
                </table>
                <br>
            </a>
			<?php
            array_shift($plans);
			if($i+1 >= 10){//10このプランを1ページに表示
			//planの数が10件より多いときは次のページへの遷移ボタンのための表示属性が設定される
			$hidden = 'style="visibility:visible"';
			break;
			}
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