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
			console.log($scope.vehicle);
		};
		
		$scope.remove = function($index, id){
			console.log(id);
			$scope.vehicle_type.elements.splice($index, 1);
		};
		
	}
]);