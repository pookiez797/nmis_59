
<head>
    <style>
        /*@page { size 8.5in 11in; margin: 1cm }*/
        div.page { page-break-before:  always }
    </style>
    <title>รายงานวันนอนรวมการให้สารน้ำทางหลอดเลือด</title>
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
    thead{font-size: 15px; font-weight: bold;}
    .center {
        text-align: center;
    }
</style>
<h3>
    รายงานวันนอนรวมการให้สารน้ำทางหลอดเลือด<br/>ประจำเดือน <small><u><?= $month_name . ' ' . ($year + 543); ?></u></small> หอผู้ป่วย <small><u><?= $ward_name ?></u></small>
</h3>
<table border="1" class="coll center">
<thead>
  <tr height = '40'>
<td width = '200'>Foley's Cath (วัน)</td>
<td width = '200'>E.T./T.T. tube (วัน)</td>
<td width = '200'>I.V.Cath (วัน)</td>
<td width = '200'>Cutdown (วัน)</td>
 </tr>
</thead>
<tr height='30'>
  <?php
      foreach($alltubetable as $v){
        echo '<td>';
        echo $v['foley'];
        echo '</td>';
        echo '<td>';
        echo $v['ettube'];
        echo '</td>';
        echo '<td>';
        echo $v['ivcath'];
        echo '</td>';
        echo '<td>';
        echo $v['cutdown'];
        echo '</td>';
      }

  ?>
</tr>

</table>
<br/>
<br/>
