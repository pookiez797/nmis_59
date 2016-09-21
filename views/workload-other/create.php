<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WorkloadOther */

$this->title = Yii::t('app', 'อื่นๆ('.Yii::$app->request->get('fullname').')');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Workload Others'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workload-other-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
      'model' => $model,
      'dataProvider' => $dataProvider,
      'fullname' => $fullname,
    ]) ?>

</div>
