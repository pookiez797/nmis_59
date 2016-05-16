

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

<?php
$txt_period = '';
if ($period == 1) {
    $txt_period = 'ดึก';
} else if ($period == 2) {
    $txt_period = 'เช้า';
} else if ($period == 3) {
    $txt_period = 'บ่าย';
}
?>
<h3>
    ข้อมูล Cardex <small></small> ประจำวันที่ <small><?= $day ?> <?= $month_name . ' ' . ($year + 543); ?></small> เวร <small><?= $txt_period ?></small>

</h3>
<table border="1" class="coll center">
    <thead>
        <tr align="center"  >
            <td rowspan="2">รหัส</td>
            <td rowspan="2">หอผู้ป่วย</td>
            <td rowspan="2">ยกมา</td>
            <td colspan="3">การรับผู้ป่วย (ราย)</td>
            <td colspan="6">การจำหน่วยผู้ป่วย(ราย)</td>
            <td colspan="2">การผ่าตัด</td>
            <td colspan="6">Staff mix</td>
            <td colspan="4">กิจกรรมหัตถการ</td>
            <td colspan="3">คงพยาบาล</td>
            <td colspan="10">จำแนกตามประเภทผู้ป่วย</td>
        </tr>
        <tr align="center" >
            <td>รับ<br/>ใหม่</td>
            <td>รับ<br/>ย้าย</td>
            <td>รับ<br/>Refer</td>
            <td>แพทย์<br/>อนุญาติ</td>
            <td>ไม่<br/>สมัครใจ<br/>อยู่</td>
            <td>หนีกลับ</td>
            <td>ตาย </td>
            <td>Refer<br/>ไป</td>
            <td>ย้ายไป</td>
            <td>เตรียม<br/>ผ่าตัด</td>
            <td>ผ่าตัด</td>
            <td>HN.</td>
            <td>RN.</td>
            <td>TN.</td>
            <td>PN.</td>
            <td>NA.</td>
            <td>Worker</td>
            <td>เตรียม<br/>ตรวจ</td>
            <td>CPR<br/>(ครั้ง)</td>
            <td>CPR<br/>(คน)</td>
            <td>On<br/>Respirator</td>
            <td>สามัญ</td>
            <td>พิเศษ</td>
            <td>อัมพาต</td>
            <td>4A</td>
            <td>3A</td>
            <td>3B</td>
            <td>2A</td>
            <td>2B</td>
            <td>2C</td>
            <td>1A</td>
            <td>1B</td>
            <td>1C</td>
            <td>1D</td>
        </tr>

    </thead>

    <?php
    foreach ($cardex as $c) {

        $mybgcolor = '';
        if ($c['ward'] == 999) {
            $mybgcolor = ' bgcolor="yellow"';
        }
        echo'<tr ' . $mybgcolor . '>';
        echo '<td align="left">';
        echo $c['code'];
        echo '</td>';
        echo '<td align="left">';
        echo $c['name'];
        echo '</td>';
        echo '<td>';
        echo $c['remain'];
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
        echo '</tr>';
    }
    ?>

</table>

<br/><br/>
