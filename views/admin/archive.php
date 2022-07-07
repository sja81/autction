<?php

use yii\grid\GridView;
?>

<h2 class="my-4">
    Archived Auction Groups
</h2>

<?= GridView::widget([
    'dataProvider' => $auctionGroupsDataProvider,
    'pager' => [
        'linkOptions' => ['class' => 'page-link'],
        'disabledPageCssClass' => 'page-link',
    ],
    'columns' => [
        'id',
        [
            'attribute' => 'group_id',
            'label' => 'Group ID',
        ],
        'title',
        'url',
        'country',
        'lots',
        'created_at:datetime',
    ],
    'tableOptions' => [
        'class' => 'table'
    ],
    'summary' => "",
]) ?>

<h2 class="mb-4 mt-5">
    Archived Auction Items
</h2>

<?= GridView::widget([
    'dataProvider' => $auctionItemsDataProvider,
    'pager' => [
        'linkOptions' => ['class' => 'page-link'],
        'disabledPageCssClass' => 'page-link',
    ],
    'columns' => [
        'id',
        [
            'attribute' => 'item_id',
            'label' => 'Item ID',
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