<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NurseStaff */

$this->title = Yii::t('app', 'เพิ่มเจ้าหน้าที่');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'รายชื่อเจ้าหน้าที่'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nurse-staff-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
