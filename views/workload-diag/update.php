<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WorkloadDiag */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Workload Diag',
]) . ' ' . $model->ref;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Workload Diags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ref, 'url' => ['view', 'id' => $model->ref]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="workload-diag-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
