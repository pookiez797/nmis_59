<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WorkloadDoctor */

$this->title = Yii::t('app', 'เพิ่มรายชื่อแพทย์');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'รายชื่อแพทย์'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workload-doctor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
