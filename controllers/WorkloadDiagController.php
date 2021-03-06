<?php

namespace app\controllers;

use Yii;
use app\models\WorkloadDiag;
use app\models\WorkloadDiagSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\data\ActiveDataProvider;
/**
 * WorkloadDiagController implements the CRUD actions for WorkloadDiag model.
 */
class WorkloadDiagController extends Controller
{
    public $layout = 'blank';
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
     * Lists all WorkloadDiag models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WorkloadDiagSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WorkloadDiag model.
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
     * Creates a new WorkloadDiag model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($an)
    {
        $model = new WorkloadDiag();
        $fullname = Yii::$app->request->get('fullname');
        $diag_query = WorkloadDiag::find()->byAn($an);
        $dataProvider = new ActiveDataProvider([
            'query' => $diag_query,
        ]);
        
        if(Yii::$app->request->post('WorkloadDiag') && isset($an)){
            $model->attributes = Yii::$app->request->post('WorkloadDiag');
            $model->an = $an;
            $model->save();
            return $this->refresh();
        }else {
            return $this->render('create', [
                'model' => $model,
                'dataProvider'=>$dataProvider,
                'fullname'=>$fullname
            ]);
        }
        
    }

    /**
     * Updates an existing WorkloadDiag model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
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
     * Deletes an existing WorkloadDiag model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $diag_an = $this->findModel($id)->an;
        $fullname = Yii::$app->request->get('fullname');
        $this->findModel($id)->delete();
        
        return $this->redirect(['workload-diag/create','an' => $diag_an,'fullname'=>$fullname]);
      
    }

    /**
     * Finds the WorkloadDiag model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WorkloadDiag the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WorkloadDiag::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionAddDiag(){
        if (Yii::$app->request->get('name_diag')) {

            if ($_GET['name_diag'] != null) {

                $model = new WorkloadDiag();
                $model->diag = $_GET['name_diag'];
                $model->an = $_GET['an'];
                
                if ($model->save()) {
                    return Json::encode([
                        'diag' => $model->diag,
                        'an' => $model->an,
                    ]);

                }
            }
        }
    }

    
}

