<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Ward;
use app\models\NurseEvent;
use yii\db\Query;
use app\models\WorkloadTeam;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','index'],
                'rules' => [
                    [
                        'actions' => ['logout','index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
//          $ward = Yii::$app->user->identity->ward;
//          $team = WorkloadTeam::find()->where('ward = :ward',[':ward'=>$ward])->all();
// //        $event = NurseEvent::findOne($event_ref);
//         $ward_name = Ward::find()->where('code=:code',[':code'=>$ward])->one();
//         $sql = "SELECT  bed.ward
// ,     bed.team_name
// ,     bed.bed_type
// ,     bed.bed_no
// ,     patient.patient_name
// ,     patient.pt_type
// ,     bed.team_ref
//
// FROM   (SELECT  a.ward
// ,     a.team_name
// ,     b.bed_type
// ,     b.bed_no
// ,     b.ref
// ,     a.ref as team_ref
//
// FROM   workload_team  a
// RIGHT JOIN  workload_bed  b  ON  a.ref = b.team_ref
//
// WHERE   a.ward  =  '".$ward."')    bed
// LEFT OUTER JOIN (SELECT  c.bed_type
// ,        c.bed_no
// ,        CONCAT(c.title,c.`name`,'  ',c.surname)  patient_name
// ,        c.pt_type
// FROM      nurse_patient   c
// WHERE      c.event_ref  =
// (SELECT  MAX(ref)
// FROM  nurse_event
// WHERE ward = '".$ward."'  AND  patient_flag = '1' and disc_type=0))  patient
// ON bed.bed_type  =  patient.bed_type
// AND bed.bed_no   =  patient.bed_no
// ORDER BY bed.ref,bed.bed_no";
//
//
// //        $patient = NursePatient::findBySql($sql)->all();
// //        print_r($patient);
//
// $command = Yii::$app->db->createCommand($sql);
// $patient = $command->queryAll();
// //var_dump($patient);
// //echo $sql;
//
//          return $this->render('index',[
//              'patient'=>$patient,
//              'team' => $team,
//          ]);
    }

    public function actionShowPatient()
    {
          $ward = Yii::$app->user->identity->ward;
          $team = WorkloadTeam::find()->where('ward = :ward',[':ward'=>$ward])->all();
          //        $event = NurseEvent::findOne($event_ref);
          // $ward_name = Ward::find()->where('code=:code',[':code'=>$ward])->one();
          $sql = " SELECT  bed.ward
          ,     bed.team_name
          ,     bed.bed_type
          ,     bed.bed_no
          ,     patient.patient_name
          ,     patient.pt_type
          ,     bed.team_ref

          FROM   (SELECT  a.ward
          ,     a.team_name
          ,     b.bed_type
          ,     b.bed_no
          ,     b.ref
          ,     a.ref as team_ref

          FROM   workload_team  a
          RIGHT JOIN  workload_bed  b  ON  a.ref = b.team_ref
          WHERE   a.ward = ".$ward.")    bed
          LEFT OUTER JOIN (SELECT  c.bed_type
          ,        c.bed_no
          ,        CONCAT(c.title,c.name,'  ',c.surname)  patient_name
          ,        c.pt_type
          FROM      nurse_patient   c
          WHERE      c.event_ref  =
          (SELECT  MAX(ref)
          FROM  nurse_event
          WHERE ward = '".$ward."'  AND  patient_flag = '1'))  patient
          ON bed.bed_type  =  patient.bed_type
          AND bed.bed_no   =  patient.bed_no
          ORDER BY bed.ref,bed.bed_no ";


          //        $patient = NursePatient::findBySql($sql)->all();
          //        print_r($patient);

          $command = Yii::$app->db->createCommand($sql);
          $patient = $command->queryAll();
//var_dump($patient);
//echo $sql;

         return $this->render('_showpatient',[
             'patient'=>$patient,
             'team' => $team,
         ]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
