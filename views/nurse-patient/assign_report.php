<head>
    <style>
        /*@page { size 8.5in 11in; margin: 1cm }*/
        div.page { page-break-before:  always }
    </style>
</head>
<body onload="window.print()">
    <title>ใบมอบหมายงาน</title>
    <?php

    function DateThai($strDate) {
        $strYear = date("Y", strtotime($strDate)) + 543;
        $strMonth = date("n", strtotime($strDate));
        $strDay = date("j", strtotime($strDate));
        $strHour = date("H", strtotime($strDate));
        $strMinute = date("i", strtotime($strDate));
        $strSeconds = date("s", strtotime($strDate));
        $strMonthCut = Array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
        $strMonthThai = $strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear";
    }

    $event_date = new DateTime($event->date);

        if ($event->period == 3) {
            $event_date->modify('+1 day');
            $event_date = $event_date->format('Y-m-d');
        } else {
            $event_date = $event->date;
        }

//	$strDate = "2008-08-14";
//	echo "ThaiCreate.Com Time now : ".DateThai($strDate);
    ?>
    <style type="text/css">
        table.coll
        {
            border-collapse: collapse;
            font-size: 12px;
            padding: 10px;
            vertical-align: top;
        }
        body{font-family:Angsana New,Arial,Helvetica,sans-serif;}

        .center {
            text-align: center;
        }
    </style>

    <?php
    foreach ($team as $t) {
        ?>
        <div class="container">
            <table>
                <tr>
                    <td colspan="28"><b>หอผู้ป่วย</b> <u><?= $ward_name->ward ?></u> โรงพยาบาลขอนแก่น <b>วันที่</b> <u><?= DateThai($event_date) ?></u> <b>เวลา</b> <u><?= ($event->period == 3) ? '00.00 - 08.00' : (($event->period == 1) ? '08.00 - 16.00' : '16.00 - 00.00') ?> น.</u> <b>เวร</b> <u><?= ($event->period == 3) ? 'ดึก' : (($event->period == 1) ? 'เช้า' : 'บ่าย') ?></u> <b>ผู้มอบหมายงาน</b>.......................... </td>
                </tr>
                <tr>
                    <td colspan="28"><b>*ระดับการดูแลขั้นต่ำ</b> 4=ต้องการดูแลมากตลอดเวลา ,3=มาก ,2=ปานกลาง ,1=น้อย  ให้ 4a=หนักมาก ,3a=หนัก ,3b=หนักปานกลาง ,2a ,2b ,2c พัก (a  = 13 - 16, b  =  9 - 12, c  =  5 - 8, d  = 4)</td>
                </tr>
                <tr><td>
                        <table class="coll center" border ="1" width="100%">
                            <thead>
                                <tr>
                                    <td rowspan="3" width="30">ทีม</td>
                                    <td rowspan="3" width="60">ผู้มอบหมายงาน</td>
                                    <td rowspan="3" width="10">ประเภท<br/>เจ้าหน้าที่</td>
                                    <td rowspan="3" width="10">ประเภทเตียง</td>
                                    <td rowspan="3" width="10">เตียง</td>
                                    <td rowspan="3" width="220">ชื่อผู้ป่วย</td>
                                    <td rowspan="3" width="200">การวินิจฉัยโรค</td>
                                    <td rowspan="3" width="10">ประเภท<br/>ผู้ป่วย<br/><?= ($event->period == 1) ? 'ดึก' : (($event->period == 2) ? 'เช้า' : 'บ่าย') ?></td>
                                    <td colspan="8" width="300">การจำแนกผู้ป่วย(ลงคะแนน)</td>
                                    <td rowspan="2" colspan="10" width="300">รวมประเภทผู้ป่วย</td>
                                    <td rowspan="3" width="100">หน้าที่พิเศษ</td>
                                    <td rowspan="3" width="30">เวลาพัก</td>
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
                                    if ($p['team_ref'] == $t->ref) {
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
                            <td align="left"><font style="font-size: 14px;">
                                <?php
                                if ($p['name'] == "") {
                                    echo '<br/>';
                                }
                                ?>
                                <?= $p["title"] . $p["name"] ?>  <?= $p["surname"] ?>
                                </font></td>
                            <td align = 'left'><?= $p["diag"] ?></td>
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
                }
                ?>

                </tbody>
            </table>
        </td></tr></table>
    </div>
    <div class="page">
    </div>
    <?php
}
?>
</body>
