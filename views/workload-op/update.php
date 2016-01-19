<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WorkloadOp */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Workload Op',
]) . ' ' . $model->ref;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Workload Ops'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ref, 'url' => ['view', 'id' => $model->ref]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="workload-op-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
