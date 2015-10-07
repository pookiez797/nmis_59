<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'ใบมอบหมายงาน');
?>
<div class="container">
 
<b>หอผู้ป่วย</b> <?= $ward_name->ward ?> โรงพยาบาลขอนแก่น <b>วันที่</b> ... <?= $event->date ?> ... <b>เวลา</b> <?= ($event->period == 1)?'00.00 - 08.00':(($event->period==2)?'08.00 - 16.00':'16.00 - 00.00') ?> น. <b>เวร</b> <?= ($event->period == 1)?'ดึก':(($event->period==2)?'เช้า':'บ่าย') ?> <b>ผู้มอบหมายงาน</b>  …………………………………….</font>
<br/>
<b>*ระดับการดูแลขั้นต่ำ</b> 4=ต้องการดูแลมากตลอดเวลา ,3=มาก ,2=ปานกลาง ,1=น้อย  ให้ 4a=หนักมาก ,3a=หนัก ,3b=หนักปานกลาง ,2a ,2b ,2c พัก (a  = 13 - 16, b  =  9 - 12, c  =  5 - 8, d  = 4)<br/></font>

<table class="table table-condensed table-bordered " width="100%">
    <thead>
        <tr>
            <td rowspan="3" width="10">ทีม</td>
            <td rowspan="3" width="20">ผู้มอบหมายงาน</td>
            <td rowspan="3" width="10">ประเภท<br/>เจ้าหน้าที่</td>
            <td rowspan="3" width="10">ประเภทเตียง</td>
            <td rowspan="3" width="10">เตียง</td>
            <td rowspan="3" width="200">ชื่อผู้ป่วย</td>
            <td rowspan="3" width="200">การวินิจฉัยโรค</td>
            <td rowspan="3" width="10">ประเภท<br/>ผู้ป่วย<br/>เวรดึก</td>
            <td colspan="8" width="300">การจำแนกผู้ป่วย(ลงคะแนน)</td>
            <td rowspan="2" colspan="10" width="300">รวมประเภทผู้ป่วย</td>
            <td rowspan="3" width="50">หน้าที่พิเศษ</td>
            <td rowspan="3">เวลาพัก</td>
        </tr>
        <tr>
            <td colspan="4">สภาวะการเจ็บป่วย</td>
            <td colspan="4">การดูแลขั้นต่ำ</td>
        </tr>
        <tr>
            <td width="2%">VS</td>
            <td width="2%">NS</td>
            <td width="2%">OP</td>
            <td width="2%">Pay</td>
            <td width="2%">Adi</td>
            <td width="2%">Ed</td>
            <td width="2%">Med</td>
            <td width="2%">Sym</td>
            <td width="2%">4a</td>
            <td width="2%">3a</td>
            <td width="2%">3b</td>
            <td width="2%">2a</td>
            <td width="2%">2b</td>
            <td width="2%">2c</td>
            <td width="2%">1a</td>
            <td width="2%">1b</td>
            <td width="2%">1c</td>
            <td width="2%">1d</td>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($patient as $p) {
            ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><?= $p['bed_type'] ?></td>
                <td><center>
            <font style="font-size: 14px;">
    <?= $p["bed_no"] ?>                               
            </font></</center></td>
            <td align="left"><font style="font-size: 14px;"><?= $p["title"].$p["name"] ?><br/><?= $p["surname"] ?></font></td>
    <td></td>
    <td><center><font style="font-size: 14px;"><?= $p["pt_type"] ?></font></center>
    </td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>
    </td><!-- 4a -->
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td> <!-- 1d -->
    <td></td>
    <td></td>
    </tr>
    <?php
}
?>


</tbody>
</table>
</div>