<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\UserTbl $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-tbl-form">

    <?php $userTypes = array(2 => 'User', 3=> 'Employee'); ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accessToken')->hiddenInput(['value'=>mt_getrandmax()])->label(false); ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_mobile_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_type')
        ->dropDownList(
            $userTypes,           // Flat array ('id'=>'label')
            ['prompt'=>'']    // options
        ); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
