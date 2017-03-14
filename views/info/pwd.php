<?php
/**
 * Created by PhpStorm.
 * User: Dilemma丶
 * Date: 2017/3/14
 * Time: 13:23
 */

/* @var $this yii\web\View */

$this->title = 'Password';
\app\assets\MainAsset::register($this);
?>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">
        <li><a href="index"><span class="glyphicon glyphicon-dashboard"></span> 主页面</a></li>
        <li><a href="case"><span class="glyphicon glyphicon-list-alt"></span> 管理病例</a></li>
        <li><a href="user"><span class="glyphicon glyphicon-user"></span> 管理用户</a></li>
        <li class="active"><a href="pwd"><span class="glyphicon glyphicon-info-sign"></span> 密码重置</a></li>
        <li role="presentation" class="divider"></li>
        <li><a href="profile"><span class="glyphicon glyphicon-pencil"></span> 个人信息</a></li>
    </ul>
</div><!--/.sidebar-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" ng-controller="PwdCtrl">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="index"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="active">Passwords</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Passwords</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="pull-left">User Password</span>
                    <div class="pull-right"><input placeholder="Search" class="pull-left"
                                                   style="border: 1px solid #eee;box-shadow: none;height: 36px;padding-left:5px;margin-top:3.5px;margin-right:8px;border-radius: 4px;transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;"/>
                        <button class="btn btn-default btn-md pull-right" style="margin-top: 4px;">Go</button>
                    </div>

                </div>
                <div class="panel-body">
                    <table data-toggle="table" data-url="tables/data2.json">
                        <thead>
                        <tr>
                            <th data-field="id" data-align="right">Item ID</th>
                            <th data-field="name">Item Name</th>
                            <th data-field="price">Item Price</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>