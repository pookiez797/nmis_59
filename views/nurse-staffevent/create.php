<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NurseStaffevent */

$this->title = Yii::t('app', 'Create Nurse Staffevent');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nurse Event'), 'url' => ['nurse-event/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nurse-staffevent-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'staff'=>$staff,
        'event'=>$event,
        'staff_event' => $staff_event,
        'dataProvider' => $dataProvider,
    ]) ?>

</div>
