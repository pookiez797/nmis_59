
 <head>
     <style>
         /*@page { size 8.5in 11in; margin: 1cm }*/
         div.page { page-break-before:  always }
     </style>
     <title>แบบรวบรวมข้อมูลตัวชี้วัดคุณภาพทางการพยาบาล</title>
 </head>
 <style type="text/css">
 body{font-family:font-family:"Lucida Sans Unicode", "Lucida Grande", Sans-Serif;}
#newspaper-b{font-family:"Lucida Sans Unicode", "Lucida Grande", Sans-Serif;font-size:14px;width:800px;
              text-align:left;border-collapse:collapse;border:1px solid #000;margin:20px;}
#newspaper-b th{font-weight:bold;font-size:16px;color:#000;padding:15px 10px 10px;background:#fff;}
/*#newspaper-b tbody{background:#e8edff;}*/
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

/*#newspaper-b tbody tr:hover td{color:#339;background:#d0dafd;}*/
.center {
    text-align: center;
}
     /*table.coll
     {
         border-collapse: collapse;
         font-size: 13px;
         padding: 10px;
         vertical-align: top;
     }
     body{font-family:Arial,Helvetica,sans-serif;}
     thead{font-size: 15px;}
     */
 </style>

 <div id="titlefont-1">แบบรวบรวมข้อมูลตัวชี้วัดคุณภาพทางการพยาบาล</div>
 <div id="titlefont-2"><b>กลุ่มภารกิจด้านการพยาบาล  โรงพยาบาลขอนแก่น</b></div>
 <div id="titlefont-2">
   หอผู้ป่วย <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $ward_name ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
   ประจำเดือน <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $month_name . ' ' . ($year + 543); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></div>
 <center><table border="1" id="newspaper-b">
     <thead>
         <tr align="center" >
           <th width="30">ข้อ</th>
           <th width="200">รายการ</th>
           <th width="30">จำนวน</th>
           <th width="30">หน่วย</th>
         </tr>

     </thead>

     <?php
     $i = 1;
     foreach ($indicator as $v) {
       echo '<tr>';
       echo '<td class ="center">'.$i.'</td>';
       echo '<td>'.$v['name'].'</td>';
       echo '<td class ="center">'.$v['count'].'</td>';
       echo '<td class ="center">'.$v['unit'].'</td>';
       echo '</tr>';
       $i++;

     }
      ?>

 </table>
 </center>
 <br/>
 <br/>
