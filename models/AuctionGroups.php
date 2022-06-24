<?php

namespace app\models;

use yii\db\ActiveRecord;

class AuctionGroups extends ActiveRecord
{
    public static function tableName()
    {
        return 'groups';
    }
}
