<?php

/** @var yii\web\View $this */
/** @var string $content */
use yii\helpers\Url;
use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode("PRISM | Payment Receipt Integration Software Module") ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => 'PRISM',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            [
                'label' => 'Voucher',
                // 'url' => ['/site/about'],
                'items' => [
                    ['label' => 'Works', 'url' => ['/voucherwork'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Salary', 'url' => ['/vouchersalary'], 'visible' => !Yii::$app->user->isGuest],
                    // ['label' => 'TE', 'url' => '#', 'visible' => !Yii::$app->user->isGuest && !Yii::$app->user->can('is-cashier')]
                ],
                'visible' => !Yii::$app->user->isGuest 
            ],
            [
                'label' => 'Challan',
                // 'url' => ['/site/contact'],
                'items' => [
                    ['label' => 'Works', 'url' => ['/challanwork'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Salary', 'url' => ['/challansalary'], 'visible' => !Yii::$app->user->isGuest && !Yii::$app->user->can('is-cashier')],
                    // ['label' => 'TE', 'url' => '#', 'visible' => !Yii::$app->user->isGuest && !Yii::$app->user->can('is-cashier')]
                ],
                'visible' => !Yii::$app->user->isGuest && !Yii::$app->user->can('is-cashier')
            ],
            [
                'label' => 'Transfer entry',
                'url' => ['/'],
                // 'items' => [
                //     ['label' => 'Voucher', 'url' => ['/vouchersalary'], 'visible' => !Yii::$app->user->isGuest],
                //     ['label' => 'Challan', 'url' => ['/challansalary'], 'visible' => !Yii::$app->user->isGuest],
                //     ['label' => 'TE', 'url' => '#', 'visible' => !Yii::$app->user->isGuest]
                // ],
                'visible' => !Yii::$app->user->isGuest
            ],
            [
                'label' => 'Valuable entry',
                'url' => ['/valuable'],
                // 'items' => [
                //     ['label' => 'Voucher', 'url' => ['/vouchersalary'], 'visible' => !Yii::$app->user->isGuest],
                //     ['label' => 'Challan', 'url' => ['/challansalary'], 'visible' => !Yii::$app->user->isGuest],
                //     ['label' => 'TE', 'url' => '#', 'visible' => !Yii::$app->user->isGuest]
                // ],
                'visible' => !Yii::$app->user->isGuest && Yii::$app->user->can('is-cashier')
            ],
            [
                'label' => 'Manage Users',
                'url' => ['/users'],
                'items' => [
                    ['label' => 'View All Users', 'url' => ['/user'], 'visible' => Yii::$app->user->can('create-user')],
                    ['label' => 'Add New User', 'url' => ['/user/create'], 'visible' => Yii::$app->user->can('create-user')],
                    ['label' => 'Edit permissions of existing users', 'url' => ['/user/edit'], 'visible' => Yii::$app->user->can('create-user')],
                    // ['label' => 'TE', 'url' => '#', 'visible' => !Yii::$app->user->isGuest]
                ],
                'visible' => Yii::$app->user->can('create-user') && !Yii::$app->user->can('is-cashier')
            ],
            [
                'label' => 'Misc.',
                'url' => ['/misc'],
                'items' => [
                    ['label' => 'View audit logs', 'url' => ['/logs/index'] ,'visible' => Yii::$app->user->can('admin')],
                    ['label' => 'Change Password', 'url' => ['/user/change','id' => Yii::$app->user->id]],
                    // ['label' => 'Create a new privilege', 'url' => ['/user/permission']],
                    // ['label' => 'Edit access of existing users', 'url' => '#', 'visible' => Yii::$app->user->can('create-user')],
                    // ['label' => 'TE', 'url' => '#', 'visible' => !Yii::$app->user->isGuest]
                ],
                'visible' => !Yii::$app->user->isGuest
                // 'visible' => Yii::$app->user->can('create-user') && !Yii::$app->user->can('is-cashier')
            ],
            Yii::$app->user->isGuest
                ? ['label' => 'Login', 'url' => ['/site/login']]
                : '<div style="margin-right: 0px;">
                    <li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li></div>'
        ]
    ]);
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; BARC, Tarapur <?= date('Y') ?></div>
            <!-- <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div> -->
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
