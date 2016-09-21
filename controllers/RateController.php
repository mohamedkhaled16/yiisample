<?php

namespace app\controllers;

use Yii;
use app\models\Rate;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RateController implements the CRUD actions for Rate model.
 */
class RateController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Rate models.
     * @return mixed
     */
    public function actionIndex() {
        $dataProvider = new ActiveDataProvider([
            'query' => Rate::find(),
        ]);

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Rate model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Rate model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Rate();
        if ($model->load(Yii::$app->request->post())) {
            $model->addtion_var = Rate::ADDTION_VAR;
            $model->deductible = ($_POST['Rate']['buy_back_limit'] > 8000) ? (0.07 * $_POST['Rate']['buy_back_limit']) : (0.05 * $_POST['Rate']['buy_back_limit']);
            $model->premium = (($_POST['Rate']['buy_back_limit'] - $model->deductible) * ($_POST['Rate']['base_rate'] * (Rate::ADDTION_VAR + ($_POST['Rate']['debit_modification'] - $_POST['Rate']['credit_modification']))));
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Rate model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->addtion_var = Rate::ADDTION_VAR;

            $model->deductible = ($_POST['Rate']['buy_back_limit'] > 8000) ? (0.07 * $_POST['Rate']['buy_back_limit']) : (0.05 * $_POST['Rate']['buy_back_limit']);
            $model->premium = (($_POST['Rate']['buy_back_limit'] - $model->deductible) * ($_POST['Rate']['base_rate'] * (Rate::ADDTION_VAR + ($_POST['Rate']['debit_modification'] - $_POST['Rate']['credit_modification']))));
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Rate model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Rate model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rate the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Rate::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
