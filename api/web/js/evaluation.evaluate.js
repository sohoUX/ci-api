$main.controller('EvaluateController', function($scope, $rootScope, $http, $location, $httpParamSerializerJQLike){
	$rootScope.backBtn = true;
	$scope.fieldsets = null;
	$scope.round = null;
	$scope.evaluation = {id: null, name:''};
	$scope.project = {id: null, name:''};
	$scope.answers = {};
	$scope.skipLogic = {};
	$scope.alternatives = {};
	$scope.saving = false;
	$scope.form = { total: 0 };
	$scope.load = function(evaluation_id){
		$scope.evaluation.id = evaluation_id;
		$http({
			method: 'GET',
			url: $location.protocol()+"://"+$location.host()+'/evaluation/'+$scope.evaluation.id+'.json'
		}).then(function successCallback(response) {
			if( typeof(response.data) != 'undefined' ){
				data = response.data;
				angular.forEach(data.fieldsets, function(fieldset, key){
					fieldsetKey = key;
					data.fieldsets[key].key = key;
					angular.forEach(fieldset.fields, function(field, key){
						data.fieldsets[fieldsetKey].fields[key].fieldset = fieldsetKey;
						data.fieldsets[fieldsetKey].fields[key].key = key;
						$scope.answers[field.id] = field.answer;
						if( typeof(field.skiplogic) != 'undefined' && Object.keys(field.skiplogic).length > 0 ){
							angular.forEach(field.skiplogic, function(question, answer){
								if( typeof($scope.skipLogic[question]) != 'undefined' ){
									$scope.skipLogic[question].push({'parent': field.id, 'answer':answer});
								}
								else{
									$scope.skipLogic[question] = [{'parent': field.id, 'answer':answer}];
								}
								
							});
						}
						_alternatives = {};
						if( typeof(field.predefined_answers) != 'undefined' ){
							//console.log( field.predefined_answers );
							angular.forEach( field.predefined_answers, function(preAnswers, key){
								angular.forEach( preAnswers, function(preAnswer, p){
									if( typeof(field.alternatives) != 'undefined' 
										&& field.alternatives != null 
										&& typeof(field.alternatives[preAnswer.id]) != 'undefined' ){
										_alternatives[preAnswer.id] = field.alternatives[preAnswer.id];
									}
								});
							});
						}
						$scope.alternatives[field.id] = _alternatives;

					});
					data.fieldsets[key].progress = $scope.progress(fieldset);
					data.fieldsets[key].total = $scope.getTotal(fieldset);
				});
				$scope.fieldsets = data.fieldsets;
				$scope.round = data.round;
				$scope.form.total = $scope.getFormTotal();
			}
			// this callback will be called asynchronously
			// when the response is available
		}, function errorCallback(response) {
			// called asynchronously if an error occurs
			// or server returns response with an error status.
		});
	};

	$scope.checkSkipLogic = function(field){
		skipsLogic = $scope.skipLogic[field.id];
		hide = false;
		counter = 0;
		angular.forEach(skipsLogic, function(sl){
			answer = $scope.answers[sl.parent];
			if(answer != sl.answer){
				counter++;
			}
		});
		hide = (counter == 0)?false:true;

		return hide;
	};

	$scope.getFormTotal = function(){
		form_total = 0;
		angular.forEach($scope.fieldsets, function(fieldset, key){
			form_total = form_total + $scope.getTotal(fieldset);
		});
		
		return form_total;
	}

	$scope.progress = function(fieldset){
		progress = 0;
		total = 0;
		values = 0;
		if( typeof(fieldset) != 'undefined' ){
			if( typeof(fieldset.fields) != 'undefined' ){
				total = fieldset.fields.length 
				angular.forEach(fieldset.fields, function(field, key){
					if( $scope.answers[field.id] != null ){
						values++;
					}
				});
			}
			if( values > 0 ){
				progress = ((values*100)/total);
			}
		}
		return {'width': progress+'%'};
	}

	$scope.getFieldsetTotal = function(key){
		fieldset = $scope.fieldsets[key];
		total = 0;
		if( fieldset ){
			angular.forEach(fieldset.fields, function(field, key){
				if( $scope.answers[field.id] != null && $scope.answers[field.id] != 0 ){
					total = total+$scope.getResult(field);
				}
			});
		}

		return total;
	};

	$scope.getTotal = function(fieldset){
		values = 0;
		total = 0;
		if( typeof(fieldset) != 'undefined' ){
			if( typeof(fieldset.fields) != 'undefined' ){
				angular.forEach(fieldset.fields, function(field, key){
					if( $scope.answers[field.id] != null && $scope.answers[field.id] != 0 ){
						values++;
					}
				});
			}
			if( values > 0 ){
				total = (fieldset.percentage/fieldset.fields.length)*values;
			}
		}

		return total;
	};

	$scope.getResult = function(field){
		result = 0;
		fieldset = $scope.fieldsets[field.fieldset];
		_answers = 0;
		if(fieldset){
			angular.forEach(fieldset.fields, function(f, i){
				if(f.answer != 0){ _answers++; }
			});
			_answers = (_answers == 0)?1:_answers;
			_percent = 100/_answers;
			answer = (field.answer != null && field.answer != 0 )?true:false;
			if( answer ){
				result = _percent;
			}
		}

		return result;
	};

	$scope.saveAlternative = function(_index, _field){

		$scope.save(_index, _field);
	};

	$scope.save = function(_index, _field){
		if( _field.answer == 1 ){
			angular.forEach(_field.predefined_answers[2], function(pa, i){
				delete $scope.alternatives[_field.id][pa.id];
			});
		}
		else if( _field.answer == 2){
			angular.forEach(_field.predefined_answers[1], function(pa, i){
				delete $scope.alternatives[_field.id][pa.id];
			});
		}
		else{
			$scope.alternatives[_field.id] = [];
		}
		$scope.alternatives[_field.id];
		$scope.fieldsets[_index].progress = $scope.progress( $scope.fieldsets[_index] );
		$scope.fieldsets[_index].total = $scope.getTotal( $scope.fieldsets[_index] );
		$scope.fieldsets[_index].fields[_field.key].answer = $scope.answers[_field.id];
		$scope.form.total = $scope.getFormTotal();
		if( $scope.validateAlternatives() ){
			$params = $httpParamSerializerJQLike({answers: $scope.answers, alternatives: $scope.alternatives});
			$http({
				method: 'POST',
				url: $location.protocol()+"://"+$location.host()+'/evaluation/'+$scope.evaluation.id+'/save',
				headers : {'Content-Type':'application/x-www-form-urlencoded; charset=UTF-8'},
				data: $params,
			}).then(function successCallback(response) {
				if( typeof(response.data) != 'undefined' ){
					data = response.data;
					//$scope.fieldsets = data.fieldsets;
				}
			}, function errorCallback(response) {

			});
		}
	};

	$scope.validateAlternatives = function(){
		valid = 0;
		angular.forEach($scope.answers, function(answer, field_id){
			if( answer == 1 || answer == 2 ){
				alternatives = (typeof($scope.alternatives[field_id]) != 'undefined')?$scope.alternatives[field_id]:[];
				if( Object.keys(alternatives).length > 0 ){
					selectedAlternatives = 0;
					angular.forEach(alternatives, function(selected, alternative){
						if( selected ){
							selectedAlternatives++;
						}
					});
					if( selectedAlternatives == 0 ){
						message = "Debes seleccionar alguna alternativa para poder continuar.";
						$rootScope.alert('md', "Finalizar evaluación", message);
						return false;
					}

				}
			}
		});

		return true;
	}

	$scope.finish = function(){
		has_unfinished_answers = false;
		angular.forEach($scope.answers, function(answer, key){
			if(answer == null){
				has_unfinished_answers = true;
				return false;
			}
		});
		if( has_unfinished_answers ){
			$rootScope.alert('md', "Finalizar evaluación", "Debes contestar todas las preguntas antes de finalizar la evaluación.");
			return false;
		}
		else{
			title = "Finalizar Evaluación";
			$http({
				method: 'POST',
				url: $location.protocol()+"://"+$location.host()+'/evaluation/'+$scope.evaluation.id+'/finish',
				headers : {'Content-Type':'application/x-www-form-urlencoded; charset=UTF-8'},
			}).then(function successCallback(response) {
				if( typeof(response.data) != 'undefined' ){
					if( typeof(response.data.status) != 'undefined' ){
						if( response.data.status ){
							location.href = $location.protocol()+"://"+$location.host()+'/evaluation/'+$scope.evaluation.id+'/observations';
						}
						else{
							$rootScope.alert('md', title, response.data.message);
						}
					}
					else{
						$rootScope.alert('md', title, "Ha ocurrido un problema al intentar finalizar la evaluación.");
					}
				}
			}, function errorCallback(response) {
				$rootScope.alert('md', title, "Ha ocurrido un problema al intentar finalizar la evaluación.");
			});
		}
	};

	$scope.expandTextarea = function($event){
		$event.target.setAttribute('rows', 5);
	};
	$scope.collapseTextarea = function($event){
		$event.target.setAttribute('rows', 1);
	};
	$scope.log = function(value){
		//console.log(value);
	};
});