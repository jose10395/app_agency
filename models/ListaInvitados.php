<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lista_invitados".
 *
 * @property int $id
 * @property string $fecha
 * @property string $created_at
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
        ];
    }
}
