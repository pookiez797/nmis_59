<?php

namespace app\controllers;

use Yii;
use app\models\WorkloadGcs;
use app\models\WorkloadGcsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

/**
 * WorkloadGcsController implements the CRUD actions for WorkloadGcs model.
 */
class WorkloadGcsController extends Controller
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
     * Lists all WorkloadGcs models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WorkloadGcsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WorkloadGcs model.
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
     * Creates a new WorkloadGcs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($an)
    {
        $model = new WorkloadGcs();
        $ward = Yii::$app->user->identity->ward;
        $fullname = Yii::$app->request->get('fullname');
        $hn = Yii::$app->request->get('hn');
        $gcs_query = WorkloadGcs::find()->byAn($an);
        $dataProvider = new ActiveDataProvider([
            'query' => $gcs_query,
        ]);

        if (Yii::$app->request->post('WorkloadGcs') && isset($an)) {
            $model->attributes = Yii::$app->request->post('WorkloadGcs');
            $model->an = $an;
            $model->hn = $hn;
            $model->ward = $ward;
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
     * Updates an existing WorkloadGcs model.
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
     * Deletes an existing WorkloadGcs model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
       $diag_an = $this->findModel($id)->an;
        $fullname = Yii::$app->request->get('fullname');
        $this->findModel($id)->delete();

        return $this->redirect(['workload-gcs/create', 'an' => $diag_an, 'fullname' => $fullname]);
    
    }

    /**
     * Finds the WorkloadGcs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WorkloadGcs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WorkloadGcs::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
