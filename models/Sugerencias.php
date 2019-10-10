<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sugerencias".
 *
 * @property int $id
 * @property string $asunto
 * @property string $detalle
 * @property string $created_at
 * @property int $usuariofk
 * @property string $archivo
 */
class Sugerencias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sugerencias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['asunto', 'detalle', 'archivo'], 'string'],
            [['created_at'], 'safe'],
            [['usuariofk'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'asunto' => 'Asunto',
            'detalle' => 'Detalle',
            'created_at' => 'Created At',
            'usuariofk' => 'Usuariofk',
            'archivo' => 'Archivo',
        ];
    }
}
