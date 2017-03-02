<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" ng-app>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><span>Pethospital </span>Admin</a>
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                            class="glyphicon glyphicon-user"></span> User <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">
        <li class="active"><a href="index.html"><span class="glyphicon glyphicon-dashboard"></span> 主页面</a></li>
        <li><a href="widgets.html"><span class="glyphicon glyphicon-list-alt"></span> 管理病例</a></li>
        <li><a href="charts.html"><span class="glyphicon glyphicon-user"></span> 管理用户</a></li>
        <li><a href="panels.html"><span class="glyphicon glyphicon-info-sign"></span> 密码重置</a></li>
        <li role="presentation" class="divider"></li>
        <li><a href="login.html"><span class="glyphicon glyphicon-pencil"></span> 个人信息</a></li>
    </ul>
</div><!--/.sidebar-->
<?= $content ?>
<!--<script>-->
<!--    $('#calendar').datepicker({});-->
<!---->
<!--    !function ($) {-->
<!--        $(document).on("click", "ul.nav li.parent > a > span.icon", function () {-->
<!--            $(this).find('em:first').toggleClass("glyphicon-minus");-->
<!--        });-->
<!--        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");-->
<!--    }(window.jQuery);-->
<!---->
<!--    $(window).on('resize', function () {-->
<!--        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')-->
<!--    })-->
<!--    $(window).on('resize', function () {-->
<!--        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')-->
<!--    })-->
<!--</script>-->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
