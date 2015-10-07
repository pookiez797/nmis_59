<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NurseEvent */

$this->title = Yii::t('app', 'เพิ่มรายการกิจกรรม');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'รายการกิจกรรม'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nurse-event-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
