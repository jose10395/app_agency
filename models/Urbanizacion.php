<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "urbanizacion".
 *
 * @property int $id
 * @property string $urbanizacion_nombre
 * @property string $created_at
 */
class Urbanizacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'urbanizacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['urbanizacion_nombre'], 'string'],
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
            'urbanizacion_nombre' => 'Urbanizacion Nombre',
            'created_at' => 'Created At',
        ];
    }
}
