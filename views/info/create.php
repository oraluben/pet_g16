<?php
/**
 * Created by PhpStorm.
 * User: Dilemma丶
 * Date: 2017/3/16
 * Time: 8:27
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
                    <a class="active" style="color: white !important;" href="create">
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
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"><span class="glyphicon glyphicon-list-alt"></span>Content</div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <form enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Case Name</label>
                                <input class="form-control" placeholder="Name of the case">
                            </div>

                            <div class="form-group">
                                <label>Disease Classification</label>
                                <select class="form-control">
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                    <option>Option 4</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Disease Name</label>
                                <select class="form-control">
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                    <option>Option 4</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Serve Text</label>
                                <textarea style="resize: none;" class="form-control" rows="3"></textarea>
                            </div>

                            <div>
                                <input onchange="angular.element(this).scope().readFile()" type="file" ng-model="serve_pic"
                                      id="uploadpic" multiple class="pic">
                                <div class="pure">Insert images here.</div>
                                <div id="result" class="pic2"></div>
                            </div>

                            <div class="form-group">
                                <label>Serve Videos input</label>
                                <input type="file">
                                <p class="help-block">Insert one or more videos here.</p>
                            </div>


                            <div class="form-group">
                                <label>Case Check Text</label>
                                <textarea style="resize: none;" class="form-control" rows="3"></textarea>
                            </div>

                            <div>
                                <input onchange="angular.element(this).scope().readFile2()" type="file" ng-model="serve_pic"
                                       id="uploadpic2" multiple class="pic">
                                <div class="pure">Insert images here.</div>
                                <div id="result2" class="pic2"></div>
                            </div>


                            <div class="form-group">
                                <label>Case Check Videos input</label>
                                <input type="file">
                                <p class="help-block">Insert one or more videos here.</p>
                            </div>
                    </div>
                    <div class="col-md-6">


                        <div class="form-group">
                            <label>Check Result Text</label>
                            <textarea style="resize: none;" class="form-control" rows="3"></textarea>
                        </div>

                        <div>
                            <input onchange="angular.element(this).scope().readFile3()" type="file" ng-model="serve_pic"
                                   id="uploadpic3" multiple class="pic">
                            <div class="pure">Insert images here.</div>
                            <div id="result3" class="pic2"></div>
                        </div>

                        <div class="form-group">
                            <label>Check Result Videos input</label>
                            <input type="file">
                            <p class="help-block">Insert one or more videos here.</p>
                        </div>


                        <div class="form-group">
                            <label>Treatment Text</label>
                            <textarea style="resize: none;" class="form-control" rows="3"></textarea>
                        </div>

                        <div>
                            <input onchange="angular.element(this).scope().readFile4()" type="file" ng-model="serve_pic"
                                   id="uploadpic4" multiple class="pic">
                            <div class="pure">Insert images here.</div>
                            <div id="result4" class="pic2"></div>
                        </div>

                        <div class="form-group">
                            <label>Treatment Videos input</label>
                            <input type="file">
                            <p class="help-block">Insert one or more videos here.</p>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit Button</button>
                        <button type="reset" class="btn btn-default">Reset Button</button>
                    </div>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->
</div><!--/.main-->