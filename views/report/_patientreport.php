

<head>
    <style>
        /*@page { size 8.5in 11in; margin: 1cm }*/
        div.page { page-break-before:  always }
    </style>
    <title>รายงานทะเบียนผู้ป่วยประจำเดือน</title>
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
    ทะเบียนผู้ป่วย <br/>หอผู้ป่วย <small><?= $ward_name ?></small> ประจำเดือน <small><?= $month_name . ' ' . ($year + 543); ?></small>
</h3>
<table border="1" class="coll center">
    <thead>
        <tr align="center" >
            <td width ='40'>ลำดับ</td>
            <td width ='80'>HN</td>
            <td width ='80'>AN</td>

            <td width ='100'>ชื่อ-สกุล</td>
            <td>อายุ</td>
            <td width ='100'>ที่อยู่</td>
            <td>สิทธิการรักษา</td>
            <td>Diagnosis</td>
            <td>Operation</td>
            <td>วันที่ Admit</td>
            <td>วันที่ Admit(W)</td>
            <td>สถานะการ Admit</td>
            <td>วันที่จำหน่าย</td>
            <td>สถานะการจำหน่าย</td>
            <td>แพทย์เจ้าของไข้</td>
            <td>วันที่นัด F/U</td>
        </tr>

    </thead>

    <?php
    $i=1;
    $discchk = [];
    foreach ($patient as $p) {

        $discchk[$p['an']]['admit'] = $p['admit_date_sort'];
        ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $p['hn'] ?></td>
            <td><?= $p['an'] ?></td>
            <td align = "left"> <?= $p['title'] ?><?= $p['name'] ?> <?= $p['surname'] ?></td>
            <td><?= $p['age'] ?></td>
            <td><?= $p['address'] ?></td>
            <td><?= $p['pttype_name'] ?></td>
            <td><?= $p['dx1'] ?></td>
            <td></td>
            <td><?= $p['admite'];?></td>
            <td><?= $p['admit_date_new'];?></td>
            <td></td>
            <td>
            <?php

            if($p['admit_date_new']=='' && $p['move_date_new']==''){
              if($p['disc']<= $lastday && $p['disc'] != '0000-00-00'){
                if($discchk[$p['an']]['admit'] > $p['admit_date_new']){
                  echo $p['disc'];
                }

              }
            }else if($p['move_date_new'] != '' && $p['move_date_new']<= $lastday){
              echo $p['move_date_new'];
            }

            ?>
            </td>
            <td></td>
            <td></td>
            <td>
              <?php
                if($p['disc']<=$lastday && ($p['disc']!= null)
                && $p['fu'] !='0000-00-00' && $p['ward']==$ward){
                  echo $p['fu'];
                }
              ?>
            </td>
        </tr>


        <?php
        $i++;
    }
    ?>

</table>
