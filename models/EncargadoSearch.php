<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Encargado;

/**
 * EncargadoSearch represents the model behind the search form of `app\models\Encargado`.
 */
class EncargadoSearch extends Encargado
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_encargado'], 'integer'],
            [['nombre', 'apellido', 'rol', 'fecha_alta', 'estado', 'foto'], 'safe'],
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
        $query = Encargado::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>['pageSize'=>2]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_encargado' => $this->id_encargado,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellido', $this->apellido])
            ->andFilterWhere(['like', 'rol', $this->rol])
            ->andFilterWhere(['like', 'fecha_alta', $this->fecha_alta])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }
}
