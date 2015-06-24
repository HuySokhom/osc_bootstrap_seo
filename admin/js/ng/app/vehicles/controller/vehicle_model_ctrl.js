app.controller(
	'vehicle_model_ctrl', [
	'$scope'
	, 'Factory'
	, 'Services'
	, '$location'
	, function ($scope, Factory, Services, $location){
		
		$scope.header = 'Vehicle Model';
		$scope.add = function(){
			$scope.vehicle = '';
		};

		$scope.init = function(){
			Factory.getVehicles({Type: 'model'}).success(function(data){
				$scope.vehicle_model = data;console.log(data);
			});
		};
		$scope.init();
		
		$scope.edit = function(params){
			$scope.vehicle = angular.copy(params);
		};
		
		$scope.save = function(params){
			var data = {
				name : $scope.vehicle.name,
				type : 'model'
			};
			if( $scope.vehicle.id ){
				// add new object model
				$scope.vehicle.type = 'model';
				Factory.save($scope.vehicle).success(function(data){
					$scope.init();
					$('#brand').modal('hide');
				});
			}else{
				Factory.insert(data).success(function(data){
					$scope.init();
					$('#brand').modal('hide');
				});
			}
		};
		
		$scope.remove = function($index, id){
			var data = {
				id: id,
				type: 'model'
			};
			Factory.remove(data).success(function(data){
				$scope.vehicle_model.elements.splice($index, 1);
				console.log(data);
			});
		};
		
	}
]);