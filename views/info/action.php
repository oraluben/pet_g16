<?php
/**
 * Created by PhpStorm.
 * User: Dilemma丶
 * Date: 2017/4/11
 * Time: 15:21
 */

/* @var $this yii\web\View */

$this->title = 'Action';
\app\assets\ActionAsset::register($this);
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
                    <a class="" href="create1">
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
        <li class="active"><a href="user"><span class="glyphicon glyphicon-user"></span> 管理用户</a></li>
        <li><a href="pwd"><span class="glyphicon glyphicon-info-sign"></span> 维护用户</a></li>
        <li role="presentation" class="divider"></li>
        <li><a href="profile"><span class="glyphicon glyphicon-pencil"></span> 个人信息</a></li>
    </ul>
</div><!--/.sidebar-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" ng-controller="ActionCtrl">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="index"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="active">Actions</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Actions</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-8 pull-left">
            <div class="panel panel-default">
                <div class="panel panel-default">
                    <div class="panel-heading"><span class="glyphicon glyphicon-list-alt"></span> Action Information
                    </div>
                    <div class="panel-body">
                        <table data-toggle="table" data-url="../actions" data-show-refresh="true"
                               data-show-toggle="true"
                               data-show-columns="true" data-search="true" data-select-item-name="toolbar1"
                               data-pagination="true" data-sort-name="name" data-sort-order="desc">
                            <thead>
                            <tr>
                                <th data-field="state" data-checkbox="true">Action ID</th>
                                <th data-field="id" data-sortable="true">Action ID</th>
                                <th data-field="classification_name" data-sortable="true">Action Name</th>
                                <th data-field="classification_name" data-sortable="true">Action Desc</th>
                                <th data-field="parent" data-sortable="true">Action User</th>
                                <th data-field="parent" data-sortable="true">Action Medicine</th>
                                <th data-field="parent" data-sortable="true">Action Instrument</th>
                                <th data-field="parent" data-sortable="true">Action Department</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

            <div class="pull-right" style="width: 100%">
                    <div class="panel panel-default">
                        <div class="panel-heading"><span class="glyphicon glyphicon-trash"></span> Create Action
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal">
                                <fieldset>
                                    <!-- id input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="did">Action Id</label>
                                        <div class="col-md-9">
                                            <input id="did" name="did" ng-model="did" type="text"
                                                   placeholder="Classification Id"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <!-- Form actions -->
                                    <div class="form-group">
                                        <div class="col-md-12 widget-right">
                                            <button type="submit" ng-click="deleteAction(did)"
                                                    class="btn btn-default btn-md pull-right">Submit
                                            </button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div><!--/.row-->
        </div>

        <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading"><span class="glyphicon glyphicon-trash"></span> Delete Action
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <fieldset>
                                <!-- id input-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="did">Action Id</label>
                                    <div class="col-md-9">
                                        <input id="did" name="did" ng-model="did" type="text"
                                               placeholder="Classification Id"
                                               class="form-control">
                                    </div>
                                </div>

                                <!-- Form actions -->
                                <div class="form-group">
                                    <div class="col-md-12 widget-right">
                                        <button type="submit" ng-click="deleteAction(did)"
                                                class="btn btn-default btn-md pull-right">Submit
                                        </button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div><!--/.row-->
    </div>
</div>