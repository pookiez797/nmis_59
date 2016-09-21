<?php

namespace app\controllers;

use Yii;
use app\models\WorkloadOther;
use app\models\WorkloadOtherSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

/**
 * WorkloadOtherController implements the CRUD actions for WorkloadOther model.
 */
class WorkloadOtherController extends Controller
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
     * Lists all WorkloadOther models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WorkloadOtherSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WorkloadOther model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionCreate($an)
    {
        $model = new WorkloadOther();
        $ward = Yii::$app->user->identity->ward;
        $fullname = Yii::$app->request->get('fullname');
        $hn = Yii::$app->request->get('hn');
        $other_query = WorkloadOther::find()->byAn($an);
        $dataProvider = new ActiveDataProvider([
            'query' => $other_query,
        ]);

        if (Yii::$app->request->post('WorkloadOther') && isset($an)) {
            $model->attributes = Yii::$app->request->post('WorkloadOther');
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
     * Creates a new WorkloadOther model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    // public function actionCreate()
    // {
    //     $model = new WorkloadOther();
    //
    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->ref]);
    //     } else {
    //         return $this->render('create', [
    //             'model' => $model,
    //         ]);
    //     }
    // }

    /**
     * Updates an existing WorkloadOther model.
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
     * Deletes an existing WorkloadOther model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
     public function actionDelete($id)
     {
       $an = $this->findModel($id)->an;
       $fullname = Yii::$app->request->get('fullname');
       $this->findModel($id)->delete();

       return $this->redirect(['workload-other/create', 'an' => $an, 'fullname' => $fullname]);
     }

    /**
     * Finds the WorkloadOther model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WorkloadOther the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WorkloadOther::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
