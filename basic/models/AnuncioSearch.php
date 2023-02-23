<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Anuncio;

/**
 * AnuncioSearch represents the model behind the search form of `app\models\Anuncio`.
 */
class AnuncioSearch extends Anuncio
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'patrocinador_id', 'prioridad', 'visible', 'editorial_id', 'libro_id', 'genero_id', 'evento_id', 'crea_usuario_id', 'modi_usuario_id'], 'integer'],
            [['titulo', 'descripcion', 'crea_fecha', 'modi_fecha'], 'safe'],
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
        $query = Anuncio::find();

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
            'patrocinador_id' => $this->patrocinador_id,
            'prioridad' => $this->prioridad,
            'visible' => $this->visible,
            'editorial_id' => $this->editorial_id,
            'libro_id' => $this->libro_id,
            'genero_id' => $this->genero_id,
            'evento_id' => $this->evento_id,
            'crea_usuario_id' => $this->crea_usuario_id,
            'crea_fecha' => $this->crea_fecha,
            'modi_usuario_id' => $this->modi_usuario_id,
            'modi_fecha' => $this->modi_fecha,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
