<?php 

namespace app\controllers;

use app\models\Items;
use yii\web\Controller;

class AuctionController extends Controller
{
    public function actionView(int $id) 
    {
        return $this->render('view',[
            'items' => Items::find()->where(['group_id' => $id])->all()
        ]);
    }
}