<div class="row">
    <h1><?= Yii::t('account', 'Sign in now!'); ?></h1>
</div>

<div class="row">
    <div class="span6">
        <h2><?= Yii::t('account', 'Need a reason?'); ?></h2>
    </div>
    <div class="span6">
        <?= $this->renderPartial('_loginForm', array(
            'model' => $form,
        )); ?>

        <h3><?= Yii::t('account', 'You don\'t have an account?'); ?></h3>

        <p><?= Yii::t('account', 'Fill this small registration form the get one right away!'); ?></p>
    </div>
</div>