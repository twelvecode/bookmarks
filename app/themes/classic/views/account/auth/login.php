<div class="row">
    <h1><?= Yii::t('AccountModule.general', 'Sign in now!'); ?></h1>
</div>

<div class="row">
    <div class="span6">
        <h2><?= Yii::t('AccountModule.general', 'Need a reason?'); ?></h2>
    </div>
    <div class="span6">
        <?= $this->renderPartial('_loginForm', array(
            'model' => $form,
        )); ?>

        <h3><?= Yii::t('AccountModule.general', 'You don\'t have an account?'); ?></h3>

        <p><?= Yii::t('AccountModule.general', 'Fill this small registration form the get one right away!'); ?></p>
    </div>
</div>