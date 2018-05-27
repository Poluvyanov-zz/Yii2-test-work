<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\ShiftForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Add balance';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>


    <?php if (Yii::$app->session->hasFlash('shiftFormSubmitted')): ?>
            The balance was successfully transferred
    <?php else: ?>


        <?php $form = ActiveForm::begin(['id' => 'shift-form']); ?>

        <?php
        $items = [];
        foreach ($users as $user) {
            $items[$user->username] = $user->username;
        }

        $params = [
            'prompt' => 'Select a user...'
        ];
        echo $form->field($model, 'name')->dropDownList($items, $params);
        ?>

        <?= $form->field($model, 'sum') ?>


        <div class="form-group">
            <?= Html::submitButton('Transfer money', ['class' => 'btn btn-primary', 'name' => 'shift-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    <?php endif; ?>
</div>
