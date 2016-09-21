<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WorkloadPs */

$this->title = Yii::t('app', 'Pressure Sore ('.Yii::$app->request->get('fullname').')');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Workload Ps'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workload-ps-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
      'model' => $model,
      'dataProvider' => $dataProvider,
      'fullname' => $fullname,
    ]) ?>

</div>
