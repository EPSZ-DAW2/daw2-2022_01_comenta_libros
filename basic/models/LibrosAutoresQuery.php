<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[LibrosAutores]].
 *
 * @see LibrosAutores
 */
class LibrosAutoresQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return LibrosAutores[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return LibrosAutores|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
