<?php

namespace app\controllers;

use app\models\AuthAssignment;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\MigracionUsuarios;
use app\models\Urbanizacion;
use app\models\UrbanizacionAreaSocial;
use app\models\UrbanizacionEtapa;
use app\models\UserProfile;
use yii\helpers\Json;
use webvimark\modules\UserManagement\models\User;
use yii\base\Security;
class SiteController extends Controller
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
        // return [
        //     'access' => [
        //         'class' => AccessControl::className(),
        //         'only' => ['logout'],
        //         'rules' => [
        //             [
        //                 'actions' => ['logout'],
        //                 'allow' => true,
        //                 'roles' => ['@'],
        //             ],
        //         ],
        //     ],
        //     'verbs' => [
        //         'class' => VerbFilter::className(),
        //         'actions' => [
        //             'logout' => ['post'],
        //         ],
        //     ],
        // ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $user = UserProfile::find()->where(['userid' => Yii::$app->user->getId()])->one();

        //return $this->render('index');
        $urbanizaciones = (int) Urbanizacion::find()->count('*');
        $etapas = (int) UrbanizacionEtapa::find()->count('*');
        $areas_sociales = UrbanizacionAreaSocial::find()->count('*');
        return $this->render('index', [
            'urbanizaciones' => $urbanizaciones,
            'etapas' => $etapas,
            'areas_sociales' => $areas_sociales,
            'user' => $user
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionAdmin()
    {
        $urbanizaciones = (int) Urbanizacion::find()->count('*');
        $etapas = (int) UrbanizacionEtapa::find()->count('*');
        $areas_sociales = UrbanizacionAreaSocial::find()->count('*');
        return $this->render('config/admin', [
            'urbanizaciones' => $urbanizaciones,
            'etapas' => $etapas,
            'areas_sociales' => $areas_sociales
        ]);
    }

    public function actionCanchas()
    {
        return $this->render('design/_canchas', []);
    }
    public function actionAreasocial()
    {
        return $this->render('design/_areasocial', []);
    }
    public function actionCuenta()
    {
        return $this->render('design/_estadocuenta', []);
    }
    public function actionPagos()
    {
        return $this->render('design/_pagos', []);
    }

    public function actionEtapas()
    {
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $urbanizacion_id = $parents[0];
                $etapas = UrbanizacionEtapa::find()->select(['id', 'etapa_nombre as name'])
                    ->where(['urbanizacionfk' => $urbanizacion_id])->asArray()->all();

                echo Json::encode(['output' => $etapas, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => 0]);
    }

    public function actionLoad()
    {
        $migracion = MigracionUsuarios::find()
        ->select(['USUARIO',
        "(SUBSTRING_INDEX(NOMBRE,(SUBSTRING_INDEX(NOMBRE,' ',-2)),1)) apellidos",
        "(SUBSTRING_INDEX(NOMBRE,' ',-2)) nombres",
        "substring_index(correos,';',1) correo",
        "replace(substring_index(correos,(substring_index(correos,';',1)), -1),';','') correo2"])
        ->asArray()->all();
        foreach ($migracion as $key => $value) {
            $model = new User();
            $security = new Security();
            $perfil = new UserProfile();
            $model->username = $value['USUARIO'];
            $model->auth_key = $value['USUARIO'];
            $model->password_hash = $security->generatePasswordHash($value['USUARIO']);
            $model->created_at = date('Y-m-d H:i:s');
            $model->updated_at = date('Y-m-d H:i:s');
            if (!$model->save()) {
                print_r($model->getErrors());
            }
        
        // $perfil->load(Yii::$app->request->post());
         $perfil->userid = $model->id;
         $perfil->email = $value['correo'];
        $perfil->apellidos = $value['apellidos'];
        $perfil->nombres = $value['nombres'];
        $perfil->email_opcional = $value['correo2'];
        $perfil->urbanizacion_etapafk=9;
            $perfil->save();

        
            $roles = new AuthAssignment();
            $roles->user_id = $model->id;
            $roles->item_name = 'RESIDENTE';
            $roles->save();
        }

        return;
        
        // $perfil->load(Yii::$app->request->post());
        // $perfil->userid = $model->id;
        // $perfil->email = $model->email;
        // $perfil->save();

        // $rol_datos = Yii::$app->request->post('rol_usuario');
        // $roles = new AuthAssignment();
        // $roles->user_id = $model->id;
        // $roles->item_name = $rol_datos;
        // $roles->save();
    }
}
