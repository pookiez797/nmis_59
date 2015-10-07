<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NurseEvent */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Nurse Event',
]) . ' ' . $model->ref;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nurse Events'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ref, 'url' => ['view', 'id' => $model->ref]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="nurse-event-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
