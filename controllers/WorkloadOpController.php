<?php

namespace app\controllers;

use Yii;
use app\models\WorkloadOp;
use app\models\WorkloadOpSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

/**
 * WorkloadOpController implements the CRUD actions for WorkloadOp model.
 */
class WorkloadOpController extends Controller {

    public $layout = 'blank';

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
     * Lists all WorkloadOp models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new WorkloadOpSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WorkloadOp model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new WorkloadOp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($an) {
        $model = new WorkloadOp();
        $fullname = Yii::$app->request->get('fullname');
        $period = Yii::$app->request->get('period');
        $op_query = WorkloadOp::find()->byAn($an);
        $dataProvider = new ActiveDataProvider([
            'query' => $op_query,
        ]);

        $x = Yii::$app->request->post('WorkloadOp');
        $y = $x['operate'];
        $pre_date = '';
        if ($y == 1) {
            $pre_date = date('Y-m-d');
        }else{
            $pre_date = $x['op_date'];
        }



        if (Yii::$app->request->post('WorkloadOp') && isset($an)) {
            $model->attributes = Yii::$app->request->post('WorkloadOp');
            $model->op_date = $pre_date;
            $model->an = $an;
            $model->period = $period;
            $model->save();
            return $this->refresh();
        } else {
            return $this->render('create', [
                        'model' => $model,
                        'dataProvider' => $dataProvider,
                        'fullname' => $fullname
            ]);
        }
    }

    /**
     * Updates an existing WorkloadOp model.
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
     * Deletes an existing WorkloadOp model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $diag_an = $this->findModel($id)->an;
        $fullname = Yii::$app->request->get('fullname');
        $this->findModel($id)->delete();

        return $this->redirect(['workload-op/create', 'an' => $diag_an, 'fullname' => $fullname]);
    }

    /**
     * Finds the WorkloadOp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WorkloadOp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = WorkloadOp::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
