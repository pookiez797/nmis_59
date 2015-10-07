<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NurseStaffevent */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Nurse Staffevent',
]) . ' ' . $model->staffevent_ref;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nurse Staffevents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->staffevent_ref, 'url' => ['view', 'id' => $model->staffevent_ref]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="nurse-staffevent-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
