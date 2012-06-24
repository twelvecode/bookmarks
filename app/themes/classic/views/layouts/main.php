<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/' . Yii::app()->language . '/site/index')),
				array('label'=>'About', 'url'=>array('/' . Yii::app()->language . '/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/' . Yii::app()->language . '/site/contact')),
				array('label'=>'Login', 'url' => array('/' . Yii::app()->language . '/account/auth/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/' . Yii::app()->language . '/account/auth/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
    <div>
        <p>
            <b>Language:</b>
            <?= CHtml::link('Polski',  array('/language/pl')); ?>
            <?= CHtml::link('English', array('/language/en')); ?>
            <?= CHtml::link('Deutsch', array('/language/de')); ?>
        </p>
    </div>
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
        Bookmarks v<?= Yii::app()->params['version']; ?><br />
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
