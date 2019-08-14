<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "invitados".
 *
 * @property int $id
 * @property string $apellido_invitado
 * @property string $nombre_invitado
 * @property int $usuariofk
 * @property string $created_at
 */
class Invitados extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'invitados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['apellido_invitado', 'nombre_invitado'], 'string'],
            [['usuariofk'], 'integer'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'apellido_invitado' => 'Apellido Invitado',
            'nombre_invitado' => 'Nombre Invitado',
            'usuariofk' => 'Usuariofk',
            'created_at' => 'Created At',
        ];
    }
}
