<?php

namespace backend\modules\sekretariat\organisation\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public $layout = "column2";
	
	public function actionIndex()
    {
        return $this->render('index');
    }
}
