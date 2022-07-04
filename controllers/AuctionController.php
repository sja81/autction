<?php 

namespace app\controllers;

use Yii;
use app\models\Bids;
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
    
    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionItem(int $id)
    {
        $bid = new Bids ();

        if(Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            foreach($data as $col => $value) {
                $bid->$col = $value; 
            }
            $bid->save();
        }

        return $this->render('auction-item',[
            'item' => Items::findOne($id),
            'bids' =>  Bids::find()->where(['item_id' => $id])->all(),
            'highestBid' => Bids::find()->where(['item_id' => $id])->orderBy(['amount' => SORT_DESC])->one()
        ]);
    }
}