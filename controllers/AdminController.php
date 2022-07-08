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
        return $this->render('archive', [
            'auctionGroupsDataProvider' => $auctionGroupsDataProvider
        ]);
    }

    public function actionArchivedItems(int $id)
    {
        $auctionItemsDataProvider = new ActiveDataProvider([
            'query' => ArchivedItems::find()->where(['group_id' => $id]),
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);

        return $this->render('archived-items',[
            'auctionItemsDataProvider' => $auctionItemsDataProvider,
            'items' => ArchivedItems::find()->where(['group_id' => $id])->all()
        ]);
    }
}
