<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UserTbl $model */

$this->title = 'Sign up';
$this->params['breadcrumbs'][] = ['label' => 'User Tbls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-tbl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
