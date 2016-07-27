$main.controller('ProjectController', function($scope, $rootScope, $http, $location){
	$rootScope.backBtn = true;
	$scope.project_id = null;
	$scope.loadingSubsidiaries = false;
	if( typeof(navigator) != 'undefined' && typeof(navigator.geolocation) != 'undefined' ){
		if (typeof(Number.prototype.toRad) === "undefined") {
			Number.prototype.toRad = function() { return this * Math.PI / 180; }
		}
		$scope.geo = { 
			locator: navigator.geolocation, 
			error: function( err ){ console.log(err.message+": "+err.message); },
			options: { enableHighAccuracy: true, timeout: 20000, maximumAge: 0} ,
			coords: null,
			getCoords: function(){
				$scope.geo.locator.getCurrentPosition(function(pos){
					$scope.geo.coords = pos;
				}, $scope.geo.error, $scope.geo.options );
			},
			calcDistance: function(lon1, lat1, lon2, lat2) {
				var R = 6371; // Radius of the earth in km
				var dLat = (lat2-lat1).toRad();  // Javascript functions in radians
				var dLon = (lon2-lon1).toRad(); 
				var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
				Math.cos(lat1.toRad()) * Math.cos(lat2.toRad()) * 
				Math.sin(dLon/2) * Math.sin(dLon/2); 
				var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
				var d = R * c; // Distance in km

				return d;
			},
			getDistance: function(i, lat, lng){
				navigator.geolocation.getCurrentPosition(function(pos){
					$scope.geo.coords = pos;
					if( pos && typeof(pos.coords) != 'undefined' && typeof(pos.coords.latitude) != 'undefined' ){
						_distance = $scope.geo.calcDistance( pos.coords.latitude, pos.coords.longitude, lat, lng );
						$scope.subsidiaries[i].distance = _distance;
						$scope.$apply();
					}
				}, this.error, this.options );
				
			}
		};
		navigator.geolocation.watchPosition(function(pos){
			if( pos && typeof(pos.coords) != 'undefined' && typeof(pos.coords.latitude) != 'undefined' ){
				angular.forEach($scope.subsidiaries, function(_subsidiary, i){
					lat = _subsidiary.location.lat;
					lng = _subsidiary.location.lng;
					_distance = $scope.geo.calcDistance( pos.coords.latitude, pos.coords.longitude, lat, lng );
					$scope.subsidiaries[i].distance = _distance;
				});
				$scope.$apply();
			}
		}, $scope.geo.error, $scope.geo.options);
	}
	else{
		$scope.geo = false;
	}
	$scope.showDistance = function(_subsidiary){
		distance = "";
		if( typeof(_subsidiary.distance) != 'undefined' ){
			dis = _subsidiary.distance;
			if( dis > 0 ){
				if( dis <= 0.5 ){
					distance = dis.toFixed(2)+"m";
				}
				else{
					distance = dis.toFixed(2)+"km";
				}
			}
		}

		return distance;
	};

	$scope.init = function(project_id){
		$scope.project_id = project_id;
		$scope.loadingSubsidiaries = true;
		$http({
			method: 'GET',
			url: '/project/'+$scope.project_id+'/subsidiaries.json'
		}).then(function successCallback(response) {
			if( typeof(response.data) != 'undefined' ){
				data = response.data;
				$scope.subsidiaries = data;
				angular.forEach($scope.subsidiaries, function(_subsidiary, key){
					if( typeof(_subsidiary.location) != 'undefined' && typeof(_subsidiary.location.lat) != 'undefined' ){
						if( $scope.geo ){
							$scope.geo.getDistance(key, _subsidiary.location.lat, _subsidiary.location.lng);
						}
					}
				});
				$scope.loadingSubsidiaries = false;
			}
		}, function errorCallback(response) {

		});
	};
	$scope.getLocation = function(){
	    if (navigator.geolocation) {
	        navigator.geolocation.getCurrentPosition(function(position){
				console.log(position)
	        });
	    } else {
	        x.innerHTML = "Geolocation is not supported by this browser.";
	    }
	}
});