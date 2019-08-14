<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "urbanizacion_area_social".
 *
 * @property int $id
 * @property int $urbanizacion_etapafk
 * @property string $nombre
 * @property string $created_at
 */
class UrbanizacionAreaSocial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'urbanizacion_area_social';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['urbanizacion_etapafk'], 'required'],
            [['urbanizacion_etapafk'], 'integer'],
            [['nombre'], 'string'],
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
            'nombre' => 'Nombre',
            'created_at' => 'Created At',
        ];
    }
}
