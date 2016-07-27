$main.controller('IndexController', function($scope, $rootScope, $http, $location){
	$scope.projects = null;
	$http({
		method: 'GET',
		url: 'project/json'
	}).then(function successCallback(response) {
		if( typeof(response.data) != 'undefined' ){
			data = response.data;
			$scope.projects = data;
		}
	}, function errorCallback(response) {
	});
});

$main.controller('LoginController', function($scope, $rootScope, $http, $location){
	$rootScope.recoveryPassword = false;
	$rootScope.alert = true;
});