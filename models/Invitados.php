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
 * @property string $cedula
 * @property int $listainvitadosfk
 * @property string $motivos
 * @property string $nombres_invitado
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
            [['apellido_invitado', 'nombre_invitado', 'motivos', 'nombres_invitado'], 'string'],
            [['usuariofk', 'listainvitadosfk'], 'integer'],
            [['created_at'], 'safe'],
            [['cedula'], 'string', 'max' => 50],
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
            'cedula' => 'Cedula',
            'listainvitadosfk' => 'Listainvitadosfk',
            'motivos' => 'Motivos',
            'nombres_invitado' => 'Nombres Invitado',
        ];
    }
}
