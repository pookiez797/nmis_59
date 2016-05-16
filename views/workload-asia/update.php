<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WorkloadAsia */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Workload Asia',
]) . ' ' . $model->ref;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Workload Asias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ref, 'url' => ['view', 'id' => $model->ref]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="workload-asia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
