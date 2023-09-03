<?php

use app\models\UserTbl;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'User Tbls';
$this->params['breadcrumbs'][] = $this->title;

$userStatus = array(0 => "Inactive", 1 => "Active");
$isLoggedId = false;
$loginUserData = array();

if(array_key_exists('cord4',$_SESSION)){
        $loginUserData = $_SESSION['cord4']; //we can make it dynamic so no need to store everytime
        $isLoggedId = true;
}

?>
<div class="user-tbl-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User Tbl', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'username',
            'user_email:email',
            'user_mobile_no',
            [
                'label' => 'User Status',
                'attribute' => 'user_status',
                'value' => function ($model) use ($userStatus) {
                    return $userStatus[$model->user_status];
                },
            ],
            $isLoggedId ? 
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, UserTbl $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'user_id' => $model->user_id]);
                 }
            ] : ['visible' => $isLoggedId,],
        ],
    ]); ?>


</div>
