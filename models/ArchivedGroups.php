<?php

namespace app\models;

use yii\db\ActiveRecord;

class ArchivedGroups extends ActiveRecord
{
    public static function tableName()
    {
        return 'groups_archive';
    }
}
