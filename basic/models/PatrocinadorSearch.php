<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Patrocinador;

/**
 * PatrocinadorSearch represents the model behind the search form of `app\models\Patrocinador`.
 */
class PatrocinadorSearch extends Patrocinador
{
	public $nick; // Nick del patrocinador en la tabla de usuarios
	
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'usuario_id'], 'integer'],
            [['nif_cif', 'razon_social', 'telefono_comercial', 'telefono_contacto', 'url', 'fecha_alta', 'nick'], 'safe'],
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
        $query = Patrocinador::find();

        // add conditions that should always apply here
		$query->joinWith(['nickname']);
		
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'nif_cif', $this->nif_cif])
            ->andFilterWhere(['like', 'razon_social', $this->razon_social])
            ->andFilterWhere(['like', 'telefono_comercial', $this->telefono_comercial])
            ->andFilterWhere(['like', 'telefono_contacto', $this->telefono_contacto])
            ->andFilterWhere(['like', 'url', $this->url])
			->andFilterWhere(['like', 'nick', $this->nick]);

        return $dataProvider;
    }
}
