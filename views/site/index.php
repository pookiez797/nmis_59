<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'ระบบ WORKLOAD';
?>
<div class="site-index">

    <div class="jumbotron">
        <table align='center'>
            <tr>
                <?php
                foreach ($team as $t) {
                    ?>
                    <td style="vertical-align: top; padding: 10px; ">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <td width='20'>ประเภทเตียง</td>
                            <td width='10'>เตียง</td>
                            <td width='200'>ชื่อ-สกุล</td>
                            <td width='20'>ประเภทผู้ป่วย</td>
                            </thead>
                            <?php
                            foreach ($patient as $p) {
                                if ($p['team_ref'] == $t->ref) {
                                    ?>
                                    <?php
                                    $font_color = '';
                                    if ($p['pt_type'] == '4a' || $p['pt_type'] == '3a') {
                                        $font_color = 'red';
                                    }
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $p['bed_type'] ?>
                                        </td>
                                        <td>
                                            <?= $p['bed_no'] ?>
                                        </td>
                                        <td>
                                            <font color='<?= $font_color ?>'> <?= $p['patient_name'] ?></font>
                                        </td>
                                        <td>

                                            <font color='<?= $font_color ?>'><?= $p['pt_type'] ?></font>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </table>
                    </td>
                    <?php
                }
                ?>
            </tr> 
        </table>
    </div>

</div>
