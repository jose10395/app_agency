<?php

namespace app\controllers;

use Yii;
use app\models\Reservas;
use app\models\ReservasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReservasController implements the CRUD actions for Reservas model.
 */
class ReservasController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'ghost-access' => [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];
    }

    /**
     * Lists all Reservas models.
     * @return mixed
     */
    public function actionIndex() {
        $isUsuario = \webvimark\modules\UserManagement\models\User::hasRole(['RESIDENTE']);
        $searchModel = new ReservasSearch();        
        $query_user = Reservas::find()->where(['usuariofk'=>Yii::$app->user->getId()]);
        $query_admin = Reservas::find();
        $query = ($isUsuario)? $query_user:$query_admin;
        $dataProvider = new \yii\data\ActiveDataProvider([
           'query' =>$query
        ]);
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reservas model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate() {
        $model = new Reservas();
        $usuario = \app\models\UserProfile::find()->where(['userid' => Yii::$app->user->getId()])->one();
        $areas_sociales = \app\models\UrbanizacionAreaSocial::find()
                        ->where(['urbanizacion_etapafk' => $usuario->urbanizacion_etapafk])->all();
        $list_areas = \yii\helpers\ArrayHelper::map($areas_sociales, 'id', 'nombre');
        $urbanizacion = \app\models\Urbanizacion::find()
                ->innerJoin('urbanizacion_etapa', 'urbanizacion.id=urbanizacion_etapa.urbanizacionfk')
                ->where(['urbanizacion_etapa.id' => $usuario->urbanizacion_etapafk])
                ->one();

        $numero_reserva = Reservas::find()->orderBy('id desc')->one();
        $nro_reserva = ($numero_reserva != null) ? $numero_reserva->nro + 1 : 1;

        if ($model->load(Yii::$app->request->post())) {
            $model->usuariofk = Yii::$app->user->getId();
            $model->nro = (string) $nro_reserva;
            $model->save();
            //return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['index']);
        }

        return $this->render('create', [
                    'model' => $model,
                    'list_areas' => $list_areas,
                    'urbanizacion' => $urbanizacion,
                    'nro_reserva' => $nro_reserva
        ]);
    }

    /**
     * Updates an existing Reservas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Reservas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Reservas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Reservas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Reservas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
