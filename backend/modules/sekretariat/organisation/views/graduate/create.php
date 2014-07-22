<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Graduate */

$this->title = 'Create Graduate';
$this->params['breadcrumbs'][] = ['label' => 'Graduates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="graduate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
