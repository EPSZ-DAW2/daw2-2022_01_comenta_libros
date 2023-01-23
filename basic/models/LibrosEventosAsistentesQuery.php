<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[LibrosEventosAsistentes]].
 *
 * @see LibrosEventosAsistentes
 */
class LibrosEventosAsistentesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return LibrosEventosAsistentes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return LibrosEventosAsistentes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
