<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Ilustradores]].
 *
 * @see Ilustradores
 */
class IlustradoresQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Ilustradores[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Ilustradores|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
