<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[UsuarioLibros]].
 *
 * @see UsuarioLibros
 */
class UsuarioLibrosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UsuarioLibros[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UsuarioLibros|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
