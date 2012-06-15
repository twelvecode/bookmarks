<?php

class DefaultController extends FrontController
{
	public function actionIndex()
	{
		$this->render('index');
	}
}