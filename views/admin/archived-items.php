<?php

use yii\grid\GridView;

$this->params['breadcrumbs'][] = ['label' => 'Archived Groups', 'url' => Yii::$app->request->referrer];
$this->params['breadcrumbs'][] = 'Archived Auction Items';
?>  

<h2 class="my-4">
    Archived Auction Items
</h2>

<?= GridView::widget([
    'dataProvider' => $auctionItemsDataProvider,
    'pager' => [
        'linkOptions' => ['class' => 'page-link'],
        'disabledPageCssClass' => 'page-link',
    ],
    'columns' => [
        [
            'label' => 'Group name',
            'attribute' => 'title',
            'format' => 'raw',
            'value' => function ($data) {
                return $data->group->title;
            }
        ],
        'title',
        'country',
        'last_bid',
        'created_at:datetime',
    ],
    'tableOptions' => [
        'class'=>'table'
    ],
    'summary'=> "",
]) ?>