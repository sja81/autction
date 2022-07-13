<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Auction Items');
$this->registerCssFile('@web/css/site.css');
$this->params['breadcrumbs'][] = $this->title;
?>
<h2 class="mt-3 mb-4"> <?= $this->title ?> </h2>
<div class="col-12 auction-items-container">
        <?php foreach ($items as $item) { ?>
            <div class="row mb-4 align-items-center justify-content-center">
                <div class="row item-container d-flex mx-auto w-100">
                    <div class="col-12 col-sm-5 col-md-4 col-lg-3 col-xl-2 img">
                            <?= Html::a(Html::img('@web/fotec.jpg', ['class' => 'item-img']), ['/auction/item', 'id' => $item->id]) ?>
                    </div>
                    <div class="col-12 col-sm-4 col-md-6 item-description w-auto p-1 ml-2 ml-sm-0">
                        <?= Html::a($item->title, ['/auction/item', 'id' => $item->id]) ?>
                        <div class="items-country mt-1 mt-sm-3">
                        <p><?= Html::img('@web/flags/'. strtolower($item->country) .'.png', ['class' => 'country-flag']) .' ' . $item->town?></p>
                        </div>
                        <div class="description">
                             <?= $item->description ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
</div>