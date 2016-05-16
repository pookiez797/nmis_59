<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WorkloadTeam */

$this->title = 'เพิ่มทีมพยาบาล';
// $this->params['breadcrumbs'][] = ['label' => 'Workload Teams', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="workload-team-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,

    ]) ?>

</div>
