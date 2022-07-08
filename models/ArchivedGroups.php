<?php

namespace app\models;

use yii\db\ActiveRecord;

class ArchivedGroups extends ActiveRecord
{
    public static function tableName()
    {
        return 'groups_archive';
    }

    public function getItems()
    {
        return $this->hasMany(Archiveditems::class, ['group_id' => 'group_id']);
    }
}
