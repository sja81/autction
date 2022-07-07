<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\ArchivedItems;
use app\models\ArchivedGroups;
use yii\data\ActiveDataProvider;

class AdminController extends Controller
{
    public function actionArchive()
    {
        $auctionGroupsDataProvider = new ActiveDataProvider([
            'query' => ArchivedGroups::find(),
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);

        $auctionItemsDataProvider = new ActiveDataProvider([
            'query' => ArchivedItems::find(),
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);

        return $this->render('archive', [
            'auctionGroupsDataProvider' => $auctionGroupsDataProvider,
            'auctionItemsDataProvider' => $auctionItemsDataProvider
        ]);
    }
}
