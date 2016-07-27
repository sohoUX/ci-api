'use strict';
$main.controller('ReportController', function($scope, $rootScope, $http, $location, $httpParamSerializerJQLike){
	$rootScope.backBtn = true;
    $scope.path = null;
	$scope.load = function(_path){
        $scope.path = _path;
    }
    $scope.sendReport = function(){
        $rootScope.modalMemo($scope.path);
    };
});