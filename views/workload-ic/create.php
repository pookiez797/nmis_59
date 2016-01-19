<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WorkloadIc */

$this->title = Yii::t('app', 'การเฝ้าระวังของ'.Yii::$app->request->get('fullname'));
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Workload Ics'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workload-ic-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'dataProvider'=>$dataProvider,
        'fullname'=>$fullname
    ]) ?>

</div>
