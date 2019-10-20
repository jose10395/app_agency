<?php

namespace app\controllers;

use Yii;
use app\models\Novedades;
use app\models\NovedadesSearch;
use app\models\Urbanizacion;
use app\models\UrbanizacionEtapa;
use app\models\UserProfile;
use webvimark\modules\UserManagement\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * NovedadesController implements the CRUD actions for Novedades model.
 */
class NovedadesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'ghost-access' => [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];
    }

    /**
     * Lists all Novedades models.
     * @return mixed
     */
    public function actionIndex()
    {
        $isMaster = \webvimark\modules\UserManagement\models\User::hasRole(['MASTER']);
        if (Yii::$app->user->isSuperadmin || $isMaster) {
            $query = Novedades::find()->orderBy('created_at desc');
        } else {
            $user = UserProfile::find()->where(['userid' => Yii::$app->user->getId()])->one();
            $query = Novedades::find()->where(['urbanizacion_etapafk' => $user->urbanizacion_etapafk])->orderBy('created_at desc');
        }

        $dataProvider =  new ActiveDataProvider([
            'query' => $query 
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Novedades model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Novedades model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Novedades();
        $urbanizaciones = Urbanizacion::find()->all();
        $urbanizacion_list = ArrayHelper::map($urbanizaciones, 'id', 'urbanizacion_nombre');
        if ($model->load(Yii::$app->request->post())) {
            //$user = UserProfile::find()->where(['userid' => Yii::$app->user->getId()])->one();
            $comprobante = \yii\web\UploadedFile::getInstance($model, 'archivo');
            $imagen = \yii\web\UploadedFile::getInstance($model, 'imagen');
            if ($comprobante != null) {
                $nombre_archivo = time() . "-" . uniqid();
                $model->archivo = \yii\web\UploadedFile::getInstance($model, 'archivo');
                $model->archivo->saveAs("archivos/novedades/" . $nombre_archivo . "." . $model->archivo->extension);
                $model->archivo = "archivos/novedades/" . $nombre_archivo . "." . $model->archivo->extension;
            }
            if ($imagen != null) {
                $nombre_archivo = time() . "-" . uniqid();
                $model->imagen = \yii\web\UploadedFile::getInstance($model, 'imagen');
                $model->imagen->saveAs("archivos/novedades/" . $nombre_archivo . "." . $model->imagen->extension);
                $model->imagen = "archivos/novedades/" . $nombre_archivo . "." . $model->imagen->extension;
            }
            //$model->urbanizacion_etapafk = $user->urbanizacion_etapafk;
            if (!$model->save()) {
                print_r($model->getErrors());
                return;
            }
            return $this->redirect('index');
        }

        return $this->render('create', [
            'model' => $model,
            'urbanizacion_list' => $urbanizacion_list
        ]);
    }

    

    /**
     * Updates an existing Novedades model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Novedades model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Novedades model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Novedades the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Novedades::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
