<?php

namespace backend\modules\pusdiklat\planning\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public $layout = "column2";
	public function actionIndex()
    {
        return $this->render('index');
    }
}
