<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[LibrosUrls]].
 *
 * @see LibrosUrls
 */
class LibrosUrlsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return LibrosUrls[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return LibrosUrls|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
