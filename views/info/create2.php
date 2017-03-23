<?php
/**
 * Created by PhpStorm.
 * User: Dilemma丶
 * Date: 2017/3/23
 * Time: 18:26
 */
/* @var $this yii\web\View */

$this->title = 'AddServePage';
\app\assets\CreateServeAsset::register($this);
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


    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading"><span class="glyphicon glyphicon-list-alt"></span>Add Serve Information</div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <form enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Serve Text</label>
                                <textarea style="resize: none;" class="form-control" rows="3"></textarea>
                            </div>

                            <div>
                                <input onchange="angular.element(this).scope().readFile()" type="file" ng-model="serve_pic"
                                       id="uploadpic" multiple class="pic">
                                <div class="pure">Insert images here.</div>
                                <div id="result" ng-model="serve_attachments" class="pic2"></div>
                            </div>

                            <div class="form-group">
                                <label>Serve Videos input</label>
                                <input type="file">
                                <p class="help-block">Insert one or more videos here.</p>
                            </div>

                            <div style="margin-top: 2em;">
                                <button type="reset" class="btn btn-default pull-right">Reset Button</button>
                                <button type="submit" class="btn btn-primary pull-right"
                                        style="margin-right: 1em;" ng-click="create_case(case_name,disease)"> Next Step
                                </button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->
</div><!--/.main-->