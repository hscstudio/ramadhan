<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ProgramCode */

$this->title = 'Update Program Code: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Program Codes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="program-code-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
