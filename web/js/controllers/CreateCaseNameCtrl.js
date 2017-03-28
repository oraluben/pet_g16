/**
 * Created by Dilemma丶 on 2017/3/27.
 */
var storage, petApp;

petApp = angular.module('petApp', []);

petApp.config(['$locationProvider', function ($locationProvider) {

    $locationProvider.html5Mode({
        enabled: true,
        requireBase: false//必须配置为false，否则<base href=''>这种格式带base链接的地址才能解析
    });
}]);

petApp.controller('CreateCaseNameCtrl', function ($scope, $http, $location) {

    if ($location.search().id) {
        $scope.case_id = $location.search().id;
    }

    $scope.create_unit = function (text, attachments) {
        console.log(text);
        if (text === void 0 || text.length === 0) {
            $().toastmessage('showToast', {
                text: 'Please enter the text',
                sticky: false,
                position: 'top-center',
                type: 'error',
                stayTime: 1500,
                closeText: ''
            });
        } else if (attachments === void 0 || attachments.length === 0) {
            $().toastmessage('showToast', {
                text: 'Please upload the images',
                sticky: false,
                position: 'top-center',
                type: 'error',
                stayTime: 1500,
                closeText: ''
            });
        } else {
            var unit_id;
            var p = {
                method: 'get',
                url: '/case/unit?',
                params: {
                    'parent': $scope.case_id,
                    'unit_type': 0
                }
            };
            $http(p).then(function (d) {
                    unit_id = d.data.unit.id;
                    var q = {
                        method: 'post',
                        url: '/case/update-unit',
                        params: {
                            'id': unit_id
                        },
                        data: {
                            'text': text
                        }
                    };
                    $http(q).then(function (e) {
                        var data = {};
                        for (var i in attachments) {
                            var tmp = 'imageFiles[' + i.toString() + ']';
                            data[tmp] = attachments[i];
                            var tmp1 = 'imageInfo[' + i.toString() + ']';
                            data[tmp1] = null;
                        }
                        var form = new FormData();
                        for (var key in data) {
                            var v = data[key];
                            form.append(key, v);
                        }
                        var r = {
                            method: 'post',
                            url: '/upload/image',
                            params: {
                                'unit_id': unit_id
                            },
                            data: form,
                            transformRequest: angular.identity,
                            headers: {
                                'Content-Type': void 0
                            }
                        };
                        console.log(r);
                        $http(r).then(function (e) {
                            window.location.href = 'create3?id=' + $scope.case_id;
                        }, function (f) {
                            var obj = eval("(" + f.data.message + ")");
                            console.log(obj);
                            $().toastmessage('showToast', {
                                text: obj.imageFiles[0],
                                sticky: false,
                                position: 'top-center',
                                type: 'error',
                                stayTime: 3000,
                                closeText: ''
                            });
                        });
                    });
                }
            );

        }
    };

    $scope.readFile = function () {
        $scope.attachments = []
        var count, file1, reader, stop, _i, _len, _ref, num = 0;
        stop = false;
        count = 0;
        document.getElementById('result').innerHTML = '';
        _ref = document.getElementById('uploadpic').files;
        console.log(_ref);
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            file1 = _ref[_i];
            count++;
            if (!/image\/\w+/.test(file1.type)) {
                $().toastmessage('showToast', {
                    text: 'Not image files, they won\'t be upload.',
                    sticky: false,
                    position: 'top-center',
                    type: 'error',
                    stayTime: 3000,
                    closeText: ''
                });
                stop = true;
                break;
            }
            if (file1.size > 1024 * 1024) {
                $().toastmessage('showToast', {
                    text: 'Larger than 1M, they won\'t be upload.',
                    sticky: false,
                    position: 'top-center',
                    type: 'error',
                    stayTime: 3000,
                    closeText: ''
                });
                stop = true;
                break;
            }
            if (count > 3) {
                $().toastmessage('showToast', {
                    text: 'More than 3 images, they won\'t be upload.',
                    sticky: false,
                    position: 'top-center',
                    type: 'error',
                    stayTime: 3000,
                    closeText: ''
                });
                stop = true;
                break;
            }
            if (!stop) {
                reader = new FileReader();
                reader.readAsDataURL(file1);
                console.log(file1);
                console.log(count);
                $scope.attachments.push(file1);
                reader.onload = function (f) {
                    document.getElementById('result').innerHTML += '<img id = "pic' + num + '" src="" class="show_pic" alt="" />';
                    document.getElementById('pic' + num.toString()).setAttribute('src', this.result);
                    return ++num;
                };
            }
        }
        if (stop) {
            $scope.attachments = []
        } else {
        }
    };

    $scope.reset = function () {
        $scope.text = void 0;
        $scope.attachments = [];
        document.getElementById('result').innerHTML = '';
    }
});