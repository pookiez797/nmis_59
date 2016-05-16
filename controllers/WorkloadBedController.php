<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\WorkloadBed;
use app\models\WorkloasBedSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * WorkloadBedController implements the CRUD actions for WorkloadBed model.
 */
class WorkloadBedController extends Controller{

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
     * Lists all WorkloadBed models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WorkloasBedSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WorkloadBed model.
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
     * Creates a new WorkloadBed model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($team_ref,$team_name)
    {
        $model = new WorkloadBed();
        $bed_query = WorkloadBed::find()->byTeam($team_ref);
        $dataProvider = new ActiveDataProvider([
            'query' => $bed_query,
        ]);
        $dataProvider->pagination->pageSize=50;

        if ($model->load(Yii::$app->request->post()) && isset($team_ref)) {
          $model->attributes = Yii::$app->request->post();
          $model->team_ref = $team_ref;
          $model->save();
            return $this->refresh();
        } else {
            return $this->render('create', [
                'model' => $model,
                'team_name' => $team_name,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Updates an existing WorkloadBed model.
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
     * Deletes an existing WorkloadBed model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $team_ref = $this->findModel($id)->team_ref;
        $this->findModel($id)->delete();

        return $this->redirect(['workload-bed/create','team_ref'=>$team_ref,'team_name'=>'']);
    }

    /**
     * Finds the WorkloadBed model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WorkloadBed the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WorkloadBed::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
