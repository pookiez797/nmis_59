<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WorkloadGcs */

$this->title = Yii::t('app', 'Gasglow Coma Scale');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Workload Gcs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workload-gcs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
        'dataProvider' => $dataProvider,
        'fullname' => $fullname
    ])
    ?>

</div>
