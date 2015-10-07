<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WorkloadDiag */

$this->title = Yii::t('app', 'Create Workload Diag');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Workload Diags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workload-diag-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
