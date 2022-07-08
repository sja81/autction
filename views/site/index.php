<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->registerCssFile('@web/css/site.css');
$this->title = 'Home';
?>
<h2 class="mt-3"> <?= Yii::t('app', 'Auction Groups') ?></h2>
<div class="row my-4">
    <?php
    foreach ($groups as $group) {
    ?>
        <div class="col-sm-12 col-lg-6  group-card p-3">
            <div class="row ">
                <div class="col flex-grow-0">
                <?= Html::a(Html::img('@web/fotec.jpg', ['class' => 'cover-img']),['/auction/view', 'id' => $group->id]) ?>
                </div>
                <div class="col">
                    <div class="mb-2 group-title">
                        <?= Html::a($group->title ,['/auction/view', 'id' => $group->id]) ?>
                    </div>
                    <p>
                        <?= Html::img('@web/flags/'. strtolower($group->country) .'.png', ['class' => 'country-flag mr-1']) .' ' . $group->town . ' - ' .$group->lots . ' lots' ?>
                    </p>
                </div>
            </div>
        </div>

    <?php }
    ?>
</div>