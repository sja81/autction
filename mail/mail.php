<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="container">
    <h3>
        Dobrý deň,
    </h3>
    <p>
    posielam Vám sľúbený odkaz na položku <?= Html::a($title, Url::to('https://aukcia.aoreal.sk/auction/item?id=' . $id)) ?>.
    </p>
    <p>
        S pozdravom
    </p>
    <p>
        Aoreal tím
    </p>
</div>