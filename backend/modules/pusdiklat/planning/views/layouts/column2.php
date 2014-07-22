<?php
use yii\helpers\Html;
use hscstudio\heart\widgets\NavSide;
use hscstudio\heart\widgets\Breadcrumbs;
/**
 * @var \yii\web\View $this
 * @var string $content
 */
?>
<?php $this->beginContent('@app/views/layouts/main.php'); ?>
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">                
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
			<?= NavSide::widget([
				'items' => [
					['icon'=>'fa fa-dashboard','label' => 'Dashboard', 'url' => ['/pusdiklat-planning/default/index']],
					['icon'=>'fa fa-calendar','label' => 'Program', 'url' => ['/'], 'items'=>[
						['icon'=>'fa fa-angle-double-right','label' => 'CRUD Program', 'url' => ['/']],
						['icon'=>'fa fa-angle-double-right','label' => 'CRUD Diklat', 'url' => ['/']],
					]],
					['icon'=>'fa fa-book','label' => 'Kurikulum', 'url' => ['/']],
					['icon'=>'fa fa-user','label' => 'Tenaga Pengajar', 'url' => ['/']],
				]
			]) ?>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">   
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1><?= Html::encode($this->title) ?></h1>
        </section>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <!-- Main content -->
        <section class="content">
            <?= $content ?>
        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->
<?php $this->endContent();