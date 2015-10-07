<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\NurseStaffevent;
use app\models\NurseStaffeventSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Model;
use app\models\NurseStaff;
use app\models\NurseEvent;
use yii\data\ActiveDataProvider;
/**
 * NurseStaffeventController implements the CRUD actions for NurseStaffevent model.
 */
class NurseStaffeventController extends Controller
{
    public function behaviors()
    {
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
     * Lists all NurseStaffevent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NurseStaffeventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    
    
    /**
     * Displays a single NurseStaffevent model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new NurseStaffevent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($event_ref)
    {
        
        $model = new NurseStaffevent();
        $event = NurseEvent::findOne($event_ref);
        $staff = NurseStaff::find()->where(['ward'=> Yii::$app->user->identity->ward ])->all();
        $staff_event = NurseStaffevent::find()->where('event_ref = :event_ref',[':event_ref'=> $event_ref]);
        $dataProvider = new ActiveDataProvider([
            'query' => $staff_event,
        ]);
        
       
        if(isset($_POST['NurseStaffevent'])){
            foreach($staff as $v){
                if(isset($_POST['NurseStaffevent'][$v->staff_ref])&&$_POST['NurseStaffevent'][$v->staff_ref]['staff_ref']!=0){
                    $model_s2 = new NurseStaffevent();
                    $model_s2->attributes = $_POST['NurseStaffevent'][$v->staff_ref];
                    if($model_s2->validate()){
                        $model_s2->save();
                    }
                }
            }
            return $this->refresh();
//         return $this->redirect(['nurse-staffevent/create']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'staff'=>$staff,
                'event'=>$event,
                'staff_event' => $staff_event,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Updates an existing NurseStaffevent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->staffevent_ref]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing NurseStaffevent model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $event_ref = $this->findModel($id)->event_ref;
        $this->findModel($id)->delete();
        
        return $this->redirect(['nurse-staffevent/create','event_ref' => $event_ref]);
//        return $this->redirect(['index']);
    }

    /**
     * Finds the NurseStaffevent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return NurseStaffevent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NurseStaffevent::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
