<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[LibrosImagenes]].
 *
 * @see LibrosImagenes
 */
class LibrosImagenesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return LibrosImagenes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return LibrosImagenes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
