<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WorkloadFalling */

$this->title = Yii::t('app', 'พลัดตกหกล้ม ('.Yii::$app->request->get('fullname').')');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Workload Fallings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workload-falling-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
      'model' => $model,
      'dataProvider' => $dataProvider,
      'fullname' => $fullname,
    ]) ?>

</div>
