<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\NurseEvent */

$this->title = $model->ref;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nurse Events'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nurse-event-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->ref], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->ref], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ref',
            'date',
            'period',
            'ward',
            'inp_id',
            'lastupdate',
        ],
    ]) ?>

</div>
