<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script src="//cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/chosen/1.6.2/chosen.jquery.js"></script>
    <script src="//cdn.bootcss.com/chosen/1.6.2/chosen.jquery.min.js"></script>
    <link href="//cdn.bootcss.com/chosen/1.6.2/chosen.css" rel="stylesheet">
</head>
<body>
<?php $this->beginBody() ?>

<div class="sims_top navbar navbar-default">
    <span class="sims_top1"></span>
    <span class="sims_top3" style="width:30px;">欢迎 </span>
    <span class="sims_top2"><?/*= empty(Yii::$app->user->identity->name) ? '' : Yii::$app->user->identity->name;*/?></span>
    <span class="sims_top3"> 访问订单系统！ </span>
    <span class="sims_top4"></span>
    <span class="sims_top5" id="stimer"></span>
    <span class="logout fright"><a href='../default/logout'>退出</a></span>
</div>

<div class="main-container" id="main-container">
    <div class="main-container-inner">
        <div class="sims_left sidebar" id="sidebar">
            <dt class="sims_list_on">后台管理</dt>
            <dd class="left_cons">
                <a href="<?= \yii\helpers\Url::to(['order/index']) ?>" class="<?= Yii::$app->controller->id == 'order'? 'left_con_on' : 'left_con'; ?>">订单列表</a>
                <a href="<?= \yii\helpers\Url::to(['item/index']) ?>" class="<?= Yii::$app->controller->id == 'item'? 'left_con_on' : 'left_con'; ?>">产品设置</a>
            </dd>
        </div>
        <div class="main-content">
            <div class="page-content">
            </div>
        </div>
    </div>
</div>


<?= $content;?>

<?php $this->endBody() ?>
</body>
<script>
    $(document).ready(function(){
        $('.left_con').click(
            function(){
                $(this).addClass("left_con_on");
                $(this).removeClass("left_con");
            }
        );
    });
</script>
</html>
<?php $this->endPage() ?>
