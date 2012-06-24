<h1><?= Yii::t('AccountModule.general', 'We will miss you!'); ?></h1>

<p>
    <?= Yii::t(
            'AccountModule.general',
            'After all, you can {loginLink} again!',
            array('{loginLink}' => CHtml::link(
                Yii::t('AccountModule.general', 'log in'),
                array('/' . Yii::app()->language . '/account/auth/login')
            ))); ?>
</p>