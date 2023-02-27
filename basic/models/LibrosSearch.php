<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Libros;
use app\models\ilustradores;

/**
 * LibrosSearch represents the model behind the search form of `app\models\Libros`.
 */
class LibrosSearch extends Libros
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'autor_id', 'ilustrador_id', 'traductor_id', 'editorial_id', 'genero_id', 'idioma_id', 'paginas', 'visible', 'terminado', 'num_denuncias', 'bloqueado', 'cerrado_comentar', 'sumaValores', 'totalVotos', 'cerrado_eventos', 'crea_usuario_id', 'modi_usuario_id'], 'integer'],
            [['titulo', 'resumen', 'coleccion', 'clase_formato_id', 'imagen_id', 'fecha_terminacion', 'fecha_denuncia1', 'fecha_bloqueo', 'notas_bloqueo', 'crea_fecha', 'modi_fecha', 'notas_admin'], 'safe'],
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
        $query = Libros::find();

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

        // grid filtering  conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'autor_id' => $this->autor_id,
            'ilustrador_id' => $this->ilustrador_id,
            'traductor_id' => $this->traductor_id,
            'editorial_id' => $this->editorial_id,
            'genero_id' => $this->genero_id,
            'idioma_id' => $this->idioma_id,
            'paginas' => $this->paginas,
            'visible' => $this->visible,
            'terminado' => $this->terminado,
            'fecha_terminacion' => $this->fecha_terminacion,
            'num_denuncias' => $this->num_denuncias,
            'fecha_denuncia1' => $this->fecha_denuncia1,
            'bloqueado' => $this->bloqueado,
            'fecha_bloqueo' => $this->fecha_bloqueo,
            'cerrado_comentar' => $this->cerrado_comentar,
            'sumaValores' => $this->sumaValores,
            'totalVotos' => $this->totalVotos,
            'cerrado_eventos' => $this->cerrado_eventos,
            'crea_usuario_id' => $this->crea_usuario_id,
            'crea_fecha' => $this->crea_fecha,
            'modi_usuario_id' => $this->modi_usuario_id,
            'modi_fecha' => $this->modi_fecha,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'resumen', $this->resumen])
            ->andFilterWhere(['like', 'coleccion', $this->coleccion])
            ->andFilterWhere(['like', 'clase_formato_id', $this->clase_formato_id])
            ->andFilterWhere(['like', 'imagen_id', $this->imagen_id])
            ->andFilterWhere(['like', 'notas_bloqueo', $this->notas_bloqueo])
            ->andFilterWhere(['like', 'notas_admin', $this->notas_admin]);

        return $dataProvider;
    }
    
}
