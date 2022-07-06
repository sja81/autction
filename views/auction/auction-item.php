<?php

use yii\helpers\Html;
use yii\widgets\Pjax;

$this->title = $item->title;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => Yii::$app->request->referrer];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mt-3">
    <h2>
        <?= $this->title ?>
    </h2>
</div>

<div class="item-container row mt-5 w-100 pb-4">
    <div class="col-sm-12 col-lg-1 mr-4">
        <?= Html::img('@web/fotec.jpg', ['class' => 'item-thumbnail mb-2']) ?>
        <?= Html::img('@web/fotec.jpg', ['class' => 'item-thumbnail mb-2']) ?>
        <?= Html::img('@web/fotec.jpg', ['class' => 'item-thumbnail mb-2']) ?>
        <?= Html::img('@web/fotec.jpg', ['class' => 'item-thumbnail mb-2']) ?>
    </div>
    <div class="col-sm-12 col-lg-9 big-img-container">
        <?= Html::img('@web/fotec.jpg', ['class' => 'item-big-image']) ?>
    </div>
    <div class="col bid-container pt-4">
        <?php
        if (Yii::$app->user->isGuest) {
        ?>
            <div class="d-flex flex-column justify-content-center align-items-center w-full">
                <button class="btn btn-primary mb-3 w-75">
                    <a href="/site/login" style="color:white">
                        Log in to bid
                    </a>
                </button>
                <button class="btn btn-secondary w-75 ">
                    <a href="/site/register" style="color:white">
                        Create an account
                    </a>
                </button>
            </div>
        <?php } else { ?>
            <p class="current-bid w-100">
                <?php if (isset($highestBid)) { ?>
                    <?= Yii::t('app', 'Highest Bid:') . ' ' . $highestBid->amount ?>€
                <?php } else { ?>
                    <?= Yii::t('app', 'Highest Bid:') . ' -' ?>
                <?php } ?>

            </p>
            <?php if (!$bids) { ?>
                <p>
                    <?= Yii::t('app', 'No one has bid on this item yet!') ?>
                </p>
            <?php } ?>

            <?php foreach ($bids as $bid) { ?>
                <p>
                    <?= $bid->user->username . ': ' . $bid->amount ?>€
                </p>
            <?php } ?>

            <button type="button" class="btn btn-primary w-50 mb-3" data-toggle="modal" data-target="#form-bid">
                Place your bid
            </button>

            <?php if (Yii::$app->user->identity->user_role === 'admin') { ?>
                <button type="button" class="btn btn-secondary w-50 mb-3" data-toggle="modal" data-target="#admin-form">
                    Send an email
                </button>

                <div class="modal fade" id="admin-form" tabindex="-1" role="dialog" aria-labelledby="admin-form-label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="admin-form-label">Send an email</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p style="font-size: 0.875rem ;">
                                    You can enter multiple emails by adding a comma:  <span style="color: gray;">email@example.com,second-email@example.com</span>
                                </p>
                                <form method="POST" action="#" class="d-flex justify-content-center align-items-center mt-3">
                                    <!-- <input id="form-token" type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->csrfToken ?>"/> -->
                                    <input type="text" name="email" class="form-control mr-2" placeholder="email@example.com" aria-label="Bid" aria-describedby="basic-addon1">
                            </div>  
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary w-25">Send</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php  } ?>

            <div class="modal fade" id="form-bid" tabindex="-1" role="dialog" aria-labelledby="form-bid-label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="form-bid-label">Place your bid</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php Pjax::begin(); ?>
                        <div class="modal-body">
                            <form method="POST" id="bid" action="#" data-pjax="true" class="d-flex justify-content-center align-items-center mt-3">
                                <!-- <input id="form-token" type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->csrfToken ?>"/> -->
                                <input type="hidden" name="customer_id" value=" <?= Yii::$app->user->id ?> ">
                                <input type="hidden" name="item_id" value=" <?= $item->id ?> ">
                                <input type="text" name="amount" class="form-control mr-2" placeholder="Place your bid..." aria-label="Bid" aria-describedby="basic-addon1">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary w-25">Submit</button>
                        </div>
                        </form>
                        <?php Pjax::end() ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<div class="description col mt-5">
    <h4>
        <?= Yii::t('app', 'Description') ?>
    </h4>
    <div class="d-flex justify-content-between w-25 mt-5">
        <div class="description-title mr-5">
            Brand
        </div>

        <div>
            Yamaha
        </div>
    </div>
</div>