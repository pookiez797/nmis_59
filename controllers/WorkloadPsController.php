<?php

namespace app\controllers;

use Yii;
use app\models\WorkloadPs;
use app\models\WorkloadPsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

/**
 * WorkloadPsController implements the CRUD actions for WorkloadPs model.
 */
class WorkloadPsController extends Controller
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
     * Lists all WorkloadPs models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WorkloadPsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WorkloadPs model.
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
     * Creates a new WorkloadPs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    

    public function actionCreate($an)
    {
        $model = new WorkloadPs();
        $ward = Yii::$app->user->identity->ward;
        $fullname = Yii::$app->request->get('fullname');
        $hn = Yii::$app->request->get('hn');
        $ps_query = WorkloadPs::find()->byAn($an);
        $dataProvider = new ActiveDataProvider([
            'query' => $ps_query,
        ]);

        if (Yii::$app->request->post('WorkloadPs') && isset($an)) {
            $model->attributes = Yii::$app->request->post('WorkloadPs');
            $model->an = $an;
            // $model->reporter = $ward;
            $model->save();
            return $this->refresh();
            // return $this->redirect(['view', 'id' => $model->ref]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'dataProvider' => $dataProvider,
                'fullname' => $fullname,
            ]);
        }
    }

    /**
     * Updates an existing WorkloadPs model.
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
     * Deletes an existing WorkloadPs model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
       $an = $this->findModel($id)->an;
       $fullname = Yii::$app->request->get('fullname');
       $this->findModel($id)->delete();

       return $this->redirect(['workload-ps/create', 'an' => $an, 'fullname' => $fullname]);

    }

    /**
     * Finds the WorkloadPs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WorkloadPs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WorkloadPs::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
