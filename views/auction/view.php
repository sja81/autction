<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Items');
$this->registerCssFile('@web/css/site.css');
$this->params['breadcrumbs'][] = $this->title;
?>
<h2 class="mt-3 mb-5"> <?= $this->title ?> </h2>
<div class="col-12">
        <?php foreach ($items as $item) { ?>
            <div class="row mb-4">
                <div class="item-container d-flex mx-auto">
                    <div class="img mr-4 mb-2">
                        <?= Html::a(Html::img('@web/fotec.jpg', ['class' => 'cover-img']), ['/auction/item', 'id' => $item->id]) ?>
                    </div>
                    <div class="item-description w-auto p-1">
                        <?= Html::a($item->title, ['/auction/item', 'id' => $item->id]) ?>
                        <div class="items-country mt-4">
                        <p>
                        <?= Html::img('@web/flags/'. strtolower($item->country) .'.png', ['class' => 'country-flag']) .' ' . $item->town?>
                    </p>
                        </div>
                        <div class="description">
                            <?= Yii::t('app', 'Description:') ?> <?= $item->description ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
</div>