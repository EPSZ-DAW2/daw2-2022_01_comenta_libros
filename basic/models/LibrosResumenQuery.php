<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[LibrosResumen]].
 *
 * @see LibrosResumen
 */
class LibrosResumenQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return LibrosResumen[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return LibrosResumen|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
