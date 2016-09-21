
<?php

$mystaff = [];
  foreach ($stafftable as $s) {
    if (($s['new_date'] >= $fromdate) && ($s['new_date'] <= $todate))
    {
        // $s_date = $s['new_date'];
        $s_date = $s['new_date'];
        $s_staff = $s['staff_ref'];
        $s_period = $s['period'];
        $s_day = date("j", strtotime($s_date));

        $mystaff[$s_staff][$s_day][] = $s_period;
    }

  }

// echo '<pre>';
//  var_dump($mystaff);
// echo '</pre>';
?>
<head>
    <style>
        /*@page { size 8.5in 11in; margin: 1cm }*/
        div.page { page-break-before:  always }
    </style>
    <title>ตารางเวรประจำเดือน</title>
</head>
<style type="text/css">
    table.coll
    {
        border-collapse: collapse;
        font-size: 13px;
        padding: 10px;
        vertical-align: top;
    }
    body{font-family:Arial,Helvetica,sans-serif;}
    thead{font-size: 15px;}
    .center {
        text-align: center;
    }
</style>
<h3>
    ตารางเวรประจำเดือน <small><?= $month_name . ' ' . ($year + 543); ?></small><br/>หอผู้ป่วย <small><?= $ward_name ?></small>
</h3>
<table border="1" class="coll center">
    <thead>
        <tr align="center" >
          <td width="30"></td>
          <td width="200">ชื่อ - สกุล</td>
          <?php
          for($i=1;$i<=$days;$i++){
            echo '<td width="25">';
            echo $i;
            echo '</td>';
          }
          ?>
        </tr>

    </thead>

    <?php
    foreach($staff_name as $v){
      echo '<tr>';
      echo '<td>'.$v->priority.'</td>';
      echo '<td align="left" >'.$v->title.$v->name.' '.$v->surname.'</td>';

      for($i=1;$i<=$days;$i++){
        echo '<td>';
        // echo $v->staff_ref;
        //  $myperiod = $mystaff[6][1][2];

        if(isset($mystaff[$v->staff_ref][$i])){
          $period =  $mystaff[$v->staff_ref][$i];
          $count_p = count($period);
          foreach ($period as $p) {

                if($p == 1){
                  echo 'ด';
                }else if($p ==2){
                  echo 'ช';
                }else{
                  echo 'บ';
                }
                  $count_p--;

                if($count_p>=1){
                  echo '/';
                }
          }
        }else{
        echo '';
      }

        //

        echo '</td>';
      }

      echo '</tr>';
    }
     ?>

</table>
<br/>
<br/>
