<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception$exception */

use yii\helpers\Html;
use app\assets\AppAsset; // If you have an asset bundle for your application, you can use it here

// Register the 404.css file
$this->registerCssFile(Yii::$app->request->baseUrl . '/css/404.css', ['depends' => [AppAsset::class]]);
?>

<div class="site-error">

    <!-- <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        The above error occurred while the Web server was processing your request.
    </p>
    <p>
        Please contact the `Admin` if you think this is a server error. Thank you.
    </p> -->


    <section class="page_404">
	<div class="container">
		<div class="row">	
		<div class="col-sm-12 ">
		<div class="col-sm-10 col-sm-offset-1  text-center">
		<div class="four_zero_four_bg">
			<h1 class="text-center ">404</h1>
			<h4 class="text-center ">Not Found</h4>	
		</div>
        <div class="img">

        </div>
		
		<div class="contant_box_404">
		<h3 class="h2">
		Looks like you're lost
		</h3>
		
		<p>Please check your URL or contact the administrator, <br/>the page may be removed or moved to another URL</p>
		
		<a href="site/index" class="link_404">Go to Home</a>
	</div>
		</div>
		</div>
		</div>
	</div>
</section>
</div>
