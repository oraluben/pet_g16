/**
 * Created by Dilemma丶 on 2017/2/28.
 */
var storage, petApp;

petApp = angular.module('petApp', []);

petApp.controller('MainCtrl', function ($scope, $http) {

    var p = {
        method: 'get',
        url: '/api/stat',
    };
    $http(p).then(function (d) {
        $scope.case_num = d.data.case;
        $scope.classification_num = d.data.classification;
        $scope.user_num = d.data.user;
        $scope.visit_num = d.data.visit;
    });

});