<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WorkloadEvent2 */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Workload Event2',
]) . ' ' . $model->ref;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Workload Event2s'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ref, 'url' => ['view', 'id' => $model->ref]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="workload-event2-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
