<?php

use yii\helpers\Html;
//use yii\bootstrap\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use app\models\LibBedtype;
use yii\helpers\ArrayHelper;
use app\models\LibPttype;
use app\models\LibAdmit;
use app\models\LibDisc;
use app\models\WorkloadDoctor;
use yii\helpers\Url;
//use yii\widgets\Pjax;
//use yii\bootstrap\Modal;
use kartik\popover\PopoverX;

$lib_admit = ArrayHelper::map(LibAdmit::find()->all(), 'code', 'name');
$lib_pttype = ArrayHelper::map(LibPttype::find()->all(), 'code', 'name');
$lib_disc = ArrayHelper::map(LibDisc::find()->all(), 'code', 'name');
$lib_bedtype = ArrayHelper::map(LibBedtype::find()->all(), 'code', 'name');
$lib_doctor = ArrayHelper::map(WorkloadDoctor::find()->byWard()->all(), 'ref', 'Fullname');
$lib_item = $model->getItem();
$lib_tube = $model->getTube();
//print_r($lib_doctor);
//print_r($lib_bedtype2);
/* @var $this yii\web\View */
/* @var $model app\models\WorkloadEvent2 */
/* @var $form yii\widgets\ActiveForm */
?>


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

//	$strDate = "2008-08-14";
//	echo "ThaiCreate.Com Time now : ".DateThai($strDate);
?>
<?php foreach (Yii::$app->session->getAllFlashes() as $message):; ?>
    <?=
    \yii\bootstrap\Alert::widget([
        'body' => ArrayHelper::getValue($message, 'body'),
        'options' => ArrayHelper::getValue($message, 'options'),
    ])
    ?>
<?php endforeach; ?>

<div class="workload-event2-form">

    <h3>วันที่
        <small><?= DateThai($event->date) ?><?php // Yii::$app->thaiFormatter->asDate($event->date, 'long') . " "      ?></small>  
        เวร <small><?php echo ($event->period == 1) ? 'ดึก' : (($event->period == 2) ? 'เช้า' : 'บ่าย'); ?></small> 
    </h3>

    <?php
    $form = ActiveForm::begin();
    ?>
    <table class="table table-bordered" >
        <tr>
            <th width = '10' rowspan="2"></th>
            <th width = '100' rowspan="2">ประเภทเตียง</th>
            <th width = '80' rowspan="2">เตียง</th>
            <th width = '150' rowspan="2">ชื่อ-สกุล</th>
            <th width = '100' rowspan="2">ประเภทผู้ป่วย</th>
            <th width = '100' rowspan="2">รับ</th>
            <th width = '100' rowspan="2">จำหน่าย</th>
            <!--<th width = '40' colspan="2">หัตถการ</th>-->
            <th width = '40' colspan="3">อื่นๆ</th>
            <th width = '100' rowspan="2">Foley<br />'s Cath</th>
            <th width = '100' rowspan="2">E.T./<br/>T.T.<br/>tube</th>
            <th width = '100' rowspan="2">I.V.<br />Cath</th>
            <th width = '100' rowspan="2">Cut<br />down</th>
            <th width = '100' rowspan="2">แพทย์เจ้าของไข้</th> 
        </tr>
        <tr>
<!--            <th>เตรียมตรวจ</th>
            <th width = '5%'>CPR<br/>(ครั้ง)</th> -->
            <th>Diag</th>
            <th>ผ่าตัด</th>
            <th width = '5%'>เฝ้าระวัง</th> 
        </tr>

        <?php
        $pv_data = array();
        if ($prev_data != null) {
            foreach ($prev_data as $a) {
                $pv_data[$a->hn] = $a->hn;
                $pv_data['bed_type'][$a->hn] = $a->bed_type;
                $pv_data['bed_no'][$a->hn] = $a->bed_no;
                $pv_data['pt_type'][$a->hn] = $a->pt_type;
                $pv_data['admit_type'][$a->hn] = $a->admit_type;
                $pv_data['disc_type'][$a->hn] = $a->disc_type;
                $pv_data['disability'][$a->hn] = $a->disability;
                $pv_data['prepare'][$a->hn] = $a->prepare;
                $pv_data['cpr'][$a->hn] = $a->cpr;
                $pv_data['uti'][$a->hn] = $a->uti;
                $pv_data['vap'][$a->hn] = $a->vap;
                $pv_data['phleb'][$a->hn] = $a->phleb;
                $pv_data['cutdown'][$a->hn] = $a->cutdown;
                $pv_data['doctor'][$a->hn] = $a->doctor;
            }
        }
        $i = 0;
