'use strict';
$main.controller('ReviewController', function($scope, $rootScope, $http, $location, $httpParamSerializerJQLike){
	$rootScope.backBtn = true;
	$scope.project = null;
	$scope.subsidiary = null;
	$scope.round = null;
    $scope.evaluation = null;
	$scope.tab = 1;
	$scope.chartData = null;
	$scope.chartOptions = null;
    $scope.detail = null;
	var items = [[39.8, 22.25, 26.9, 54.24, 20.18], [19.73, 16.91, 33.27, 26.9, 54.6]];
	var labels = ['1. Reuniones', '2. Emprendedores y pymes', '3. Oficial Identité', '4. Oficial Renta Masiva', '5. Gerente Coach'];

    var color = { purple: '#4e2a54', gray: '#969696' };
    $scope.print = false;
    var _options = {
        seriesColors:[color.gray, color.purple],
        seriesDefaults: {
            renderer:$.jqplot.BarRenderer,
            pointLabels: { show: true, location: 'e', edgeTolerance: -15 },
            shadowAngle: 135,
            rendererOptions: {
                barDirection: 'horizontal'
            }
        },
        axes: {
            xaxis: {
                rendererOptions: { forceTickAt0: true, forceTickAt100: true },
                tickOptions: { formatString: "%'d\%" }
            },
            yaxis: {
                renderer: $.jqplot.CategoryAxisRenderer,
            }
        }
    };
    $scope.table = [];
    $scope.closeOthers = true;
    $scope.observations = [];
	$scope.load = function(data, print){
        $scope.print = print;
		$scope.project = data.project;
		$scope.subsidiary = data.subsidiary;
		$scope.round = data.round;
        $scope.evaluation = data.evaluation;
        var path = "/project/"+$scope.project.id+"/subsidiary/"+$scope.subsidiary.id+"/round/"+$scope.round.id+"/review.json";
        $http({
            method: 'GET',
            url: (path)
        }).then(function successCallback(response) {
            if( typeof(response.data) != 'undefined' ){
                var data = response.data;
                _options.axes.yaxis.ticks = data.labels;
                $scope.chartOptions = _options;
                $scope.chartData = data.data;
                angular.forEach(data.labels, function(label, key){
                    var d = data.data;
                    var _current = 0;
                    var _lastest = 0;
                    if( typeof(d) != 'undefined' && typeof(d[0]) != 'undefined' && typeof(d[0][key]) != 'undefined' ){
                        _current = data.data[0][key];
                    }
                    if( typeof(d) != 'undefined' && typeof(d[1]) != 'undefined' && typeof(d[1][key]) != 'undefined' ){
                        _lastest = data.data[1][key];
                    }
                });
                $scope.observations = data.observations;
                angular.forEach($scope.observations, function(val, key){
                    $scope.observations[key].open = true;
                });
            }
        }, function errorCallback(response) {

        });
        var detailPath = "/project/"+$scope.project.id+"/subsidiary/"+$scope.subsidiary.id+"/round/"+$scope.round.id+"/detail.json";
        $http({ 
            method: 'GET', url: detailPath
        }).then(function successCallback(response) {        
            if( typeof(response.data) != 'undefined' ){
                var data = response.data;
                $scope.detail = data;                
                angular.forEach(data, function(form, id){
                    $scope.table.push(form);
                });
            }
        }, function errorCallback(response){ });
	};

    $scope.totalProgress = function(answers){
        var total = 0;
        angular.forEach(answers, function(answer, key){
            if( typeof(answer.separator) == 'undefined' ){
                total= total+answer.value;
            }
        });

        return total;
    };

    $scope.lastAnswerValue = function(form, key){
        if( form.last_answers != null && typeof(form.last_answers[key]) != 'undefined' ){
            return form.last_answers[key].value;
        }
        else{
            return 0;
        }
    };

    $scope.generateReport = function(){
        var path = "/project/"+$scope.project.id+"/subsidiary/"+$scope.subsidiary.id+"/round/"+$scope.round.id+"/report";
        $rootScope.go(path);
    };
});