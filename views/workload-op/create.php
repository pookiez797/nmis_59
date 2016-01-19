<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WorkloadOp */

$this->title = Yii::t('app', 'ข้อมูลการผ่าตัด ของ'.Yii::$app->request->get('fullname'));
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Workload Ops'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workload-op-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'dataProvider'=>$dataProvider,
        'fullname'=>$fullname
    ]) ?>

</div>
