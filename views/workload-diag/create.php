<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WorkloadDiag */

$this->title = Yii::t('app', 'ผลการวินิจฉัยโรคของ '.Yii::$app->request->get('fullname'));
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Workload Diags'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workload-diag-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'dataProvider'=>$dataProvider,
        'fullname'=>$fullname
    ]) ?>

</div>
