$main.controller('ObservationsController', function($scope, $rootScope, $http, $location, $httpParamSerializerJQLike){
	$rootScope.backBtn = true;
	$scope.fieldsets = null;
	$scope.round = null;
	$scope.evaluation = {id: null, name:''};
	$scope.project = {id: null, name:''};
	$scope.subsidiary = {id: null, name:''};
	$scope.observations = {};
	$scope.saving = false;
	$scope.form = { total: 0 };
	$scope.next = {id: null, name: null};
	$scope.load = function(evaluation_id, subsidiary_id, project_id){
		$scope.evaluation.id = evaluation_id;
		$scope.subsidiary.id = subsidiary_id;
		$scope.project.id = project_id;
		$http({
			method: 'GET',
			url: $location.protocol()+"://"+$location.host()+'/observations/'+$scope.evaluation.id+'.json'
		}).then(function successCallback(response) {
			if( typeof(response.data) != 'undefined' ){
				if( typeof(response.data.observations) != 'undefined' ){
					$scope.observations = response.data.observations;
					$scope.next = response.data.next;
				}
			}
			// this callback will be called asynchronously
			// when the response is available
		}, function errorCallback(response) {
			// called asynchronously if an error occurs
			// or server returns response with an error status.
		});
	};

	
	$scope.save = function(_index){
		$params = $httpParamSerializerJQLike({answers: $scope.observations});
		$http({
			method: 'POST',
			url: $location.protocol()+"://"+$location.host()+'/observations/'+$scope.evaluation.id+'/save',
			headers : {'Content-Type':'application/x-www-form-urlencoded; charset=UTF-8'},
			data: $params,
		}).then(function successCallback(response) {
			if( typeof(response.data) != 'undefined' ){
				data = response.data;
				//$scope.fieldsets = data.fieldsets;
			}
		}, function errorCallback(response) {

		});
	};

	$scope.goToNextDimension = function(){
		if($scope.next){
			path = '/evaluation/'+$scope.next.id+'/evaluate';
		}
		else{
			path = '/project/'+$scope.project.id+'/subsidiary/'+$scope.subsidiary.id;
		}
		$rootScope.go(path);
	};
	$scope.hasAlternatives = function(observation){
		if( (observation.slug == 'strengths' || observation.slug == 'improvement_opportunities') && 
			(typeof(observation.alternatives) != 'undefined' && observation.alternatives.length > 0) ){
			return true;
		}
		return false;
	};
});