<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WorkloadPtdisc */

$this->title = Yii::t('app', 'Create Workload Ptdisc');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Workload Ptdiscs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workload-ptdisc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
