<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Empresa;

/**
 * EmpresaSerch represents the model behind the search form of `app\models\Empresa`.
 */
class EmpresaSerch extends Empresa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_empresa'], 'integer'],
            [['nombre', 'descripcion', 'giro', 'correo', 'telefono', 'fecha_alta', 'estado', 'logo_empresa'], 'safe'],
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
        $query = Empresa::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>[ 'pageSize'=>2]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_empresa' => $this->id_empresa,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'giro', $this->giro])
            ->andFilterWhere(['like', 'correo', $this->correo])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'fecha_alta', $this->fecha_alta])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'logo_empresa', $this->logo_empresa]);

        return $dataProvider;
    }
}
