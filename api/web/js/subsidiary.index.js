$main.controller('SubsidiaryController', function($scope, $rootScope, $http, $location){
	$scope.forms = null;
	$rootScope.backBtn=true;
	$scope.subsidiary = {id: null, name:''};
	$scope.evaluation = {id: null, name:''};
	$scope.project = {id: null, name:''};
	$scope.project = {id: null, name:''};
	$scope.has_uncomplete_evaluation = true;
	$scope.load = function(project_id, subsidiary_id){
		$scope.project.id = project_id;
		$scope.subsidiary.id = subsidiary_id;
		completed_evaluations = 0;
		$http({
			method: 'GET',
			url: $location.protocol()+"://"+$location.host()+'/project/'+$scope.project.id+'/subsidiary/'+$scope.subsidiary.id+'/forms.json'
		}).then(function successCallback(response) {
			
			if( typeof(response.data) != 'undefined' ){
				data = response.data;
				angular.forEach(data, function(form, key){
					switch(form.evaluation.status){
						case(0): data[key].evaluation.statusName = "Realizar evaluación"; break;
						case(1): data[key].evaluation.statusName = "Continuar evaluación"; break;
						case(2): data[key].evaluation.statusName = "Evaluación realizada"; completed_evaluations++; break;
						default: data[key].evaluation.statusName = "Evaluación realizada"; break;
					}
				});
				$scope.forms = data;
				if( $scope.forms.length == completed_evaluations ){
					$scope.has_uncomplete_evaluation = false;
				}
			}
			// this callback will be called asynchronously
			// when the response is available
		}, function errorCallback(response) {
			// called asynchronously if an error occurs
			// or server returns response with an error status.
		});
	};

	$scope.evaluate = function(evaluation, _current){
		_current = (typeof(_current) == 'undefined')?true:_current;
		//if(evaluation.status != 2){
			location.href = $location.protocol()+"://"+$location.host()+'/evaluation/'+evaluation.id+'/evaluate';	
		/*}
		else{
			$rootScope.modalSummary({'evaluation': evaluation, 'current': _current});
		}
		*/
	};

	$scope.closureMeeting = function(round_id){
		path = "/project/"+$scope.project.id+"/subsidiary/"+$scope.subsidiary.id+"/round/"+round_id+"/closuremeeting";
		$rootScope.go(path);
	};
});