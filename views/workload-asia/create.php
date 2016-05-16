<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WorkloadAsia */

$this->title = Yii::t('app', 'Create Workload Asia');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Workload Asias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workload-asia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
