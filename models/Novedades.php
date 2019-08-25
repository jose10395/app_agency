<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "novedades".
 *
 * @property int $id
 * @property int $urbanizacion_etapafk
 * @property string $descripcion
 * @property string $archivo
 * @property string $created_at
 */
class Novedades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'novedades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['urbanizacion_etapafk'], 'integer'],
            [['descripcion', 'archivo'], 'string'],
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
            'urbanizacion_etapafk' => 'Urbanizacion Etapafk',
            'descripcion' => 'Descripcion',
            'archivo' => 'Archivo',
            'created_at' => 'Created At',
        ];
    }
}
