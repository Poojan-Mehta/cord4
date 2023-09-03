<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\UserTbl $model */

$this->title = $model->user_id;
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$userType = array(1 => "Admin", 2 => "User", 3 => "Employee");
$userStatus = array(0 => "Inactive", 1 => "Active");

$isLoggedId = false;
$isAdmin = false;
$loginUserData = array();
if(array_key_exists('cord4',$_SESSION)){
        $loginUserData = $_SESSION['cord4']; //we can make it dynamic so no need to store everytime
        $isLoggedId = true;
        /** we can take constant instead of 1 */
        if($loginUserData['user_type'] == 1){
            $isAdmin = true;
        }
}

?>
<div class="user-tbl-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
        /** only admin can activate user account */
        if($isAdmin && !empty($model->accessToken)){
            echo '<div>'. Html::a('Click here to activate this account', ['/user-tbl/activation', 'user_id' => $model->user_id, 'accessToken' => $model->accessToken], ['class' => 'btn btn-primary']).'</div>';
        }

        if (Yii::$app->session->hasFlash('success')) {
            $successMessage = $_SESSION['success'];
            if ($successMessage !== null) {
                echo '<div class="alert alert-success">' . $successMessage . '</div>';
                unset($_SESSION['success']);
            }
        }

    ?>
    <p>
        <?= Html::a('Update', ['update', 'user_id' => $model->user_id], ['class' => 'btn btn-primary']) ?>

        <?= Html::a('Delete', ['delete', 'user_id' => $model->user_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user_id',
            'username',
            'password',
            'user_email:email',
            'user_mobile_no',
            [
                'label' => 'User Type',
                'attribute' => 'user_type',
                'value' => function ($model) use ($userType) {
                    return $userType[$model->user_type];
                },
            ],
            'created_at',
            'updated_at',
            [
                'label' => 'Account status',
                'attribute' => 'user_status',
                'value' => function ($model) use ($userStatus) {
                    return $userStatus[$model->user_status];
                },
            ],
        ],
    ]) ?>

</div>
