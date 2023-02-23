<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LibrosResumen;

/**
 * LibrosResumenSearch represents the model behind the search form of `app\models\LibrosResumen`.
 */
class LibrosResumenSearch extends LibrosResumen
{
	public $autor;
	public $genero;
	public $editorial;
	
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'autor_id', 'ilustrador_id', 'traductor_id', 'editorial_id', 'genero_id', 'idioma_id', 'paginas', 'visible', 'terminado', 'num_denuncias', 'bloqueado', 'cerrado_comentar', 'sumaValores', 'totalVotos', 'cerrado_eventos', 'crea_usuario_id', 'modi_usuario_id'], 'integer'],
            [['titulo', 'resumen', 'coleccion', 'clase_formato_id', 'imagen_id', 'fecha_terminacion', 'fecha_denuncia1', 'fecha_bloqueo', 'notas_bloqueo', 'crea_fecha', 'modi_fecha', 'notas_admin', 'autor', 'genero', 'editorial'], 'safe'],
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
        $query = LibrosResumen::find();

        // add conditions that should always apply here
		$query->joinWith(['autorname','editorialname','generoname']);


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
		

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'resumen', $this->resumen])
			->andFilterWhere(['like', 'autor', $this->autor])
			->andFilterWhere(['like', 'editorial', $this->editorial])
			->andFilterWhere(['like', 'genero', $this->genero]);

        return $dataProvider;
    }
}
