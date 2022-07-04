<?php

namespace app\models;

use yii\db\ActiveRecord;

class Bids extends ActiveRecord
{
    public static function tableName()
    {
        return 'bids';
    }

    public function rules()
    {
        return [
            [['amount','item_id', 'customer_id'], 'required']
        ];
    }

    public function getUser()
    {
    return $this->hasOne(User::class, ['id' => 'customer_id']);
    }
}
