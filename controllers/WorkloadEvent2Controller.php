<?php

namespace app\controllers;

use Yii;
use app\models\WorkloadEvent2;
use app\models\WorkloadEvent2Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\IpdIpd;
use app\models\WorkloadPtdisc;

/**
 * WorkloadEvent2Controller implements the CRUD actions for WorkloadEvent2 model.
 */
class WorkloadEvent2Controller extends Controller {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all WorkloadEvent2 models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new WorkloadEvent2Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WorkloadEvent2 model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new WorkloadEvent2 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateP1() {
        $ward = Yii::$app->session->get('user.ward');
        $prev_data = WorkloadEvent2::find()->where([
                    'ward' => $ward,
                    'event_date' => date('Y-m-d', strtotime('yesterday')),
                    'event_period' => 3
                ])->all();
        
        $sql = 'select i.hn,i.an,i.title,i.name,i.surname from ipd_ipd i
where i.ward = ' . $ward . ' and (i.disc="" or i.disc is null or i.disc = "0000-00-00" or i.disc = curdate())
and not exists (select "x" from workload_ptdisc p where p.ward = ' . $ward . ' and i.an = p.an )';
        $patient = IpdIpd::findBySql($sql)->all();
        $model = new WorkloadEvent2();

        if (isset($_POST['WorkloadEvent2'])) {
            if ($model->validate()) {
                foreach ($patient as $v) {
                    $model = new WorkloadEvent2();
                    $model->attributes = $_POST['WorkloadEvent2'][$v->hn];
                    $model->save();
                    if(isset($_POST['WorkloadEvent2'][$v->hn]) && $_POST['WorkloadEvent2'][$v->hn]['disc_type'] != 0){
                        $model_ptdisc = new WorkloadPtdisc();
                        $model_ptdisc->hn = $v->hn;
                        $model_ptdisc->an = $v->an;
                        $model_ptdisc->title = $v->title;
                        $model_ptdisc->name = $v->name;
                        $model_ptdisc->surname = $v->surname;
                        $model_ptdisc->ward = $ward;
                        $model_ptdisc->movestatus = $_POST['WorkloadEvent2'][$v->hn]['disc_type'];
                        if($model_ptdisc->validate()){
                            $model_ptdisc->save();
                        }
                    }
                }
            }
            return $this->redirect(['workload-event2/index']);
        } else {
            return $this->render('create-p1', [
                        'model' => $model,
                        'patient' => $patient,
                        'prev_data'=>$prev_data
            ]);
        }
        
    }

    public function actionCreateP2() {
        $ward = Yii::$app->session->get('user.ward');
        $prev_data = WorkloadEvent2::find()->where([
                    'ward' => $ward,
                    'event_date' => date('Y-m-d'),
                    'event_period' => 1
                ])->all();
        
        $sql = 'select i.hn,i.an,i.title,i.name,i.surname from ipd_ipd i
where i.ward = ' . $ward . ' and (i.disc="" or i.disc is null or i.disc = "0000-00-00" or i.disc = curdate())
and not exists (select "x" from workload_ptdisc p where p.ward = ' . $ward . ' and i.an = p.an )';
        $patient = IpdIpd::findBySql($sql)->all();
        $model = new WorkloadEvent2();

        if (isset($_POST['WorkloadEvent2'])) {
            if ($model->validate()) {
                foreach ($patient as $v) {
                    $model = new WorkloadEvent2();
                    $model->attributes = $_POST['WorkloadEvent2'][$v->hn];
                    $model->save();
                    if(isset($_POST['WorkloadEvent2'][$v->hn]) && $_POST['WorkloadEvent2'][$v->hn]['disc_type'] != 0){
                        $model_ptdisc = new WorkloadPtdisc();
                        $model_ptdisc->hn = $v->hn;
                        $model_ptdisc->an = $v->an;
                        $model_ptdisc->title = $v->title;
                        $model_ptdisc->name = $v->name;
                        $model_ptdisc->surname = $v->surname;
                        $model_ptdisc->ward = $ward;
                        $model_ptdisc->movestatus = $_POST['WorkloadEvent2'][$v->hn]['disc_type'];
                        if($model_ptdisc->validate()){
                            $model_ptdisc->save();
                        }
                    }
                }
            }
            return $this->redirect(['workload-event2/index']);
        } else {
            return $this->render('create-p2', [
                        'model' => $model,
                        'patient' => $patient,
                        'prev_data'=>$prev_data
            ]);
        }
        
    }

    public function actionCreateP3() {
        $ward = Yii::$app->session->get('user.ward');
        $prev_data = WorkloadEvent2::find()->where([
                    'ward' => $ward,
                    'event_date' => date('Y-m-d'),
                    'event_period' => 2
                ])->all();
        
        $sql = 'select i.hn,i.an,i.title,i.name,i.surname from ipd_ipd i
where i.ward = ' . $ward . ' and (i.disc="" or i.disc is null or i.disc = "0000-00-00" or i.disc = curdate())
and not exists (select "x" from workload_ptdisc p where p.ward = ' . $ward . ' and i.an = p.an )';
        $patient = IpdIpd::findBySql($sql)->all();
        $model = new WorkloadEvent2();

        if (isset($_POST['WorkloadEvent2'])) {
            if ($model->validate()) {
                foreach ($patient as $v) {
                    $model = new WorkloadEvent2();
                    $model->attributes = $_POST['WorkloadEvent2'][$v->hn];
                    $model->save();
                    if(isset($_POST['WorkloadEvent2'][$v->hn]) && $_POST['WorkloadEvent2'][$v->hn]['disc_type'] != 0){
                        $model_ptdisc = new WorkloadPtdisc();
                        $model_ptdisc->hn = $v->hn;
                        $model_ptdisc->an = $v->an;
                        $model_ptdisc->title = $v->title;
                        $model_ptdisc->name = $v->name;
                        $model_ptdisc->surname = $v->surname;
                        $model_ptdisc->ward = $ward;
                        $model_ptdisc->movestatus = $_POST['WorkloadEvent2'][$v->hn]['disc_type'];
                        if($model_ptdisc->validate()){
                            $model_ptdisc->save();
                        }
                    }
                }
            }
            return $this->redirect(['workload-event2/index']);
        } else {
            return $this->render('create-p3', [
                        'model' => $model,
                        'patient' => $patient,
                        'prev_data'=>$prev_data
            ]);
        }
    }

    /**
     * Updates an existing WorkloadEvent2 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ref]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing WorkloadEvent2 model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the WorkloadEvent2 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WorkloadEvent2 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = WorkloadEvent2::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
