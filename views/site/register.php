<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Register';
$this->registerCssFile('@web/css/site.css');
?>

<div class="d-flex justify-content-center align-items-center">
    <div class="site-login">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>Please fill out the following fields to register:</p>

        <?php $form = ActiveForm::begin([
            'id' => 'register-form',
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                'labelOptions' => ['class' => 'col col-form-label'],
            ],
        ]); ?>

        <?= $form->field($model, 'firstName')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'lastName')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'phoneNumber')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'password_repeat')->passwordInput() ?>

        <div class="form-group">
            <div class="col-lg-11">
                <?= Html::submitButton('Register', ['class' => 'btn btn-primary px-3', 'name' => 'register-button']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>