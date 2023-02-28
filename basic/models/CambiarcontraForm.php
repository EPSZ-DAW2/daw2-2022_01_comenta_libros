<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class CambiarcontraForm extends Model
{
    public $password_old;
    public $password;
    public $password_repeat;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['password_old', 'password', 'password_repeat'], 'required', 'message' => 'Campo obligatorio.'],
            ['password_old',  'match', 'pattern' => "/^.{8,30}$/", 'message'=>'Indica tu actual contraseña.'],
            ['password', 'match', 'pattern' => "/^.{8,30}$/", 'message' => 'La contraseña debe contener entre 8 y 30 caracteres'],
            ['password_repeat','compare', 'compareAttribute' => 'password', 'message' => 'Las contraseñas no coinciden'],
            ['password_old', 'validatePasswordOld'],
            // password is validated by validatePassword()
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePasswordOld()
    {
        $usuario= Usuarios::getSessionUser();
        return hash('sha1', $this->password_old) === $usuario['password'];
    }
}
