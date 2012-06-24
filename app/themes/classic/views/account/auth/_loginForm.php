<p>The form goes here!</p>

<?php $form = $this->beginWidget('bootstrap.widgets.BootActiveForm', array(
    'id' => 'loginForm',
    'htmlOptions' => array('class' => 'well')
)); /* @var $form BootActiveForm */ ?>

<?= $form->textFieldRow($model, 'login'); ?>
<?= $form->passwordFieldRow($model, 'password'); ?>
<?php echo $form->checkboxRow($model, 'keepSigned'); ?>

<?php $this->widget('bootstrap.widgets.BootButton', array(
    'buttonType' => 'submit',
    'icon'       => 'ok',
    'label'      => Yii::t('account', 'Log me in!'),
)); ?>

<?php $this->endWidget(); ?>