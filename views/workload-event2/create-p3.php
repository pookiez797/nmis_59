<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WorkloadEvent2 */

$this->title = Yii::t('app', 'เวรบ่าย');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Workload Event2s'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workload-event2-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_p3', [
        'model' => $model,
        'patient'=>$patient,
        'prev_data'=>$prev_data
    ]) ?>

</div>
