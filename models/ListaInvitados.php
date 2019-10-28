<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lista_invitados".
 *
 * @property int $id
 * @property string $fecha
 * @property string $created_at
 * @property int $usuariofk
 * @property string $notas
 */
class ListaInvitados extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lista_invitados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha', 'created_at'], 'safe'],
            [['usuariofk'], 'integer'],
            [['notas'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha' => 'Fecha',
            'created_at' => 'Created At',
            'usuariofk' => 'Usuariofk',
            'notas' => 'Notas',
        ];
    }
}
