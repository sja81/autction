<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->params['breadcrumbs'][] = 'Archived Auction Items';
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
        // [
        //     'attribute' => 'group_id',
        // ],
        [
            'label' => 'Group name',
            'attribute' => 'title',
            'format' => 'raw',
            'value' => function ($group) {
                return Html::a($group->title, ['admin/archived-items', 'id' => $group['group_id']]);
            }
        ],
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