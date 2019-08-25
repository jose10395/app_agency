<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reservas;

/**
 * ReservasSearch represents the model behind the search form of `app\models\Reservas`.
 */
class ReservasSearch extends Reservas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'usuariofk', 'urbanizacion_area_socialfk'], 'integer'],
            [['nro', 'hora_inicio', 'hora_fin', 'celular', 'created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Reservas::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'usuariofk' => $this->usuariofk,
            'urbanizacion_area_socialfk' => $this->urbanizacion_area_socialfk,
            'hora_inicio' => $this->hora_inicio,
            'hora_fin' => $this->hora_fin,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'nro', $this->nro])
            ->andFilterWhere(['like', 'celular', $this->celular]);

        return $dataProvider;
    }
}
