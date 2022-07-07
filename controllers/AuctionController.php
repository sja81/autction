<?php

namespace app\controllers;

use app\mailer\Mail;
use Yii;
use app\models\Bids;
use app\models\Items;
use yii\web\Controller;

class AuctionController extends Controller
{
    public function actionView(int $id)
    {
        return $this->render('view', [
            'items' => Items::find()->where(['group_id' => $id])->all()
        ]);
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    private function saveBids(Bids $bid, array $data): void
    {
        foreach ($data as $col => $value) {
            $bid->$col = $value;
        }
        $bid->save();
    }

    private function saveEmail($data) :void
    {   
        $emailAddresses = explode(',', $data);

        foreach ($emailAddresses as  $emailAddress) {
            $mailer = new Mail($emailAddress, 'Mail', 'mail.php');
            $mailer->sendHTMLMessage();
        }
    }

    public function actionItem(int $id)
    {
        if (Yii::$app->request->isPost) {
            if (Yii::$app->request->post('amount')) {
                $bid = new Bids();
                $data = Yii::$app->request->post();
                $this->saveBids($bid, $data);
            }

            if (Yii::$app->request->post('email')) {
                $data = Yii::$app->request->post();
                $this->saveEmail($data);
            }
        }

        return $this->render('auction-item', [
            'item' => Items::findOne($id),
            'bids' =>  Bids::find()->where(['item_id' => $id])->all(),
            'highestBid' => Bids::find()->where(['item_id' => $id])->orderBy(['amount' => SORT_DESC])->one()
        ]);
    }
}
