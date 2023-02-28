<?php
namespace app\models;

use yii\db\ActiveRecord;

class UsuarioGeneros extends ActiveRecord
{
    public static function tableName()
    {
        return 'usuarios_generos';
    }

    public function rules()
    {
        return [
            [['usuario_id'], 'required'],
            [['genero_id'], 'required'],
        ];
    }
}

?>