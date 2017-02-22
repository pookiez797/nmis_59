
<head>
    <style>
        /*@page { size 8.5in 11in; margin: 1cm }*/
        div.page { page-break-before:  always }
    </style>
    <title>รายงานวันนอนหัตถการ</title>
</head>
<style type="text/css">
    /*table.coll
    {
        border-collapse: collapse;
        font-size: 13px;
        padding: 10px;
        vertical-align: top;
    }
    body{font-family:Arial,Helvetica,sans-serif;}
    thead{font-size: 15px; font-weight: bold;}
    .center {
        text-align: center;
    }*/
</style>
<style type="text/css">
body{font-family:font-family:"Lucida Sans Unicode", "Lucida Grande", Sans-Serif;}
#newspaper-b{font-family:"Lucida Sans Unicode", "Lucida Grande", Sans-Serif;font-size:14px;width:800px;
             text-align:left;border-collapse:collapse;border:1px solid #000;margin:20px;}
#newspaper-b th{font-weight:bold;font-size:16px;color:#000;padding:15px 10px 10px;background:#fff;}
#newspaper-b td{color:#000;border-top:1px ;padding:10px;}
#titlefont-1 {
   font-family:font-family:"Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
   text-align: center;
   font-size: 20px;
   margin-bottom: 8px;
   font-weight: bold;
 }
#titlefont-2 {
   font-family:font-family:"Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
   text-align: center; font-size: 18px;
   margin-bottom: 8px;
 }
table.center {
   margin-left:auto;
   margin-right:auto;
 }

.center {
   text-align: center;
}

</style>

<div id="titlefont-1">รายงานวันนอนรวมหัตถการ</div>
<div id="titlefont-2"><b>ประจำเดือน <small><u><?= $month_name . ' ' . ($year + 543); ?></u></small> หอผู้ป่วย <small><u><?= $ward_name ?></u></small></b></div>
<br />
<center><table border="1" id="newspaper-b">
<thead>
  <tr height = '40' align = "center">
<th width = '200'>Foley's Cath (วัน)</th>
<th width = '200'>E.T./T.T. tube (วัน)</th>
<th width = '200'>I.V.Cath (วัน)</th>
<th width = '200'>Cutdown (วัน)</th>
 </tr>
</thead>
<tr height='30'>
  <?php
      foreach($alltubetable as $v){
        echo '<td class ="center">';
        echo $v['foley'];
        echo '</td>';
        echo '<td class ="center">';
        echo $v['ettube'];
        echo '</td>';
        echo '<td class ="center">';
        echo $v['ivcath'];
        echo '</td>';
        echo '<td class ="center">';
        echo $v['cutdown'];
        echo '</td>';
      }

  ?>
</tr>

</table>
</center>
<br/>
<br/>
