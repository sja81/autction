<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico">
    <link rel="icon" sizes="57x57" href="/images/favicon/favicon-32x32.png">
    <link rel="icon" sizes="57x57" href="/images/favicon/favicon-57x57.png">
    <link rel="icon" sizes="72x72" href="/images/favicon/favicon-72x72.png">
    <link rel="icon" sizes="76x76" href="/images/favicon/favicon-76x76.png">
    <link rel="icon" sizes="114x114" href="/images/favicon/images/favicon/favicon-114x114.png">
    <link rel="icon" sizes="120x120" href="/images/favicon/favicon-120x120.png">
    <link rel="icon" sizes="144x144" href="/images/favicon/favicon-144x144.png">
    <link rel="icon" sizes="152x152" href="/images/favicon/favicon-152x152.png">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md mt-1 navbar-inverse',
        ],
    ]);
    echo '<form method="POST" class="position-relative w-50 mr-2" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search for any item..." aria-label="Search">
                    <div class="position-absolute search-img mr-2">
                        <svg viewBox="0 0 24 24"><path class="heroicon-ui" d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z"></path></svg>
                    </div>
        </form>';
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            (!(Yii::$app->user->isGuest) && Yii::$app->user->identity->user_role) == 'admin'  ? (
                ['label' => 'Archive', 'url' => ['/admin/archive']]
            ) : '' ,
            (!(Yii::$app->user->isGuest) && Yii::$app->user->identity->user_role) == 'admin'  ? (
                ['label' => 'Statistics', 'url' => ['/admin/statistics']]
            ) : '' ,
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
                )
        ],
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
