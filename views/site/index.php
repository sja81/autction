<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->registerCssFile('@web/css/site.css');
$this->title = 'Home';
?>
<h2 class="mt-3 ml-3"> <?= Yii::t('app', 'Auction Groups') ?></h2>
<div class="row group-container w-100 my-4 mx-auto">
    <?php
    foreach ($groups as $group) {
    ?>
        <div class="col-12 col-xl-6 group-card p-3">
            <div class="row auction-groups">
                <div class="col-12 col-sm flex-grow-0">
                <?= Html::a(Html::img('@web/fotec.jpg', ['class' => 'cover-img']),['/auction/view', 'id' => $group->id]) ?>
                </div>
                <div class="col-12 col-sm-6 col-md-7 col-lg-7 col-xl-6 mt-2 mt  -sm-0">
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