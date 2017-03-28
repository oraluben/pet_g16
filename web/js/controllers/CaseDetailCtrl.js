/**
 * Created by Dilemma丶 on 2017/3/28.
 */
var storage, petApp;

petApp = angular.module('petApp', []);

petApp.config(['$locationProvider', function ($locationProvider) {

    $locationProvider.html5Mode({
        enabled: true,
        requireBase: false//必须配置为false，否则<base href=''>这种格式带base链接的地址才能解析
    });
}]);

petApp.controller('CaseDetailCtrl', function ($scope, $http, $location) {
        $scope.unit_text = new Array();
        $scope.unit_id = new Array();

        if ($location.search().id) {
            $scope.case_id = $location.search().id;
        }
        $scope.classifications = [];
        $scope.diseases = [];

        var data;

        var p = {
            method: 'get',
            url: '/case/classifications'
        };
        $http(p).then(function (d) {
            data = d.data;
            for (var i in data) {
                if (data[i].parent === null) {
                    $scope.classifications.push(data[i].classification_name);
                }
            }
        });


        $scope.default = function () {
            var p = {
                method: 'get',
                url: '/case/case-by-id?',
                params: {
                    id: $scope.case_id
                }
            };
            $http(p).then(function (d) {
                $scope.case_name = d.data.case.case_name;
                for (var i in d.data.units) {
                    $scope.unit_text[i] = d.data.units[i].case_text;
                    $scope.unit_id[i] = d.data.units[i].id;
                }
                var str = '/cls/' + d.data.case.case_classification;
                var q = {
                    method: 'get',
                    url: str
                };
                $http(q).then(function (e) {
                    var str1 = '/cls/' + e.data.parent;
                    var r = {
                        method: 'get',
                        url: str1
                    };
                    $http(r).then(function (f) {
                        $scope.classification = f.data.classification_name;
                        $scope.changeDisease(f.data.classification_name);
                        $scope.disease = e.data.classification_name;
                    });
                });
            });
        };

        $scope.changeDisease = function (cl) {
            $scope.diseases = [];
            if (cl != null) {
                var tmp_id;
                for (var i in data) {
                    if (data[i].classification_name == cl) {
                        tmp_id = data[i].id;
                        break;
                    }
                }
                for (var j in data) {
                    if (data[j].parent == tmp_id) {
                        $scope.diseases.push(data[j].classification_name);
                    }
                }
            }
        };

        $scope.update_case = function (case_name, disease, unit_text) {
            var p = {
                method: 'get',
                url: '/case/classifications'
            };
            $http(p).then(function (d) {
                data = d.data;
                for (var i in data) {
                    if (data[i].classification_name === disease) {
                        $scope.classification_id = data[i].id;
                        console.log('parent:' + $scope.classification_id);
                        break;
                    }
                }
                var q = {
                    method: 'post',
                    url: '/case/update?',
                    params: {
                        id: $scope.case_id
                    },
                    data: {
                        case_name: case_name,
                        case_classification: $scope.classification_id
                    }
                };
                console.log('parent2:' + $scope.classification_id);
                $http(q).then(function (d) {
                    for (var i in unit_text) {
                        var r = {
                            method: 'post',
                            url: '/case/update-unit?',
                            params: {
                                id: $scope.unit_id[i]
                            },
                            data: {
                                text: $scope.unit_text[i]
                            }
                        };
                        $http(r).then(function (d) {
                        });
                    }
                    window.location.href = 'modify';
                });
            });

        };

        $scope.reset = function () {
            $scope.text = void 0;
            $scope.attachments = [];
            document.getElementById('result').innerHTML = '';
        };

        $scope.default();
    }
);