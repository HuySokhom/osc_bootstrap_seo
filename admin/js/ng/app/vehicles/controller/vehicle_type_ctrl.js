app.controller(
	'vehicle_type_ctrl', [
	'$scope'
	, 'Factory'
	, 'Services'
	, function ($scope, Factory, Services){
		
		$scope.header = 'Vehicle Type';
		$scope.add = function(){
			$scope.vehicle = '';
		};

		$scope.init = function(){
			Factory.getVehicles().success(function(data){
				$scope.vehicle_type = data;console.log(data);
			});
		};
		$scope.init();
		
		$scope.edit = function(params){
			$scope.vehicle = params;
		};

		$scope.save = function(params){
			var data = {
				name : $scope.vehicle.name,
				type : 'type'
			};
			if( $scope.vehicle.id ){
				Factory.save($scope.vehicle).success(function(data){
					$scope.init();
				});
			}else{
				Factory.insert(data).success(function(data){
					$scope.init();
					console.log(data);
				});
			}
		};
		
		$scope.remove = function($index, id){
			var data = {
				id: id,
				type: 'type'
			};
			Factory.remove(data).success(function(data){
				$scope.vehicle_type.elements.splice($index, 1);
				console.log(data);
			}); 
		};
		
	}
]);