//        echo "<pre>";
//        var_dump($patient);
//        echo "</pre>";
        foreach ($patient as $v) {
            $i++;


//            echo $form->field($model, "[$v->hn]event_date", ['options' => ['value' => date("Y-m-d")]])->hiddenInput()->label(false);
//            echo $form->field($model, "[$v->hn]event_date")->hiddenInput(['value' => date("Y-m-d")])->label(false);
//
//            echo $form->field($model, "[$v->hn]event_period")->hiddenInput(['value' => '1'])->label(false);
            echo $form->field($model, "[$v->hn]hn")->hiddenInput(['value' => $v->hn])->label(false);
            echo $form->field($model, "[$v->hn]event_ref")->hiddenInput(['value' => $event->ref])->label(false);
            echo $form->field($model, "[$v->hn]an")->hiddenInput(['value' => $v->an])->label(false);
            echo $form->field($model, "[$v->hn]title")->hiddenInput(['value' => $v->title])->label(false);
            echo $form->field($model, "[$v->hn]name")->hiddenInput(['value' => $v->name])->label(false);
            echo $form->field($model, "[$v->hn]surname")->hiddenInput(['value' => $v->surname])->label(false);

//            echo $form->field($model, "[$v->hn]ward")->hiddenInput(['value' => Yii::$app->session->get('user.ward')])->label(false);
//            $tr_bg = '';
//            if($v->an_1 == null){
//                $tr_bg = 'bgcolor="#D4FCEA"';
//            }
//            echo '<tr '.$tr_bg.'>';
            echo '<tr>';
            echo '<td>';
            echo Html::checkbox("pt_id[$v->hn]", ['checked' => TRUE]);
            echo '</td>';
            echo '<td>';
            if (isset($pv_data[$v->hn])) {
                $model->bed_type = $pv_data['bed_type'][$v->hn];
            }
            echo $form->field($model, "[$v->hn]bed_type")->dropDownList($lib_bedtype)->label(false);
            echo '</td>';
            echo '<td>';
            if (isset($pv_data[$v->hn])) {
                $model->bed_no = $pv_data['bed_no'][$v->hn];
            } else {
                $model->bed_no = '';
            }
            echo $form->field($model, "[$v->hn]bed_no")->textInput()->label(false);
            echo '</td>';
            echo '<td>';
            echo $v->title . $v->name . '</br>' . $v->surname;
            echo '</td>';
            echo '<td>';
            if (isset($pv_data[$v->hn])) {
                $model->pt_type = $pv_data['pt_type'][$v->hn];
            }
            echo $form->field($model, "[$v->hn]pt_type")->dropDownList($lib_pttype)->label(false);
            echo '</td>';
            echo '<td>';
            echo $form->field($model, "[$v->hn]admit_type")->dropDownList($lib_admit)->label(false);

            echo '</td>';
            echo '<td>';
            echo $form->field($model, "[$v->hn]disc_type")->dropDownList($lib_disc)->label(false);

            echo '</td>';
//            echo '<td>';
//            if (isset($pv_data[$v->hn])) {
//                $model->disability = $pv_data['disability'][$v->hn];
//            }
//            echo $form->field($model, "[$v->hn]disability")->checkbox(['title' => 'อัมพาต'])->label(' ');
//            echo '</td>';
            echo '<td>';
            ?>
            <script>
                function myFunction<?= $v->an ?>() {
                    window.open("<?= Url::toRoute(['workload-diag/create', 'an' => $v->an, 'fullname' => $v->title . $v->name . ' ' . $v->surname]) ?>", "_blank", "scrollbars=yes, resizable=yes, top=50, left=500, width=700, height=600");
                }
            </script>
            <?php
            echo Html::a('Diag', ['workload-diag/create', 'an' => $v->an, 'fullname' => $v->title . $v->name . ' ' . $v->surname], ['target' => '_blank', 'class' => 'btn btn-default btn-block', 'onclick' => 'myFunction' . $v->an . '()']);

            echo '</td>';
            ?>
            <script>
                function myFunctionOP<?= $v->an ?>() {
                    window.open("<?= Url::toRoute(['workload-op/create', 'an' => $v->an, 'fullname' => $v->title . $v->name . ' ' . $v->surname, 'period' => $event->period]) ?>", "_blank", "scrollbars=yes, resizable=yes, top=50, left=500, width=700, height=600");
                }
            </script>
            <?php
            echo '<td>';
            echo Html::a('ผ่าตัด', ['workload-op/create', 'an' => $v->an, 'fullname' => $v->title . $v->name . ' ' . $v->surname, 'period' => $event->period], ['target' => '_blank', 'class' => 'btn btn-default btn-block', 'onclick' => 'myFunctionOP' . $v->an . '()']);

            echo '</td>';
            echo '<td>';
            ?>

            <div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    IC
    <span class="caret"></span>
  </button>
            <ul class="dropdown-menu" aria-labelledby="เฝ้าระวัง">

                <script>
                    function myFunctionIC<?= $v->an ?>() {
                        window.open("<?= Url::toRoute(['workload-ic/create', 'an' => $v->an, 'fullname' => $v->title . $v->name . ' ' . $v->surname, 'period' => $event->period]) ?>", "_blank", "scrollbars=yes, resizable=yes, top=50, left=500, width=700, height=600");
                    }
                </script>
                <?php
                echo '<li>';
                echo Html::a('IC', ['workload-ic/create', 'an' => $v->an, 'fullname' => $v->title . $v->name . ' ' . $v->surname, 'period' => $event->period], ['target' => '_blank', 'onclick' => 'myFunctionIC' . $v->an . '()']);
                echo '</li>';
                ?>
                <script>
                    function myFunctionGCS<?= $v->an ?>() {
                        window.open("<?= Url::toRoute(['workload-gcs/create', 'an' => $v->an, 'fullname' => $v->title . $v->name . ' ' . $v->surname, 'period' => $event->period]) ?>", "_blank", "scrollbars=yes, resizable=yes, top=50, left=500, width=700, height=600");
                    }
                </script>
                <?php
                echo '<li>';
                echo Html::a('GCS', ['workload-gcs/create', 'an' => $v->an, 'fullname' => $v->title . $v->name . ' ' . $v->surname, 'period' => $event->period], ['target' => '_blank', 'onclick' => 'myFunctionGCS' . $v->an . '()']);
                echo '</li>';
                ?>

            </ul>
            </div>

    <?php
    echo '</td>';
    echo '<td>';
    if (isset($pv_data[$v->hn])) {
        $model->uti = $pv_data['uti'][$v->hn];
    }
    echo $form->field($model, "[$v->hn]uti")->dropDownList($lib_item, ['title' => "Foley's Cath"])->label(false);

    echo '</td>';
    echo '<td>';
    if (isset($pv_data[$v->hn])) {
        $model->vap = $pv_data['vap'][$v->hn];
    }
    echo $form->field($model, "[$v->hn]vap")->dropDownList($lib_tube, ['title' => "E.T./T.T.tube"])->label(false);

    echo '</td>';
    echo '<td>';
    if (isset($pv_data[$v->hn])) {
        $model->phleb = $pv_data['phleb'][$v->hn];
    }
    echo $form->field($model, "[$v->hn]phleb")->dropDownList($lib_item, ['title' => "I.V.Cath"])->label(false);

    echo '</td>';
    echo '<td>';
    if (isset($pv_data[$v->hn])) {
        $model->cutdown = $pv_data['cutdown'][$v->hn];
    }
    echo $form->field($model, "[$v->hn]cutdown")->dropDownList($lib_item, ['title' => "Cut Down"])->label(false);

    echo '</td>';
    ?>

            <?php
            echo '<td>';
            if (isset($pv_data[$v->hn])) {
                $model->doctor = $pv_data['doctor'][$v->hn];
            }
            echo $form->field($model, "[$v->hn]doctor")->dropDownList($lib_doctor, ['title' => 'แพทย์เจ้าของไข้'])->label(false);
            echo '</td>';
            echo '</tr>';
        }
