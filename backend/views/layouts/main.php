<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
//use yii\widgets\Breadcrumbs;

use hscstudio\heart\widgets\Nav;
use hscstudio\heart\widgets\NavBar;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => '<i class="fa fa-th-large"></i> SIM BPPK',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
                'innerContainerOptions'=>[
                    'class' => 'container-fluid',
                ]
            ]);
            $menuItems = [];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Register', 'url' => ['/user/registration/register']];
				$menuItems[] = ['label' => 'Login', 'url' => ['/user/security/login']];
            } else {
                $menuItemsLeft[] =
                    ['icon'=>'fa fa-cogs fa-fw','label' => 'ADMIN', 'url' => ['/administrator/default/index'], 'items' => [
                        ['icon'=>'fa fa-cogs fa-fw','label'=>'Generator', 'url'=> ['/gii']],
                        ['icon'=>'fa fa-warning fa-fw','label'=>'Privileges', 'url'=> ['/privilege/assigment'],'path'=>'privilege'],
                        ['icon'=>'fa fa-key fa-fw','label'=>'Users', 'url'=> ['/user/admin'],'path'=>'user'],
                    ]];
				$menuItemsLeft[] =
                    ['icon'=>'fa fa-sitemap fa-fw','label' => 'SEKRETARIAT', 'url' => '#', 'items' => [
                        ['icon'=>'fa fa-sitemap fa-fw','label'=>'Organisation', 'url'=> ['/sekretariat-organisation'],'path'=>'sekretariat-organisation' ],
                        ['icon'=>'fa fa-users fa-fw','label'=>'Employee', 'url'=> ['/employee/default/index'] ],
                        ['icon'=>'fa fa-money fa-fw','label'=>'Finance', 'url'=> ['/finance/default/index'] ],
                        ['icon'=>'fa fa-desktop fa-fw','label'=>'Information Technology', 'url'=> ['/it/default/index'] ],
                        ['icon'=>'fa fa-support fa-fw','label'=>'General', 'url'=> ['/general/default/index'] ],
                    ]];

                $menuItemsLeft[] =
                    ['icon'=>'fa fa-book fa-fw','label' => 'PUSDIKLAT', 'url' => ['#'], 'items' => [
                        ['icon'=>'fa fa-cogs fa-fw','label'=>'General', 'url'=> ['/pusdiklat']],
                        ['icon'=>'fa fa-th-list fa-fw','label'=>'Planning', 'url'=> ['/pusdiklat-planning'], 'path'=>'pusdiklat-planning'],
                        ['icon'=>'fa fa-refresh fa-fw','label'=>'Execution', 'url'=> ['/pusdiklat']],
                        ['icon'=>'fa fa-check-square-o fa-fw','label'=>'Evaluation', 'url'=> ['/pusdiklat']],
                        '<li class="divider"></li>',
                        ['icon'=>'fa fa-cogs fa-fw','label'=>'General', 'url'=> ['/pusdiklat']],
                        ['icon'=>'fa fa-book fa-fw','label'=>'Training', 'url'=> ['/pusdiklat']],
                        ['icon'=>'fa fa-sort-numeric-asc fa-fw','label'=>'Test', 'url'=> ['/pusdiklat']],
						['icon'=>'fa fa-graduation-cap fa-fw','label'=>'Scholarship', 'url'=> ['/pusdiklat']],
                    ]];
                $menuItemsLeft[] =
                    ['icon'=>'fa fa-book fa-fw','label' => 'BDK', 'url' => ['#'], 'items' => [
                        ['icon'=>'fa fa-cogs fa-fw','label'=>'General', 'url'=> ['/pusdiklat']],
                        ['icon'=>'fa fa-refresh fa-fw','label'=>'Execution', 'url'=> ['/pusdiklat']],
                        ['icon'=>'fa fa-check-square-o fa-fw','label'=>'Evaluation', 'url'=> ['/pusdiklat']],
                    ]];

                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav'],
                    'position'=>'left',
                    'items' => $menuItemsLeft,
                ]);

                $menuItems[] =  
                    ['icon'=>'fa fa-user','label'=>'', 'url'=> '', 'items'=>[
						['icon'=>'fa fa-user','label' => 'Profile','url' => ['/user/settings/profile'],],
                        '<li class="divider"></li>',
                        [
                            'icon'=>'fa fa-power-off',
                            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/user/security/logout'],
                            'linkOptions' => ['data-method' => 'post']
                        ]
                    ]                        
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>

        <div class="container-fluid">
        <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container-fluid">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
