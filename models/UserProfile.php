<?php

namespace app\models;

use webvimark\modules\UserManagement\models\User;
use Yii;

/**
 * This is the model class for table "user_profile".
 *
 * @property int $id
 * @property string $apellidos
 * @property string $nombres
 * @property string $email
 * @property int $userid
 * @property string $celular
 * @property string $telefono
 * @property string $nro_casa
 * @property int $urbanizacion_etapafk
 * @property string $direccion
 * @property string $email_opcional
 */
class UserProfile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userid', 'urbanizacion_etapafk'], 'required'],
            [['userid', 'urbanizacion_etapafk'], 'integer'],
            [['direccion'], 'string'],
            [['apellidos', 'nombres'], 'string', 'max' => 200],
            [['email', 'email_opcional'], 'string', 'max' => 100],
            [['celular', 'telefono'], 'string', 'max' => 20],
            [['nro_casa'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'apellidos' => 'Apellidos',
            'nombres' => 'Nombres',
            'email' => 'Email',
            'userid' => 'Userid',
            'celular' => 'Celular',
            'telefono' => 'Telefono',
            'nro_casa' => 'Nro Casa',
            'urbanizacion_etapafk' => 'Urbanizacion Etapafk',
            'direccion' => 'Direccion',
            'email_opcional' => 'Email Opcional',
        ];
    }

    public function getUser()
	{
		return $this->hasOne(User::className(), ['id' => 'userid']);
    }
    public function getFullname(){
        return strtoupper($this->apellidos.' '.$this->nombres);
    }
}
