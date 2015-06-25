app.controller(
	'account_ctrl', [
	'$scope'
	, 'Restful'
	, 'Services'
	, function ($scope, Restful, Services){
		
		$scope.init = function(){
			var url = 'api/Session/Customer';
			Restful.get(url).success(function(data){
				$scope.account_info = data;
				console.log(data);
			});
			// get location information
			var urlLocation = 'api/Location';
			Restful.get(urlLocation).success(function(data){
				$scope.location = data;
				console.log(data);
			});
		};
		$scope.init();
		
		$scope.edit = function(params){
			$scope.account = angular.copy(params);
		};
		
		$scope.save = function(params){
			var data = {
				name : $scope.vehicle.name,
				type : 'brand'
			};
			if( $scope.vehicle.id ){
				// add new object model
				$scope.vehicle.type = 'brand';
				Factory.save($scope.vehicle).success(function(data){
					$scope.init();
					$('#brand').modal('hide');
				});
			}
		};

		
	}
]);