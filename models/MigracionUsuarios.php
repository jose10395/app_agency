<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "migracion_usuarios".
 *
 * @property string $ETAPA
 * @property string $DIRECCION
 * @property string $CEDULA
 * @property string $NOMBRE
 * @property string $CORREOS
 * @property string $USUARIO
 */
class MigracionUsuarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'migracion_usuarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['USUARIO'], 'required'],
            [['ETAPA', 'DIRECCION'], 'string', 'max' => 8],
            [['CEDULA'], 'string', 'max' => 13],
            [['NOMBRE'], 'string', 'max' => 37],
            [['CORREOS'], 'string', 'max' => 72],
            [['USUARIO'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ETAPA' => 'Etapa',
            'DIRECCION' => 'Direccion',
            'CEDULA' => 'Cedula',
            'NOMBRE' => 'Nombre',
            'CORREOS' => 'Correos',
            'USUARIO' => 'Usuario',
        ];
    }
}
