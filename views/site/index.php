<?php

/* @var $this yii\web\View */

$this->title = 'Login';
\app\assets\LoginAsset::register($this);
?>
<div id="login" ng-controller="LoginCtrl">
    <div class="wrapper">
        <div class="login">
            <form class="container offset1 loginform">
                <div id="owl-login">
                    <div class="hand"></div>
                    <div class="hand hand-r"></div>
                    <div class="arms">
                        <div class="arm"></div>
                        <div class="arm arm-r"></div>
                    </div>
                </div>
                <div class="pad">
                    <div class="control-group">
                        <div class="controls">
                            <label for="username" class="control-label fa fa-envelope"></label>
                            <input id="username" ng-model="username" placeholder="Username" tabindex="1"
                                   autofocus="autofocus" class="form-control input-medium">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <label for="password" class="control-label fa fa-asterisk"></label>
                            <input id="password" type="password" ng-model="password" placeholder="Password" tabindex="2"
                                   class="form-control input-medium">
                        </div>
                    </div>
                </div>
                <div class="form-actions"><a href="/" tabindex="3"
                                             class="btn pull-left btn-link text-muted">Forgot password?</a>
                    <button type="submit" tabindex="4" class="btn btn-primary" ng-click="login(username,password)">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>