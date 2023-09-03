<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UserTbl $model */

$this->title = 'Update : ' . $model->user_id;
$this->params['breadcrumbs'][] = ['label' => 'User Tbls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_id, 'url' => ['view', 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-tbl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
