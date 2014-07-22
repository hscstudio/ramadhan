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
					['icon'=>'fa fa-dashboard','label' => 'Dashboard', 'url' => ['/sekretariat-organisation/default/index']],
					['icon'=>'fa fa-list','label' => 'Reference', 'url' => ['#'], 'items'=>[
						['icon'=>'fa fa-angle-double-right','label' => 'Graduate', 'url' => ['/sekretariat-organisation/graduate/index'], 'path'=>'/sekretariat-organisation/graduate'],
						['icon'=>'fa fa-angle-double-right','label' => 'Program Code', 'url' => ['/sekretariat-organisation/program-code/index'],'path'=>'/sekretariat-organisation/program-code'],
						['icon'=>'fa fa-angle-double-right','label' => 'Rank Class', 'url' => ['/']],
						['icon'=>'fa fa-angle-double-right','label' => 'Religion', 'url' => ['/']],
						['icon'=>'fa fa-angle-double-right','label' => 'Satker', 'url' => ['/']],
						['icon'=>'fa fa-angle-double-right','label' => 'Unit', 'url' => ['/']],
					]],					
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