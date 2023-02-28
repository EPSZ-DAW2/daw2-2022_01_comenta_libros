<?php

namespace app\models;
use Yii;
use yii\base\model;
use app\models\Usuarios;

class EditarperfilForm extends model{
 
  public $nick;
  public $nombre;
  public $apellidos;
  public $fecha_nacimiento;
  public $direccion;


  public function rules()
  {
    return [
      [['nick', 'nombre','apellidos'], 'required', 'message' => 'Campo requerido'],
      ['nick', 'match', 'pattern' => "/^.{5,25}$/", 'message' => 'El nick debe contener entre 5 y 25 caracteres'],
      ['nick', 'match', 'pattern' => "/^[0-9a-z]+$/i", 'message' => 'Sólo se aceptan letras y números'],
      ['nick', 'validate_nick', 'message'=>"Ya existe un usuario con ese nick."],
      ['nombre', 'match', 'pattern' => "/^.{1,50}$/", 'message' => 'La longitud máxima del nombre es de 50 caracteres'],
      ['apellidos', 'match', 'pattern' => "/^.{1,100}$/", 'message' => 'La longitud máxima de los apellidos es de 100 caracteres'],
      ['fecha_nacimiento', 'date', 'format' => 'yyyy-mm-dd', 'message' => 'Formato de fecha no válido'],
      ['direccion', 'string'],
    ];
  }
    
  public function validate_nick($attribute, $params)
  {
    //Buscar el username en la tabla
    $table = Usuarios::find()->where("nick=:nick", [":nick" => $this->nick]);

    //Si el username existe mostrar el error
    if ($table->count() == 1)
    {
      $this->addError($attribute, "Ya existe un usuario con ese nombre.");
      return false;
    }
  }

}