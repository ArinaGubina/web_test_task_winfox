<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\SignupForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Приложение запустилось!</h1>
        <p class="lead">Пожалуйста, оставьте ваши контактные данные</p>
        <?php $form = ActiveForm::begin([
            'id' => 'signup-form',
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}\n{input}\n{error}",
                'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                'inputOptions' => ['class' => 'col-lg-3 form-control'],
                'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
            ],
        ]); ?>

            <?= $form->field($model, 'firstname')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'lastname')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

            <div class="form-group">
                <div class="offset-lg-1 col-lg-11">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
            </div>

        <?php ActiveForm::end(); ?>
        <?php if (isset($result)) : ?>
        <p class="server_response server_response_error-<?= $result['error'] ?>"><?= $result['message'] ?></p>
        <?php endif; ?>
    </div>

</div>