//        echo $i;
        $patient_no = $i;
//        echo date("Y-m-d");
//        echo '<br/>';
//        echo date('Y-m-d',strtotime('yesterday'));
//        echo $prev_data;
        ?>
        <h4>จำนวนผู้ป่วย <small><?= $i ?></small> คน</h4>
    </table>



    <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'บันทึก') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php
$js = "
            $('.btn-show').on('click',function(){
            var an = $(this).closest('tr').find('input[type=hidden][class*=txt_an]').val();
            console.log(an);
});
            
$('.btn-diag').on('click',function(){
//    alert('Heloo');
            var url = $('#url-adddiag').data('creatediag');
            var name_diag = $('#txt_diag').val();
            //var an = $('#txt_an').val();
            var an = $(this).closest('tr').find('input[type=hidden][class*=txt_an]').val();
            var name_diag = $(this).closest('tr').find('input[type=text][class*=txt_diag]').val();
            var row_index = $(this).closest('tr').index();
            var code = row_index-1;
            console.log(an);
            console.log(name_diag);
            console.log('row index: '+row_index);
            $.ajax({
                    type: 'GET',
                    dataType: 'JSON',
                    url: url,
                    data: {name_diag: name_diag,an : an},
                    success: function (data) {
                        console.log(data.diag);
                        console.log(data.an);
                   $('#w'+code).fadeOut('slow');
                   $(this).closest('tr').find('[class*=myDetail]').val(data.diag);
                        
                    }
            });
        });";
$this->registerJs($js);
?>

    <?php ActiveForm::end(); ?>

</div>

