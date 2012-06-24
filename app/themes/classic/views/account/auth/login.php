<div class="row">
    <h1><?= Yii::t('', 'Login!'); ?></h1>
</div>

<div class="row">
    <div class="span6">
        <h2><?= Yii::t('', 'A reason to login?'); ?></h2>
    </div>
    <div class="span6">
        <?= $this->renderPartial('_loginForm', array(
            'model' => $form,
        )); ?>
    </div>
</div>