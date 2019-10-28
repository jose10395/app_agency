<?php

namespace app\controllers;

use Yii;
use app\models\Invitados;
use app\models\search\InvitadosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InvitadosController implements the CRUD actions for Invitados model.
 */
class InvitadosController extends Controller {

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
     * Lists all Invitados models.
     * @return mixed
     */
    public function actionIndex() {
        $isUsuario = \webvimark\modules\UserManagement\models\User::hasRole(['RESIDENTE']);
        $searchModel = new InvitadosSearch();
        $query_user = \app\models\ListaInvitados::find()->where(['usuariofk' => Yii::$app->user->getId()]);
        $query_admin = \app\models\ListaInvitados::find();
        $query = ($isUsuario) ? $query_user : $query_admin;
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query
        ]);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id) {
        $invitados = Invitados::find()->where(['listainvitadosfk' => $id]);
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $invitados
        ]);
        return $this->render('view', [
                    'dataProvider' => $dataProvider,
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Invitados model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Invitados();
        $lista = new \app\models\ListaInvitados();
        if (Yii::$app->request->post()) {

            $lista->load(Yii::$app->request->post());
            $lista->usuariofk = Yii::$app->user->identity->getId();
            $lista->notas = strtoupper($lista->notas);
            $lista->save();

            $invitados = \app\models\Model::createMultiple(Invitados::class);
            \app\models\Model::loadMultiple($invitados, Yii::$app->request->post());

            foreach ($invitados as $invitado) {
                $invitado->usuariofk = Yii::$app->user->identity->getId();
                $invitado->listainvitadosfk = $lista->id;
                if ($invitado->validate()) {
                    if (!$invitado->save()) {
                        print_r($invitado->getErrors());
                        return;
                    }
                }
            }
            //$model->usuariofk = Yii::$app->user->identity->getId();
            //$model->save();
            return $this->redirect(['index']);
            //return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
                    'model' => $model,
                    'lista' => $lista
        ]);
    }

    /**
     * Updates an existing Invitados model.
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
     * Deletes an existing Invitados model.
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
     * Finds the Invitados model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Invitados the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Invitados::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
