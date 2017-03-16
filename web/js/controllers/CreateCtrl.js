/**
 * Created by Dilemma丶 on 2017/3/16.
 */
var storage, petApp;

petApp = angular.module('petApp', []);

petApp.controller('CreateCtrl', function ($scope) {
    $scope.serve_pic = 0;
    console.log('a');

    $scope.readFile = function () {
        console.log('b');
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
                    stayTime: 1500,
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
                    stayTime: 1500,
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
                    stayTime: 1500,
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
                reader.onload = function (f) {
                    document.getElementById('result').innerHTML += '<img id = "pic' + num + '" src="" class="show_pic" alt="" />';
                    document.getElementById('pic' + num.toString()).setAttribute('src', this.result);
                    return ++num;
                };
            }
        }
        if (stop) {
        } else {
        }
    };

    $scope.readFile2 = function () {
        console.log('b');
        var count, file1, reader, stop, _i, _len, _ref, num = 0;
        stop = false;
        count = 0;
        document.getElementById('result2').innerHTML = '';
        _ref = document.getElementById('uploadpic2').files;
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
                    stayTime: 1500,
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
                    stayTime: 1500,
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
                    stayTime: 1500,
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
                reader.onload = function (f) {
                    document.getElementById('result2').innerHTML += '<img id = "pic2' + num + '" src="" class="show_pic" alt="" />';
                    document.getElementById('pic2' + num.toString()).setAttribute('src', this.result);
                    return ++num;
                };
            }
        }
        if (stop) {
        } else {
        }
    };

    $scope.readFile3 = function () {
        console.log('b');
        var count, file1, reader, stop, _i, _len, _ref, num = 0;
        stop = false;
        count = 0;
        document.getElementById('result3').innerHTML = '';
        _ref = document.getElementById('uploadpic3').files;
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
                    stayTime: 1500,
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
                    stayTime: 1500,
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
                    stayTime: 1500,
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
                reader.onload = function (f) {
                    document.getElementById('result3').innerHTML += '<img id = "pic3' + num + '" src="" class="show_pic" alt="" />';
                    document.getElementById('pic3' + num.toString()).setAttribute('src', this.result);
                    return ++num;
                };
            }
        }
        if (stop) {
        } else {
        }
    };

    $scope.readFile4 = function () {
        console.log('b');
        var count, file1, reader, stop, _i, _len, _ref, num = 0;
        stop = false;
        count = 0;
        document.getElementById('result4').innerHTML = '';
        _ref = document.getElementById('uploadpic4').files;
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
                    stayTime: 1500,
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
                    stayTime: 1500,
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
                    stayTime: 1500,
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
                reader.onload = function (f) {
                    document.getElementById('result4').innerHTML += '<img id = "pic4' + num + '" src="" class="show_pic" alt="" />';
                    document.getElementById('pic4' + num.toString()).setAttribute('src', this.result);
                    return ++num;
                };
            }
        }
        if (stop) {
        } else {
        }
    };
});