<?php
/**
 * Created by PhpStorm.
 * User: Dilemma丶
 * Date: 2017/3/9
 * Time: 9:04
 */


/* @var $this yii\web\View */

$this->title = 'User';
\app\assets\MainAsset::register($this);
?>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar" ng-controller="UserCtrl">
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">
        <li><a href="index"><span class="glyphicon glyphicon-dashboard"></span> 主页面</a></li>
        <li><a href="case"><span class="glyphicon glyphicon-list-alt"></span> 管理病例</a></li>
        <li class="active"><a href="user"><span class="glyphicon glyphicon-user"></span> 管理用户</a></li>
        <li><a href="pwd"><span class="glyphicon glyphicon-info-sign"></span> 密码重置</a></li>
        <li role="presentation" class="divider"></li>
        <li><a href="profile"><span class="glyphicon glyphicon-pencil"></span> 个人信息</a></li>
    </ul>
</div><!--/.sidebar-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="active">Users</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Users</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">Advanced Table</div>
                <div class="panel-body">
                    <table data-toggle="table" data-url="tables/data1.json" data-show-refresh="true"
                           data-show-toggle="true" data-show-columns="true" data-search="true"
                           data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name"
                           data-sort-order="desc">
                        <thead>
                        <tr>
                            <th data-field="state" data-checkbox="true">Item ID</th>
                            <th data-field="id" data-sortable="true">Item ID</th>
                            <th data-field="name" data-sortable="true">Item Name</th>
                            <th data-field="price" data-sortable="true">Item Price</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading"><span class="glyphicon glyphicon-envelope"></span> Contact Form</div>
                <div class="panel-body">
                    <form class="form-horizontal">
                        <fieldset>
                            <!-- Name input-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Username</label>
                                <div class="col-md-9">
                                    <input id="name" name="name" ng-model="name" type="text" placeholder="Your username"
                                           class="form-control">
                                </div>
                            </div>

                            <!-- pwd input-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="email">Password</label>
                                <div class="col-md-9">
                                    <input id="pwd" name="pwd" ng-model="pwd" type="password" placeholder="Your password"
                                           class="form-control">
                                </div>
                            </div>

                            <!-- pwd_ input-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="email">Password</label>
                                <div class="col-md-9">
                                    <input id="pwd2" name="pwd2" ng-model="pwd2" type="password" placeholder="Type your password again"
                                           class="form-control">
                                </div>
                            </div>

                            <!-- Message body -->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="message">Authority</label>
                                <div class="col-md-9">
                                    <input name="authority" ng-model="authority" type="radio" value="" checked/> User <br>
                                    <input name="authority" ng-model="authority" type="radio" value=""/> Administrator
                                </div>
                            </div>

                            <!-- Form actions -->
                            <div class="form-group">
                                <div class="col-md-12 widget-right">
                                    <button ng-click="createUser(name,pwd,pwd2,authority)" class="btn btn-default btn-md pull-right">Submit</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div><!--/.row-->