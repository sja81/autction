<?php

namespace console\controllers;

use app\models\Items;
use yii\console\Controller;
use app\models\ArchivedItems;
use app\models\AuctionGroups;
use app\models\ArchivedGroups;

class ArchiveController extends Controller
{
    public function actionGroups()
    {
        $groups = AuctionGroups::find()->where(['status' => '1'])->all();

        foreach ($groups as $group) {
            $archivedGroups = new ArchivedGroups();
            foreach ($group as $col => $value) {
                if ($col == 'id') {
                    $archivedGroups->group_id = $value;
                } else {
                    $archivedGroups->$col = $value;
                }
            }
            $archivedGroups->save();
        }
    }

    public function actionItems()
    {
        $items = Items::find()->where(['status' => '1'])->all();

        foreach ($items as $group) {
            $archivedItems = new ArchivedItems();
            foreach ($group as $col => $value) {
                if ($col == 'id') {
                    $archivedItems->item_id = $value;
                } else {
                    $archivedItems->$col = $value;
                }
            }
            $archivedItems->save();
        }
    }
}
