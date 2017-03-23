/**
 * Created by Dilemma丶 on 2017/3/21.
 */
/**
 * Created by Dilemma丶 on 2017/3/14.
 */
var storage, petApp;

petApp = angular.module('petApp', []);

storage = window.localStorage;

petApp.controller('ModifyCtrl', function ($scope, $http) {
    $('#petCase').css('display','none');
    $('#1').parent("li").className = 'active';
    $scope.goToCase = function () {
        console.log('hide class');
        $('#petCase').css('display','block');
        $('#petClass').css('display','none');
    }

});