<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WorkloadBed */

$this->title = Yii::t('app', 'เพิ่มเตียง '.$team_name);
// $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Workload Beds'), 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="workload-bed-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'team_name' => $team_name,
        'dataProvider'=>$dataProvider,
    ]) ?>

</div>
