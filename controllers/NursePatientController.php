<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\NursePatient;
use app\models\NursePatientSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\NurseEvent;
use app\models\IpdIpd;
use app\models\WorkloadPtdisc;
use DateTime;
use app\models\WorkloadDiag;
use app\models\WorkloadBed;
use app\models\WorkloadTeam;
use yii\db\Query;
use app\models\Ward;
/**
 * NursePatientController implements the CRUD actions for NursePatient model.
 */
class NursePatientController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all NursePatient models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new NursePatientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NursePatient model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new NursePatient model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($event_ref) {

        $ward = Yii::$app->user->identity->ward;
        $ward2 = Yii::$app->user->identity->ward2;
        $event = NurseEvent::findOne($event_ref);
        $event_patient = NursePatient::find()->where(['event_ref' => $event_ref, 'disc_type' => 0])->all();
        $event_prevp = 0;
        $event_prevd = '';
        $patient_no = 0;
        $event_date = new DateTime($event->date);
        $diag = new WorkloadDiag();
        $diag_an = WorkloadDiag::find()->all();

        if ($event->period == 1) {
            $event_prevp = 3;
            $event_date->modify('-1 day');
            $event_prevd = $event_date->format('Y-m-d');
        } else {
            $event_prevp = $event->period - 1;
            $event_prevd = $event->date;
        }

        $event_prev = NurseEvent::find()->where([
                    'date' => $event_prevd,
                    'period' => $event_prevp,
                    'ward' => $ward
                ])->one();

        $prev_data = null;

        $check_prev = "";
        if ($event_patient == null) {
            if ($event_prev == null) {
                $prev_data = null;
                $check_prev = "no eventprev no prev no patient";
            } else {
                $prev_data = NursePatient::find()->where([
                            'event_ref' => $event_prev->ref
                        ])->all();
                if ($prev_data == null) {
                    $check_prev = "no prev no patient";
                } else {
                    $check_prev = "have prev no patient";
                }
            }
        } else {
            $prev_data = NursePatient::find()->where([
                        'event_ref' => $event_ref
                    ])->all();
            $check_prev = "have patient";
        }

//        echo var_dump($event_patient);
//       $model = new NursePatient();
//        $sql = 'select * from ipd_ipd i
//where i.ward = ' . $ward . ' 
//and (i.disc is null or i.disc = "0000-00-00" or i.disc = "" or i.disc = "' . $event->date . '")
//and i.admite <= "' . $event->date . '"
//and not exists (select "x" from db_nurse.workload_ptdisc p where p.ward = ' . $ward . ' and i.an = p.an )';

