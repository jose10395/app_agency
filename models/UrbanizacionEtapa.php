<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "urbanizacion_etapa".
 *
 * @property int $id
 * @property int $urbanizacionfk
 * @property string $etapa_nombre
 * @property string $created_at
 */
class UrbanizacionEtapa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'urbanizacion_etapa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['urbanizacionfk'], 'required'],
            [['urbanizacionfk'], 'integer'],
            [['etapa_nombre'], 'string'],
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
            'urbanizacionfk' => 'Urbanización',
            'etapa_nombre' => 'Nombre de Etapa',
            'created_at' => 'Created At',
        ];
    }

    public function getUrbanizacionfk0()
    {
        return $this->hasOne(Urbanizacion::className(), ['id' => 'urbanizacionfk']);
    }
}
