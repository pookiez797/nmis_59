<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use app\models\LibBedtype;
use yii\helpers\ArrayHelper;
use app\models\LibPttype;
use app\models\LibAdmit;
use app\models\LibDisc;

/* @var $this yii\web\View */
/* @var $model app\models\WorkloadEvent2 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="workload-event2-form">

    <?php $form = ActiveForm::begin(); ?>
    <table class="table-condensed table-bordered ">
        <tr>
            <th width = '5%' rowspan="2">ประเภทเตียง</th>
            <th width = '5%' rowspan="2">เตียง</th>
            <th width = '10%' rowspan="2">ชื่อ-สกุล</th>
            <th width = '5%' rowspan="2">ประเภทผู้ป่วย</th>
            <th width = '5%' rowspan="2">รับ</th>
            <th width = '5%' rowspan="2">จำหน่าย</th>
            <th width = '5%' rowspan="2">อัมพาต</th>
            <th width = '10%' colspan="2">หัตถการ</th>
            <th width = '5%' rowspan="2">Foley<br />'s Cath</th>
            <th width = '5%' rowspan="2">E.T./<br/>T.T.<br/>tube</th>
            <th width = '5%' rowspan="2">I.V.<br />Cath</th>
            <th width = '5%' rowspan="2">Cut<br />down</th>
            <th width = '5%' rowspan="2">การผ่าตัด</th>
            <th width = '5%' rowspan="2">Pres-<br/>sure<br/>Sore</th>
            <th width = '5%' rowspan="2">Dx</th>
            <th width = '5%' rowspan="2">IC</th>
            <th width = '5%' rowspan="2">Doctor</th>
        </tr>
        <tr>
            <th>เตรียมตรวจ</th>
            <th width = '5%'>CPR<br/>(ครั้ง)</th>
        </tr>

        <?php
        $pv_data = array();
        foreach ($prev_data as $a){
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
        }
        $i = 0;
        foreach ($patient as $v) {
            $i++;


//            echo $form->field($model, "[$v->hn]event_date", ['options' => ['value' => date("Y-m-d")]])->hiddenInput()->label(false);
            echo $form->field($model, "[$v->hn]event_date")->hiddenInput(['value' => date("Y-m-d")])->label(false);

            echo $form->field($model, "[$v->hn]event_period")->hiddenInput(['value' => '3'])->label(false);

            echo $form->field($model, "[$v->hn]hn")->hiddenInput(['value' => $v->hn])->label(false);

            echo $form->field($model, "[$v->hn]an")->hiddenInput(['value' => $v->an])->label(false);

            echo $form->field($model, "[$v->hn]ward")->hiddenInput(['value' => Yii::$app->session->get('user.ward')])->label(false);

            echo '<tr>';

            echo '<td>';
            if(isset($pv_data[$v->hn])){
            $model->bed_type = $pv_data['bed_type'][$v->hn];
            }
            echo $form->field($model, "[$v->hn]bed_type")->dropDownList(
                    ArrayHelper::map(LibBedtype::find()->all(), 'code', 'name'))->label(false);
            echo '</td>';
            echo '<td>';
            if(isset($pv_data[$v->hn])){
            $model->bed_no = $pv_data['bed_no'][$v->hn];
            }
            echo $form->field($model, "[$v->hn]bed_no")->textInput()->label(false);
            echo '</td>';
            echo '<td>';
            echo $v->title . $v->name . '</br>' . $v->surname;
            echo '</td>';
            echo '<td>';
            if(isset($pv_data[$v->hn])){
            $model->pt_type = $pv_data['pt_type'][$v->hn];
            }
            echo $form->field($model, "[$v->hn]pt_type")->dropDownList(
                    ArrayHelper::map(LibPttype::find()->all(), 'code', 'name'))->label(false);
            echo '</td>';
            echo '<td>';
            echo $form->field($model, "[$v->hn]admit_type")->dropDownList(
                    ArrayHelper::map(LibAdmit::find()->all(), 'code', 'name'))->label(false);
            echo '</td>';
            echo '<td>';
            echo $form->field($model, "[$v->hn]disc_type")->dropDownList(
                    ArrayHelper::map(LibDisc::find()->all(), 'code', 'name'))->label(false);
            echo '</td>';
            echo '<td>';
            if(isset($pv_data[$v->hn])){
            $model->disability = $pv_data['disability'][$v->hn];
            }
            echo $form->field($model, "[$v->hn]disability")->checkbox()->label(' ');
            echo '</td>';
            if(isset($pv_data[$v->hn])){
            $model->prepare = $pv_data['prepare'][$v->hn];
            }
            echo '<td>';
            echo $form->field($model, "[$v->hn]prepare")->checkbox()->label(' ');
            echo '</td>';
            echo '<td>';
            if(isset($pv_data[$v->hn])){
            $model->cpr = $pv_data['cpr'][$v->hn];
            }
            echo $form->field($model, "[$v->hn]cpr")->textInput(['maxlength' => true])->label(false);
            echo '</td>';
            echo '<td>';
            if(isset($pv_data[$v->hn])){
            $model->uti = $pv_data['uti'][$v->hn];
            }
            echo $form->field($model, "[$v->hn]uti")->dropDownList($model->getItem())->label(false);
            echo '</td>';
            echo '<td>';
            if(isset($pv_data[$v->hn])){
            $model->vap = $pv_data['vap'][$v->hn];
            }
            echo $form->field($model, "[$v->hn]vap")->dropDownList($model->getTube())->label(false);
            echo '</td>';
            echo '<td>';
            if(isset($pv_data[$v->hn])){
            $model->phleb = $pv_data['phleb'][$v->hn];
            }
            echo $form->field($model, "[$v->hn]phleb")->dropDownList($model->getItem())->label(false);
            echo '</td>';
            echo '<td>';
            if(isset($pv_data[$v->hn])){
            $model->cutdown = $pv_data['cutdown'][$v->hn];
            }
            echo $form->field($model, "[$v->hn]cutdown")->dropDownList($model->getItem())->label(false);
            echo '</td>';
            echo '<td>';
            echo '</td>';
             echo '<td>';
            echo '</td>';
             echo '<td>';
            echo '</td>';
             echo '<td>';
            echo '</td>';
            echo '<td>';
            echo $form->field($model, "[$v->hn]doctor_ref")->textInput(['maxlength' => true])->label(false);
            echo '</td>';
            echo '</tr>';
        }
//        echo $i;
//        echo date("Y-m-d");
//        echo '<br/>';
//        echo date('Y-m-d',strtotime('yesterday'));
//        echo $prev_data;
        ?>

    </table>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
