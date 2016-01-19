<head>
    <style>
        /*@page { size 8.5in 11in; margin: 1cm }*/
        div.page { page-break-before:  always }
    </style>
</head>
<body onload="window.print()">
    <title>รายชื่อผู้ป่วยประจำวัน</title>
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

//
//    $event_date = new DateTime($event->date);
//
//    if ($event->period == 3) {
//        $event_date->modify('+1 day');
//        $event_date = $event_date->format('Y-m-d');
//    } else {
//        $event_date = $event->date;
//    }
//	$strDate = "2008-08-14";
//	echo "ThaiCreate.Com Time now : ".DateThai($strDate);
    ?>
    <style type="text/css">
        table.coll 
        {
            border-collapse: collapse;
            font-size: 16px;
            padding: 20px;
            vertical-align: top;
        }
        body{font-family:Tahoma,Angsana New,Arial,Helvetica,sans-serif;}
        td {
            height: 30px;
        }
        .center {
            text-align: left;
        }
    </style>
    <?php
    $pt = [];
    $i = 0;
    foreach ($patient as $p) {
        $pt[$i]['bed_type'] = $p->bed_type;
        $pt[$i]['bed_no'] = $p->bed_no;
        $pt[$i]['fullname'] = $p->title . $p->name . ' ' . $p->surname;
        $i++;
    }
    ?>
    <div class="container">

        <table>
            <tr> 
                <td colspan="28"><b>หอผู้ป่วย</b> <u><?= $ward_name->ward ?></u> โรงพยาบาลขอนแก่น 
            <br/><b>วันที่</b> <u><?= DateThai($event->date) ?></u> <b>เวลา</b> <u><?= ($event->period == 1) ? '00.00 - 08.00' : (($event->period == 2) ? '08.00 - 16.00' : '16.00 - 00.00') ?> น.</u> <b>เวร</b> <u><?= ($event->period == 1) ? 'ดึก' : (($event->period == 2) ? 'เช้า' : 'บ่าย') ?></u></td>
            </tr>
            <tr>

                <td style="vertical-align: top; padding: 10px; ">

                    <table class="coll center" border ="1" padding='20'>
                        <thead>
                            <tr>
                                <td width ='20' align='center'>เตียง</td>
                                <td width ='370' align='center' >ชื่อ-สกุล</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 0; $i < count($pt); $i++) {
                                if ($i < 28) {
                                    ?>
                                    <tr>
                                        <td><font style="font-size: 16px;"><?= $pt[$i]['bed_type'] . $pt[$i]['bed_no'] ?></font></td>
                                        <td><font style="font-size: 16px;"><?= $pt[$i]['fullname'] ?></font></td>

                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table></td>
                <td style="vertical-align: top; padding: 10px; ">

                    <table class="coll center" border ="1" padding='20'>
                        <thead>
                            <tr>
                                <td width ='20' align='center'>เตียง</td>
                                <td width ='370' align='center' >ชื่อ-สกุล</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 0; $i < count($pt); $i++) {
                                if ($i > 27) {
                                    ?>
                                    <tr>
                                        <td><font style="font-size: 16px;"><?= $pt[$i]['bed_type'] . $pt[$i]['bed_no'] ?></font></td>
                                        <td><font style="font-size: 16px;"><?= $pt[$i]['fullname'] ?></font></td>

                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table></td>

            </tr></table>
    </div>
</body>
