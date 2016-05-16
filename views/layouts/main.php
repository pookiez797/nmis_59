<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'ระบบ WORKLOAD กลุ่มการพยาบาล',
        // 'brandUrl' => Yii::$app->homeUrl,
        'brandUrl' => ['/site/show-patient'],
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
//            ['label' => 'Home', 'url' => ['/site/index']],
//            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'กรอกข้อมูลผู้ป่วย', 'url' => ['/nurse-event/index']],
            ['label' => 'ดึงผู้ป่วยคืน', 'url' => ['/workload-ptdisc/index']],
//            ['label' => 'กรอกข้อมูลผู้ป่วย',
//                    'items' => [
//                        ['label' => 'เวรดึก', 'url' => ['/workload-event2/create-p1']],
//                        ['label' => 'เวรเช้า', 'url' => ['/workload-event2/create-p2']],
//                        ['label' => 'เวรบ่าย', 'url' => ['/workload-event2/create-p3']],
//                    ],
//                ],

            ['label' => 'เพิ่มข้อมูลพื้นฐาน',
                    'items' => [
                        ['label' => 'รายชื่อแพทย์', 'url' => ['/workload-doctor/index']],
                        ['label' => 'เจ้าหน้าที่', 'url' => ['/nurse-staff/index']],
                        ['label' => 'ทีมพยาบาล', 'url' => ['/workload-team/index']],
                    ],
                ],
            ['label' => 'รายงาน',
                    'items' => [
                        ['label' => 'ข้อมูล Cardex ประจำเดือน', 'url' => ['/report/cardex-report'],'linkOptions'=>['target'=>'_blank'] ],
                        ['label' => 'ข้อมูล Cardex Sup', 'url' => ['/report/cardex-sup'],'linkOptions'=>['target'=>'_blank'] ],
                        ['label' => 'ทะเบียนผู้ป่วย (Demo)', 'url' => ['/report/patient-report'],'linkOptions'=>['target'=>'_blank'] ],
                        ['label' => 'ตารางเวร', 'url' => ['/report/stafftable-report'],'linkOptions'=>['target'=>'_blank'] ],
                    ],
                ],
            Yii::$app->user->isGuest ?
                ['label' => 'Login', 'url' => ['/site/login']] :
                [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; ศูนย์เทคโนโลยีสารสนเทศและการสื่อสาร โรงพยาบาลขอนแก่น Tel.1178 <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
