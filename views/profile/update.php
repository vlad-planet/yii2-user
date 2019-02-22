<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;
/* @var $this yii\web\View */
/* @var $model vladplanet\user\models\User */
 
$this->title = Yii::t('app', 'TITLE_UPDATE');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'TITLE_PROFILE'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-profile-update">
 
    <h1><?= Html::encode($this->title); ?></h1>

	<?php $obj = new yii\widgets\ActiveForm(); ?>

	<?php if(!$image->image && empty($model->avatar)): ?>
	<?  $image->image = 'default.jpg' ?>
	<?php endif; ?>
	<?php if(!$image->image && !empty($model->avatar)): ?>
	<? $image->image = $model->avatar ?>
	<?php endif; ?>

	<?php $form = $obj::begin() ?>
	<?= $form->field($image, 'image')->fileInput() ?>
	<img width="100" src="\img\user\uploads/thumb_<?= $image->image ?>">
	<button>Загрузить</button>
	<?php $obj::end() ?>
 
    <div class="user-form">

		<?php $form = ActiveForm::begin([]); ?>
		
		<?= $form->field($model, 'username')->input('text', ['maxlength' => true]) ?>
		<?= $form->field($model, 'email')->input('email', ['maxlength' => true]) ?>
		<?= $form->field($model, 'firstname')->input('text', ['maxlength' => true]) ?>
		<?= $form->field($model, 'lastname')->input('text', ['maxlength' => true]) ?>
		<?= $form->field($model, 'phone')->widget(MaskedInput::className(),['mask' => '+7(999)-999-99-99']);?>
		<?= $form->field($model, 'birthdate')->input('date', ['maxlength' => true]) ?>
		<?= $form->field($model, 'avatar')->hiddenInput(['value'=> $image->image])->label(false); ?>
		 
		<div class="form-group">
			<?= Html::submitButton(Yii::t('app', 'BUTTON_SAVE'), ['class' => 'btn btn-primary']) ?>
		</div>
		 
		<?php ActiveForm::end(); ?>
		
	</div>
 
</div>

