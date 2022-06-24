<?php 
$this->registerCssFile('@web/css/site.css');
    foreach($items as $item)
    {
        echo $item->title;
    }
?>