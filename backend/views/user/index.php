<?php

use common\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\rbac\Role;

/** @var yii\web\View $this */
/** @var common\models\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Users';
?>
<div class="user-index">

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([

        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'Id',
                'format' => 'raw',
                'value' => function ($model, $key, $index) {
                    return Html::a($model->id, ['user/view', 'id' => $model->id]);
                }
            ],
            'username',
            'email:email',
            

            [
                'label' => 'Role',
                'attribute' => 'role',
                'format' => 'raw',
                'value' => function ($model) {
                    if (Yii::$app->authManager->getRolesByUser($model->id) != null) {
                        return array_keys(Yii::$app->authManager->getRolesByUser($model->id))[0];
                    } else {
                        return 'Sem role';
                    }
                },
                //'filter'=>Html::dropDownList(null,null,['admin','gestor','cliente'],['admin','gestor','cliente']),
            ],
            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
