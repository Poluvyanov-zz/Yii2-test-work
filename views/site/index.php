<?php

/* @var $this yii\web\View */

$this->title = 'Test';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>List of users!</h1>

        <p class="lead">Users with balance.</p>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                <?php foreach ($model as $item): ?>
                    <h3><?=$item->username ?></h3>
                    <h6>Balance: <?=$item->balance['0']->balance ?></h6>
                    <hr>

                <?php endforeach;?>
            </div>

        </div>

    </div>
</div>
