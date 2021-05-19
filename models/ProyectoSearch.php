<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Proyecto;

/**
 * ProyectoSearch represents the model behind the search form of `app\models\Proyecto`.
 */
class ProyectoSearch extends Proyecto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_proyecto', 'estado'], 'integer'],
            [['nombre', 'descripcion', 'fecha_alta', 'fecha_inicio', 'fecha_final'], 'safe'],
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
        $query = Proyecto::find();

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
            'id_proyecto' => $this->id_proyecto,
            'estado' => $this->estado,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'fecha_alta', $this->fecha_alta])
            ->andFilterWhere(['like', 'fecha_inicio', $this->fecha_inicio])
            ->andFilterWhere(['like', 'fecha_final', $this->fecha_final]);

        return $dataProvider;
    }
}
