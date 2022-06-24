<?php

use yii\helpers\Html;
$this->registerCssFile('@web/css/site.css');
$this->title = 'Home';
?>
<h2>Auction Groups</h2>
<div class="row ">
    <?php
    foreach ($groups as $group) {
    ?>

        <div class="col-6 group-card p-3">
            <div class="row">
                <div class="col">
                <?= Html::a(Html::img('@web/fotec.jpg'),['/auction/view', 'id' => $group->id]) ?>
                </div>
                <div class="col">
                    <div class="my-1">
                        <?= $group->title ?>
                    </div>
                    <?= $group->country .' ' . $group->town . '-' .$group->lots ?>
                </div>
            </div>
        </div>

    <?php }
    ?>
</div>