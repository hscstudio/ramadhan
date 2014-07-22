<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ProgramCode */

$this->title = 'Create Program Code';
$this->params['breadcrumbs'][] = ['label' => 'Program Codes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="program-code-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
