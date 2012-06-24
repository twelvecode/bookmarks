<?php

class LanguageController extends \CController
{
    protected $supportedLanguages = ['pl', 'en', 'de'];

    public function actionChange($lang)
    {
        if (!in_array($lang, $this->supportedLanguages)) {
            throw new ErrorException('Unsupported language!');
        }

        $this->redirect(array('/' . Yii::app()->language));
    }

} // LanguageController
