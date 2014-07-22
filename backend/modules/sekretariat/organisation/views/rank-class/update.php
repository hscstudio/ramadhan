<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RankClass */

$this->title = 'Update Rank Class: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Rank Classes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rank-class-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