        $sql = 'select * from ipd_ipd i
where i.ward in (' . $ward . ', ' . $ward2 . ')
and (i.disc is null or i.disc = "0000-00-00" or i.disc = "" or i.disc = "' . $event->date . '")
and i.admite <= "' . $event->date . '"
and not exists (
select "x" from db_nurse.workload_ptdisc p 
where p.ward in (' . $ward . ', ' . $ward2 . ') and i.an = p.an '
                . 'and p.lastupdate < "' . $event->date . '" )
union all
select * from ipd_ipd i
where an in (select an 
from hospdata.ipd_moveward 
where oldward in (' . $ward . ', ' . $ward2 . ')
and date	>= "' . $event->date . '" )
and i.admite <= "' . $event->date . '"
and (i.disc is null or i.disc = "0000-00-00" or i.disc = "" or i.disc = "' . $event->date . '")
and not exists (
select "x" from db_nurse.workload_ptdisc p 
where p.ward in (' . $ward . ', ' . $ward2 . ') and i.an = p.an '
                . 'and p.lastupdate < "' . $event->date . '" )';
        $patient = IpdIpd::findBySql($sql)->all();
        $model = new NursePatient();

        if (isset($_POST['NursePatient'])) {
            if ($event_patient != null) {
                if ($model->validate()) {
                    foreach ($event_patient as $v) {
                        $model = NursePatient::find()->where(['event_ref' => $v->event_ref, 'hn' => $v->hn])->one();
                        $model->attributes = $_POST['NursePatient'][$v->hn];
                        $model->save();
                        $event->patient_flag = 1;
                        $event->save();
                        if (isset($_POST['NursePatient'][$v->hn]) && $_POST['NursePatient'][$v->hn]['disc_type'] != 0) {
                            $model_ptdisc = new WorkloadPtdisc();
                            $model_ptdisc->hn = $v->hn;
                            $model_ptdisc->an = $v->an;
                            $model_ptdisc->title = $v->title;
                            $model_ptdisc->name = $v->name;
                            $model_ptdisc->surname = $v->surname;
                            $model_ptdisc->ward = $ward;
                            $model_ptdisc->movestatus = $_POST['NursePatient'][$v->hn]['disc_type'];
                            if ($model_ptdisc->validate()) {
                                $model_ptdisc->save();
                            }
                        }
                    }
                    return $this->redirect(['/nurse-event']);
                }
            } else {
                if ($model->validate()) {
                    foreach ($patient as $v) {
                        $model = new NursePatient();
                        $model->attributes = $_POST['NursePatient'][$v->hn];
                        $model->save();
                        $event->patient_flag = 1;
                        $event->save();
                        if (isset($_POST['NursePatient'][$v->hn]) && $_POST['NursePatient'][$v->hn]['disc_type'] != 0) {
                            $model_ptdisc = new WorkloadPtdisc();
                            $model_ptdisc->hn = $v->hn;
                            $model_ptdisc->an = $v->an;
                            $model_ptdisc->title = $v->title;
                            $model_ptdisc->name = $v->name;
                            $model_ptdisc->surname = $v->surname;
                            $model_ptdisc->ward = $ward;
                            $model_ptdisc->movestatus = $_POST['NursePatient'][$v->hn]['disc_type'];
                            if ($model_ptdisc->validate()) {
                                $model_ptdisc->save();
                            }
                        }
                    }
                    return $this->redirect(['/nurse-event']);
                }
            }
        } else {
            return $this->render('create', [
                        'model' => $model,
                        'patient' => $patient,
                        'prev_data' => $prev_data,
                        'event' => $event,
                        'patient_no' => $patient_no,
                        'check_prev' => $check_prev,
                        'event_prevp' => $event_prevp,
                        'event_prevd' => $event_prevd,
                        'diag' => $diag,
                        'diag_an' => $diag_an,
            ]);
        }

//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->pt_ref]);
//        } else {
//            return $this->render('create', [
//                'model' => $model,
//            ]);
//        }
    }

    /**
     * Updates an existing NursePatient model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->pt_ref]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing NursePatient model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionAssignReport($event_ref) {
        $ward = Yii::$app->user->identity->ward;
        $event = NurseEvent::findOne($event_ref);
        $ward_name = Ward::find()->where('code=:code',[':code'=>$ward])->one();
        $sql = "SELECT  bed.ward 
,     bed.team_name 
,     bed.bed_type 
,     bed.bed_no 
,     patient.title 
,     patient.name 
,     patient.surname 
,     patient.pt_type

FROM   (SELECT  a.ward
,     a.team_name
,     b.bed_type
,     b.bed_no

FROM   workload_team  a
RIGHT JOIN  workload_bed  b  ON  a.ref = b.team_ref

WHERE   a.ward  = '".$ward."')    bed
LEFT OUTER JOIN (SELECT  c.bed_type
,        c.bed_no
,        c.title
,        c.name
,        c.surname
,        c.pt_type
FROM      nurse_patient   c
WHERE      c.event_ref  =  ".$event_ref.") patient ON bed.bed_type  =  patient.bed_type
 AND bed.bed_no   =  patient.bed_no";
        
//        $patient = NursePatient::findBySql($sql)->all();
//        print_r($patient);
        
$command = Yii::$app->db->createCommand($sql);
$patient = $command->queryAll();
//var_dump($patient);
//echo $sql;
        
        return $this->render('assign_report',['patient'=>$patient,'event'=>$event,'ward_name'=>$ward_name]);
    }
    /**
     * Finds the NursePatient model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return NursePatient the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = NursePatient::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
