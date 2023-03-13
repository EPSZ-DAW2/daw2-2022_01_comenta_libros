<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UsuarioLibros;

/**
 * UsuarioLibrosSearch represents the model behind the search form of `app\models\UsuarioLibros`.
 */
class UsuarioLibrosSearch extends UsuarioLibros
{
    public $usuario;
    public $libro;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'usuario_id', 'local_id'], 'integer'],
            [['fecha_seguimiento', 'usuario','libro'], 'safe'],
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
        $query = UsuarioLibros::find();

        // add conditions that should always apply here
        $query->joinWith(['usuarioname','libroname']);

        

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
            'usuario_id' => $this->usuario_id,
            'local_id' => $this->local_id,
            'fecha_seguimiento' => $this->fecha_seguimiento,
            'usuario' => $this->usuario,
            'libro' => $this->libro,
        ]);

        return $dataProvider;
    }
}
