

<head>
    <style>
        /*@page { size 8.5in 11in; margin: 1cm }*/
        div.page { page-break-before:  always }
    </style>
    <title>รายงานข้อมูล Cardex</title>
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

    .center {
        text-align: center;
    }
</style>
<h3>
    ข้อมูลหอผู้ป่วย <small><?= $ward_name ?></small> ประจำเดือน <small><?= $month_name.' '.($year+543) ;?></small>
</h3>
<table border="1" class="coll center">
    <thead>
        <tr align="center" >
            <td rowspan="3">วันที่</td>
            <td rowspan="3">เวร</td>
            <td rowspan="3">ยอด<br/>ยกมา</td>
            <td colspan="3">การรับผู้ป่วย (ราย)</td>
            <td colspan="6">การจำหน่วยผู้ป่วย(ราย)</td>
            <td colspan="2">การผ่าตัด</td>
            <td colspan="6">Staff mix</td>
            <td colspan="4">กิจกรรมหัตถการ</td>
            <td colspan="3">คงพยาบาล</td>
            <td colspan="10">จำแนกตามประเภทผู้ป่วย</td>
        </tr>
        <tr align="center" >
            <td rowspan="2">รับ<br/>ใหม่</td>
            <td rowspan="2">รับ<br/>ย้าย</td>
            <td rowspan="2">รับ<br/>Refer</td>
            <td rowspan="2">แพทย์<br/>อนุญาติ</td>
            <td rowspan="2">ไม่<br/>สมัครใจ<br/>อยู่</td>
            <td rowspan="2">หนีกลับ</td>
            <td rowspan="2">ตาย </td>
            <td rowspan="2">Refer<br/>ไป</td>
            <td rowspan="2">ย้ายไป</td>
            <td rowspan="2">เตรียม<br/>ผ่าตัด</td>
            <td rowspan="2">ผ่าตัด</td>
            <td rowspan="2">HN.</td>
            <td rowspan="2">RN.</td>
            <td rowspan="2">TN.</td>
            <td rowspan="2">PN.</td>
            <td rowspan="2">NA.</td>
            <td rowspan="2">Worker</td>
            <td rowspan="2">เตรียม<br/>ตรวจ</td>
            <td rowspan="2">CPR<br/>(ครั้ง)</td>
            <td rowspan="2">CPR<br/>(คน)</td>
            <td rowspan="2">On<br/>Respirator</td>
            <td rowspan="2">สามัญ</td>
            <td rowspan="2">พิเศษ</td>
            <td rowspan="2">อัมพาต</td>
            <td rowspan="2">4A</td>
            <td rowspan="2">3A</td>
            <td rowspan="2">3B</td>
            <td rowspan="2">2A</td>
            <td rowspan="2">2B</td>
            <td rowspan="2">2C</td>
            <td rowspan="2">1A</td>
            <td rowspan="2">1B</td>
            <td rowspan="2">1C</td>
            <td rowspan="2">1D</td>
        </tr>

    </thead>

<?php
foreach ($cardex as $c) {
    
    $txt_period = '';
    if ($c['period'] == 1) {
        $txt_period = 'ดึก';
        echo '<tr>';
        echo '<td rowspan="3">';
        echo substr($c['date'],8,2);
        echo '</td>';
    } else if ($c['period'] == 2) {
        $txt_period = 'เช้า';
        echo '<tr>';
    } else if ($c['period'] == 3) {
        $txt_period = 'บ่าย';
        echo '<tr>';
    }

   
    echo '<td>';
    echo $txt_period;
    echo '</td>';
    echo '<td>';
    echo $c['total_prev'];
//    echo $c['rm_normal']+($c['disc1']+$c['disc2']+$c['disc3']+$c['disc4']+$c['disc5']+$c['disc6'])-($c['admit1']+$c['admit2']+$c['admit3']);
    echo '</td>';

    echo '<td>';
    echo $c['admit1'];
    echo '</td>';
    echo '<td>';
    echo $c['admit2'];
    echo '</td>';
    echo '<td>';
    echo $c['admit3'];
    echo '</td>';
   
    echo '<td>';
    echo $c['disc1'];
    echo '</td>';
    echo '<td>';
    echo $c['disc2'];
    echo '</td>';
    echo '<td>';
    echo $c['disc3'];
    echo '</td>';
    echo '<td>';
    echo $c['disc4'];
    echo '</td>';
    echo '<td>';
    echo $c['disc5'];
    echo '</td>';
    echo '<td>';
    echo $c['disc6'];
    echo '</td>';

    echo '<td>';
    echo '';
    echo '</td>';
    echo '<td>';
    echo '';
    echo '</td>';

    echo '<td>';
    echo $c['hn'];
    echo '</td>';
    echo '<td>';
    echo $c['rn'];
    echo '</td>';
    echo '<td>';
    echo $c['tn'];
    echo '</td>';
    echo '<td>';
    echo $c['pn'];
    echo '</td>';
    echo '<td>';
    echo $c['na'];
    echo '</td>';
    echo '<td>';
    echo $c['worker'];
    echo '</td>';

    echo '<td>';
    echo '';
    echo '</td>';
    echo '<td>';
    echo $c['cpr_time'];
    echo '</td>';
    echo '<td>';
    echo $c['cpr_no'];
    echo '</td>';
    echo '<td>';
    echo $c['respirator'];
    echo '</td>';

    echo '<td>';
    echo $c['rm_normal'];
    echo '</td>';
    echo '<td>';
    echo $c['rm_vip'];
    echo '</td>';
    echo '<td>';
    echo $c['disability'];
    echo '</td>';

    echo '<td>';
    echo $c['4a'];
    echo '</td>';
    echo '<td>';
    echo $c['3a'];
    echo '</td>';
    echo '<td>';
    echo $c['3b'];
    echo '</td>';
    echo '<td>';
    echo $c['2a'];
    echo '</td>';
    echo '<td>';
    echo $c['2b'];
    echo '</td>';
    echo '<td>';
    echo $c['2c'];
    echo '</td>';
    echo '<td>';
    echo $c['1a'];
    echo '</td>';
    echo '<td>';
    echo $c['1b'];
    echo '</td>';
    echo '<td>';
    echo $c['1c'];
    echo '</td>';
    echo '<td>';
    echo $c['1d'];
    echo '</td>';
}
?>

</table>