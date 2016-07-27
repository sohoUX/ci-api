'use strict';
var $main = angular.module('main.app', [ 'ngAnimate', 'ui.bootstrap', 'angularMoment', 'ui.chart']);
$main.controller('MainController', function($scope, $rootScope, $location, $uibModal){
	$rootScope.backBtn = false;
	$scope.title = "";
	$scope.message = "";
	$scope.buttons = [];
	$rootScope.log = function(value){
		console.log(value);
	};

	$rootScope.alert = function(size, title, message) {
		$scope.title = title;
		$scope.message = message;
		var modalInstance = $uibModal.open({
			animation: $scope.animationsEnabled,
			templateUrl: $location.protocol()+"://"+$location.host()+'/frontend/web/js/templates/modal.html',
			controller: 'ModalController',
			size: size,
			resolve: {
				parameters: function(){
					return {
						title: $scope.title,
						message: $scope.message
					};
				},
			}
		});
	};

	$rootScope.modal = function(size, title, message, template) {
		$scope.title = title;
		$scope.message = message;
		template = (typeof(template) != 'undefined')?template:'modal';
		var modalInstance = $uibModal.open({
			animation: true,
			templateUrl: $location.protocol()+"://"+$location.host()+'/frontend/web/js/templates/'+template+'.html',
			controller: 'ModalController',
			size: size,
			resolve: {
				parameters: function(){
					return {
						title: $scope.title,
						message: $scope.message
					};
				},
			}
		});
	};

	$rootScope.modalSummary = function(params){
		var modalInstance = $uibModal.open({
			animation: true,
			templateUrl: $location.protocol()+"://"+$location.host()+'/frontend/web/js/templates/summary.html',
			controller: 'ModalSummaryController',
			size: "lg",
			resolve: {
				parameters: function(){
					return {
						"evaluation": params.evaluation,
						"current": params.current,
						"user": params.user
					};
				},
			}
		});
	};

	$rootScope.modalMemo = function(_path){
		var modalInstance = $uibModal.open({
			animation: true,
			templateUrl: $location.protocol()+"://"+$location.host()+'/frontend/web/js/templates/memo.html',
			controller: 'ModalMemoController',
			size: "sm",
			resolve: {
				parameters: function(){
					return {
						'path': _path
					};
				},
			}
		});
	};
	$rootScope.go =  function(path){
		document.location.href = $location.protocol()+"://"+$location.host()+path;
	};
	$rootScope.goHome = function(path){
		document.location.href = $location.protocol()+"://"+$location.host();
	};
	$rootScope.goBack = function(path){
		history.go(-1);
	};
	$rootScope.logout = function(path){
		document.location.href = $location.protocol()+"://"+$location.host()+"/logout";
	};
});

$main.controller('ModalController', function($scope, $uibModalInstance, parameters){
	$scope.title = parameters.title;
	$scope.message = parameters.message;
	$scope.cancel = function () {
    	$uibModalInstance.dismiss('cancel');
 	};
});

$main.controller('ModalSummaryController', function($scope, $uibModalInstance, $http, $location, parameters){
	$scope.evaluation = parameters.evaluation;
	$scope.current = parameters.current;
	$scope.summary = {};
	$scope.closeOthers = true;
	$http({
		method: 'GET',
		url: $location.protocol()+"://"+$location.host()+'/evaluation/'+$scope.evaluation.id+'/summary.json'
	}).then(function successCallback(response) {		
		if( typeof(response.data) != 'undefined' ){
			data = response.data;
			$scope.summary = data;
		}
	}, function errorCallback(response) {

	});
	$scope.cancel = function () {
    	$uibModalInstance.dismiss('cancel');
 	};
});


$main.controller('ModalMemoController', function($scope, $rootScope, $uibModalInstance, $http, $httpParamSerializerJQLike, parameters){
	$scope.targets = [];
	$scope.targets.push("");
	$scope.message = "";
	$scope.is_sent = false;
	$scope.loading = false;
	$scope.path = parameters.path;

	$scope.addTarget =  function(current){
		var _key = $scope.targets.length-1;
		if( typeof($scope.targets[ _key ]) != 'undefined' ){
			var _target = $scope.targets[ _key ];
			if( typeof(_target) != 'undefined' && _target != ''){
				$scope.targets.push("");
			}
		}
	};
	$scope.send = function(){
		$scope.loading = true;
		var _targets = [];
		angular.forEach($scope.targets, function(val, key){
			if(val != ''){
				_targets.push(val);
			}
		});
		var params = $httpParamSerializerJQLike({ 'targets': _targets });
		if( _targets.length > 0 && typeof($scope.path) != 'undefined' ){
			
			$http({
				method: 'POST',
				url: parameters.path,
				headers : {'Content-Type':'application/x-www-form-urlencoded; charset=UTF-8'},
				data: params
			}).then(function successCallback(response) {
				$scope.loading = false;		
				if( typeof(response.data) != 'undefined' && typeof(response.data.success) != 'undefined' ){
					if( response.data.success ){
						$scope.message = response.data.success;
					}
					else if( response.data.error ){
						$scope.message = response.data.error;
					}
				}
				else if( response.data.message ){
					$scope.message = response.data.message;
				}
				else{
					$scope.message = "En unos minutos la minuta llegara a los destinatarios.";
				}
			}, function errorCallback(response) {
				$scope.loading = false;
				$scope.message = "Ha ocurrido un error al intentar enviar la minuta.";
			});
			$scope.is_sent = true;
		}
	};
	$scope.exit = function(){
		$rootScope.goHome();
	};

	$scope.cancel = function () {
    	$uibModalInstance.dismiss('cancel');
 	};
	$rootScope.loader = true;
	$rootScope.container = false;
 	$rootScope.ready = function(){
 		$rootScope.loader = false;
 		$rootScope.container = true;
 	};
});

angular.element(document).ready(function() {
	//console.log( angular.element('html').scope() );
});