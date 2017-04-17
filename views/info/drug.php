<?php
/**
 * Created by PhpStorm.
 * User: Dilemma丶
 * Date: 2017/4/11
 * Time: 15:00
 */

/* @var $this yii\web\View */

$this->title = 'Drug';
\app\assets\DrugAsset::register($this);
?>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">
        <li><a href="index"><span class="glyphicon glyphicon-dashboard"></span> Main Page</a></li>
        <li class="parent ">
            <a href="#">
                <span class="glyphicon glyphicon-list-alt"></span> Front Management
                <span data-toggle="collapse" href="#sub-item-11" class="icon pull-right">
                    <em class="glyphicon glyphicon-s glyphicon-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-11">
                <li>
                    <a class="" href="department">
                        <span class="glyphicon glyphicon-pencil"></span> Department Management
                    </a>
                </li>
                <li>
                    <a class="active" style="color: white !important;" href="drug">
                        <span class="glyphicon glyphicon-pencil"></span> Drug Management
                    </a>
                </li>
                <li>
                    <a class="" href="instrument">
                        <span class="glyphicon glyphicon-pencil"></span> Instrument Management
                    </a>
                </li>
                <li>
                    <a class="" href="action">
                        <span class="glyphicon glyphicon-pencil"></span> Action Management
                    </a>
                </li>
            </ul>
        </li>
        <li><a href="classification"><span class="glyphicon glyphicon-list"></span> Classes Management</a></li>
        <li class="parent ">
            <a href="#">
                <span class="glyphicon glyphicon-list-alt"></span> Cases Management <span data-toggle="collapse"
                                                                                          href="#sub-item-1"
                                                                                          class="icon pull-right"><em
                        class="glyphicon glyphicon-s glyphicon-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li>
                    <a class="" href="create1">
                        <span class="glyphicon glyphicon-plus"></span> Create Case
                    </a>
                </li>
                <li>
                    <a class="" href="modify">
                        <span class="glyphicon glyphicon-pencil"></span> Modify&Delete Case
                    </a>
                </li>
            </ul>
        </li>
        <li><a href="user"><span class="glyphicon glyphicon-th-list"></span> Users Management</a></li>
        <li><a href="pwd"><span class="glyphicon glyphicon-info-sign"></span> Users Maintenance</a></li>
        <li role="presentation" class="divider"></li>
        <li><a href="profile"><span class="glyphicon glyphicon-user"></span> Personal Profile</a></li>
    </ul>
</div><!--/.sidebar-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" ng-controller="DrugCtrl">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="index"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="active">Drugs</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Drugs</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-8">
            <div style="width: 100%">
                <div class="panel panel-default">
                    <div class="panel panel-default">
                        <div class="panel-heading"><span class="glyphicon glyphicon-list-alt"></span> Drug
                            Information
                        </div>
                        <div class="panel-body">
                            <table data-toggle="table" data-url="../drugs" data-show-refresh="true"
                                   data-show-toggle="true" data-show-columns="true" data-search="true"
                                   data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name"
                                   data-sort-order="desc">
                                <thead>
                                <tr>
                                    <th data-field="state" data-checkbox="true">Drug ID</th>
                                    <th data-field="id" data-sortable="true">Drug ID</th>
                                    <th data-field="drug_name" data-sortable="true">Drug Name</th>
                                    <th data-field="drug_desc" data-sortable="true">Drug Desc</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 pull-right">

            <div class="pull-right" style="width: 100%">
                <div class="panel panel-default">
                    <div class="panel-heading"><span class="glyphicon glyphicon-pencil"></span> Create Drug</div>
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <fieldset>
                                <!-- Name input-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="name">Name</label>
                                    <div class="col-md-9">
                                        <input id="name" name="name" ng-model="name" type="text"
                                               placeholder="Drug Name"
                                               class="form-control">
                                    </div>
                                </div>

                                <!-- desc input-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="desc">Description</label>
                                    <div class="col-md-9">
                                        <input id="desc" name="desc" ng-model="desc" type="text"
                                               placeholder="Drug Description"
                                               class="form-control">
                                    </div>
                                </div>

                                <!-- Form actions -->
                                <div class="form-group">
                                    <div class="col-md-12 widget-right">
                                        <button type="submit" ng-click="createDrug(name,desc)"
                                                class="btn btn-default btn-md pull-right">Submit
                                        </button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div><!--/.row-->

            <div class="pull-right" style="width: 100%">
                <div class="panel panel-default">
                    <div class="panel-heading"><span class="glyphicon glyphicon-trash"></span> Delete Drug</div>
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <fieldset>
                                <!-- id input-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="id">Id</label>
                                    <div class="col-md-9">
                                        <input id="id" name="id" ng-model="id" type="text" placeholder="Drug Id"
                                               class="form-control">
                                    </div>
                                </div>

                                <!-- Form actions -->
                                <div class="form-group">
                                    <div class="col-md-12 widget-right">
                                        <button type="submit" ng-click="deleteDrug(id)"
                                                class="btn btn-default btn-md pull-right">Submit
                                        </button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div><!--/.row-->


            <div class="pull-right" style="width: 100%">
                <div class="panel panel-default">
                    <div class="panel-heading"><span class="glyphicon glyphicon-trash"></span> Modify Drug</div>
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <fieldset>
                                <!-- id input-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="id1">Id</label>
                                    <div class="col-md-9">
                                        <input id="id1" name="id1" ng-model="id1" type="text"
                                               placeholder="Drug Id"
                                               class="form-control">
                                    </div>
                                </div>

                                <!-- Name input-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="name1">Name</label>
                                    <div class="col-md-9">
                                        <input id="name1" name="name1" ng-model="name1" type="text"
                                               placeholder="Drug Name"
                                               class="form-control">
                                    </div>
                                </div>

                                <!-- desc input-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="desc1">Description</label>
                                    <div class="col-md-9">
                                        <input id="desc1" name="desc1" ng-model="desc1" type="text"
                                               placeholder="Drug Description"
                                               class="form-control">
                                    </div>
                                </div>


                                <!-- Form actions -->
                                <div class="form-group">
                                    <div class="col-md-12 widget-right">
                                        <button type="submit" ng-click="modifyDrug(id1,name1,desc1)"
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
</div>