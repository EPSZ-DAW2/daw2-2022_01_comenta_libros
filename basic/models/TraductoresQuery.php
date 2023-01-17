<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Traductores]].
 *
 * @see Traductores
 */
class TraductoresQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Traductores[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Traductores|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
