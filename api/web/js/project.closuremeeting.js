$main.controller('ClosureMeetingController', function($scope, $rootScope, $http, $location, $httpParamSerializerJQLike){
	$rootScope.backBtn = true;
	$scope.fieldsets = null;
	$scope.round = null;
	$scope.comment = {id: null, name:''};
	$scope.project = {id: null, name:''};
	$scope.observations = {};
	$scope.slugs = ['strengths', 'improvement_opportunities', 'priority_conductive', 'tactical_plan'];
	$scope.labels = null;

	$scope.load = function(observations, labels){
		$scope.observations = observations;
		$scope.labels = labels;
	};

	$scope.save = function(){
		obs = $scope.observations;
		params = $httpParamSerializerJQLike(obs);
		path = "/project/"+obs.project_id+"/subsidiary/"+obs.subsidiary_id+"/round/"+obs.round_id+"/closuremeeting/save";
		$http({
			method: 'POST',
			url: $location.protocol()+"://"+$location.host()+path,
			headers : {'Content-Type':'application/x-www-form-urlencoded; charset=UTF-8'},
			data: params,
		}).then(function successCallback(response) {
			if( typeof(response.data) != 'undefined' ){
				data = response.data;
				if( !data.status ){
					$rootScope.modal(null, "Reunión de Cierre", "Ha ocurrido un error al intentar guardar las observaciones de la reunión de cierre.");
				}
			}
		}, function errorCallback(response) {

		});
	};
	$scope.saveAndReview = function(){
		obs = $scope.observations;
		path = "/project/"+obs.project_id+"/subsidiary/"+obs.subsidiary_id+"/round/"+obs.round_id+"/review";
		$rootScope.go(path);
	};
	$scope.sendMemo = function(){
		obs = $scope.observations;
		path = "/project/"+obs.project_id+"/subsidiary/"+obs.subsidiary_id+"/round/"+obs.round_id+"/sendmemo";
		$rootScope.modalMemo(path);
	};
});