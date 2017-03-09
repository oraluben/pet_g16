/**
 * Created by Dilemma丶 on 2017/3/9.
 */
var storage, petApp;

petApp = angular.module('petApp', []);

storage = window.localStorage;

petApp.controller('UserCtrl', function ($scope, $http, $window) {

    $scope.createUser = function (name, pwd, pwd2, authority) {
        var p;
        if (name === void 0 || name.length === 0) {
            $().toastmessage('showToast', {
                text: 'Please enter your username',
                sticky: false,
                position: 'top-center',
                type: 'error',
                stayTime: 1500,
                closeText: ''
            });
        } else if (pwd === void 0 || pwd.length === 0) {
            $().toastmessage('showToast', {
                text: 'Please enter your password',
                sticky: false,
                position: 'top-center',
                type: 'error',
                stayTime: 1500,
                closeText: ''
            });
        } else if (pwd != pwd2) {
            $().toastmessage('showToast', {
                text: 'The passwords you entered must be the same.',
                sticky: false,
                position: 'top-center',
                type: 'error',
                stayTime: 1500,
                closeText: ''
            });
        }
        else {
            p = {
                method: 'post',
                url: 'api/register',
                data: {
                    'username': name,
                    'password': pwd
                }
            };
            $http(p).then(function (d) {
                if (d.data.success === 0) {
                    $window.location.reload();
                    return $().toastmessage('showToast', {
                        text: 'Create success!',
                        sticky: false,
                        position: 'top-center',
                        type: 'success',
                        stayTime: 1500,
                        closeText: ''
                    });
                } else {
                    console.log(d.data.success);
                    return $().toastmessage('showToast', {
                        text: 'Create failed..',
                        sticky: false,
                        position: 'top-center',
                        type: 'error',
                        stayTime: 1500,
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