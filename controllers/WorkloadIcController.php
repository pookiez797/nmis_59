<?php

namespace app\controllers;

use Yii;
use app\models\WorkloadIc;
use app\models\WorkloadIcSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

/**
 * WorkloadIcController implements the CRUD actions for WorkloadIc model.
 */
class WorkloadIcController extends Controller
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
     * Lists all WorkloadIc models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WorkloadIcSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WorkloadIc model.
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
     * Creates a new WorkloadIc model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($an)
    {
        $model = new WorkloadIc();
        $fullname = Yii::$app->request->get('fullname');
        $ic_query = WorkloadIc::find()->byAn($an);
        $dataProvider = new ActiveDataProvider([
            'query' => $ic_query,
        ]);

         if (Yii::$app->request->post('WorkloadIc') && isset($an)) {
            $model->attributes = Yii::$app->request->post('WorkloadIc');
            if(Yii::$app->request->post('outer')){ //ถ้าเลือก ติดเชื้อภายนอก รพ. ให้ infect_ward = 999
              $model->infect_ward = 999;
            }
            $model->an = $an;
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
     * Updates an existing WorkloadIc model.
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
     * Deletes an existing WorkloadIc model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $diag_an = $this->findModel($id)->an;
        $fullname = Yii::$app->request->get('fullname');
        $this->findModel($id)->delete();

        return $this->redirect(['workload-ic/create', 'an' => $diag_an, 'fullname' => $fullname]);
    }

    /**
     * Finds the WorkloadIc model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WorkloadIc the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WorkloadIc::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
