<?php
/**
 * Created by PhpStorm.
 * User: Dilemma丶
 * Date: 2017/3/23
 * Time: 18:07
 */

/* @var $this yii\web\View */

$this->title = 'CreateCasePage';
\app\assets\CreateAsset::register($this);
?>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">
        <li><a href="index"><span class="glyphicon glyphicon-dashboard"></span> 主页面</a></li>
        <li class="parent ">
            <a href="#">
                <span class="glyphicon glyphicon-list"></span> 病例管理 <span data-toggle="collapse" href="#sub-item-1"
                                                                          class="icon pull-right"><em
                        class="glyphicon glyphicon-s glyphicon-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li>
                    <a class="active" style="color: white !important;" href="create1">
                        <span class="glyphicon glyphicon-plus"></span> 新建病例
                    </a>
                </li>
                <li>
                    <a class="" href="modify">
                        <span class="glyphicon glyphicon-pencil"></span> 管理病例
                    </a>
                </li>
            </ul>
        </li>
        <li><a href="user"><span class="glyphicon glyphicon-user"></span> 管理用户</a></li>
        <li><a href="pwd"><span class="glyphicon glyphicon-info-sign"></span> 维护用户</a></li>
        <li role="presentation" class="divider"></li>
        <li><a href="profile"><span class="glyphicon glyphicon-pencil"></span> 个人信息</a></li>
    </ul>
</div><!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" ng-controller="CreateCtrl">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="index"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="active">Create Case</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create Case</h1>
        </div>
    </div><!--/.row-->

    <div class="row" style="margin-bottom: 2em;">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="progress">
                    <div class="progress-bar progress-bar-info progress-bar-striped active" style="width: 5%;">
                        <div class="progress-value">5%</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading"><span class="glyphicon glyphicon-list-alt"></span>Create a base case</div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <form enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Case Name</label>
                                <input class="form-control" ng-model="case_name" placeholder="Name of the case">
                            </div>

                            <div class="form-group">
                                <label>Disease Classification</label>
                                <select ng-change="changeDisease(classification)"
                                        ng-options="a for a in classifications" ng-model="classification"
                                        class="form-control">
                                    <option value="">请选择</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Disease Name</label>
                                <select ng-options="b for b in diseases" ng-model="disease" class="form-control">
                                    <option value="">请选择</option>
                                </select>
                            </div>

                            <div style="margin-top: 2em;">
                                <button type="reset" class="btn btn-default pull-right" ng-click="reset()">Reset Button</button>
                                <button type="submit" class="btn btn-primary pull-right"
                                        style="margin-right: 1em;" ng-click="create_case(case_name,disease)"> Next Step
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->
</div><!--/.main-->