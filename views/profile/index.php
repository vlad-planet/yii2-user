<?php
 
use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model vladplanet\user\models\User */
 
$this->title = Yii::t('app', 'TITLE_PROFILE');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile">
		<? if(empty($model->avatar)){$model->avatar = 'default.jpg';} ?> 
    <h1><?= Html::encode($this->title) ?> <img width="100" src="\img\user\uploads/thumb_<?= $model->avatar ?>"></h1>
	
    <p>
        <?= Html::a(Yii::t('app', 'BUTTON_UPDATE'), ['update'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'LINK_PASSWORD_CHANGE'), ['password-change'], ['class' => 'btn btn-primary']) ?>
    </p>
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'email',
			'firstname',
			'lastname',
			'phone',
			'birthdate',
			//'avatar'
        ],
    ]) ?>
 
</div>
