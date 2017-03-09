/**
 * Created by Dilemma丶 on 2017/2/28.
 */
var storage, petApp;

petApp = angular.module('petApp', []);

storage = window.localStorage;

petApp.controller('LoginCtrl', function ($scope, $http, $window) {

    $scope.login = function (username, pwd) {
        var p;
        if (username === void 0 || username.length === 0) {
                $().toastmessage('showToast', {
                    text     : 'Please enter your username',
                    sticky   : false,
                    position : 'top-center',
                    type     : 'error',
                    stayTime : 1500,
                    closeText: ''
                });
        } else if (pwd === void 0 || pwd.length === 0) {
            $().toastmessage('showToast', {
                text     : 'Please enter your password',
                sticky   : false,
                position : 'top-center',
                type     : 'error',
                stayTime : 1500,
                closeText: ''
            });
        } else {
            p = {
                method: 'post',
                url: 'api/login',
                data: {
                    'username': username,
                    'password': pwd
                }
            };
            $http(p).then(function (d) {
                if (d.data.success === 0) {
                    return $window.location.href = "info/index";
                } else {
                    console.log(d.data.success);
                    return $().toastmessage('showToast', {
                        text     : 'Invalid username or password',
                        sticky   : false,
                        position : 'top-center',
                        type     : 'error',
                        stayTime : 1500,
                        closeText: ''
                    });
                }
            });
            return false;
        }
    };

    // search = $location.search();
    // token = search['access_token'];
    // if (token != null) {
    //     localStorage.setItem(storage, token);
    //     return $window.location.href = "main.html";
    // }
});