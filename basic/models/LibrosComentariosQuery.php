<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[LibrosComentarios]].
 *
 * @see LibrosComentarios
 */
class LibrosComentariosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return LibrosComentarios[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return LibrosComentarios|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
