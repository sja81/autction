<?php

namespace app\models;

use yii\db\ActiveRecord;

class Archiveditems extends ActiveRecord
{
    public static function tableName()
    {
        return 'items_archive';
    }
}
