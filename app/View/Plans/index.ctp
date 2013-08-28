<?php
    $title = 'タイトル';
    $area = '地域';
    $num_of_persons = '人数';
    $sum_of_money = '合計金額';
 
    $spot1['start_time'] = '10:00';
    $spot1['end_time'] = '11:00';
    $spot1['spot'] = 'カフェ1';
    $spot1['money'] = '金額1';
    $spot1['text'] = '本文1';
        
    $spot2['start_time'] = '10:00';
    $spot2['end_time'] = '11:00';
    $spot2['spot'] = 'カフェ2';
    $spot2['money'] = '金額2';
    $spot2['text'] = '本文2';

    $plan[0] = $spot1;
    $plan[1] = $spot2;

?>

    <h1> <?php echo $title ?> </h1> <br>

    <div class="row">
        <div class="span4 offset6">
            <div class="span1 badge badge-info"> <font size="+1"> <strong> <?php echo $area; ?> </strong> </font> </div>
            <div class="span1 badge badge-success"> <font size="+1"> <strong> <?php echo $num_of_persons; ?> </strong> </font> </div>
            <div class="span1 badge badge-warning"> <font size="+1"> <strong> <?php echo $sum_of_money; ?> </strong> </font> </div>
        </div>
     </div>

<br><br><br><br>


<div class="row">
    <div class="span9 offset1">
        <table class="table table-bordered">
            
            <?php foreach ($plan as $p){ ?>
                <td rowspan="3"　width="20%"> <?php echo $p['start_time'] .'～' .$p['end_time']; ?> </td>
		        <td width="80%"> <div align="center"> <font size="+1"> <strong> <?php echo $p['spot']; ?> </strong></font></div> </td> <tr>
                <td width="80%"> <div align="center"> <?php echo $p['money']; ?> </div> </td> <tr>
                <td width="80%"> <?php echo $p['text']; ?> </td> <tr> 
            <?php } ?>
            
        </table> 
    </div>
 </div>

<div class="row">
    <div class="span4 offset5">
	    <div class="form_action">
            <button type="submit" class="btn btn-primary">このプランをトレースする</button>
		</div>
	</div>
</div>