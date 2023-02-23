<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Patrocinador]].
 *
 * @see Patrocinador
 */
class PatrocinadoresQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Patrocinador[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Patrocinador|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
