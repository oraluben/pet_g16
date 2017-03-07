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
            return sweetAlert({
                title: "用户名不能为空",
                showConfirmButton: false,
                timer: 1500,
                type: 'error'
            });
        } else if (pwd === void 0 || pwd.length === 0) {
            return sweetAlert({
                title: "密码不能为空",
                showConfirmButton: false,
                timer: 1500,
                type: 'error'
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
                    return sweetAlert({
                        title: "用户名或密码错误",
                        showConfirmButton: false,
                        timer: 1500,
                        type: 'error'
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