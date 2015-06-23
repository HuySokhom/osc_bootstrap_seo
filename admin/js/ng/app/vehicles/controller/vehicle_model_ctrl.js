app.controller(
	'vehicle_model_ctrl', [
	'$scope'
	, 'Factory'
	, 'Services'
	, '$location'
	, function ($scope, Factory, Services, $location){
		
		$scope.init = function(){
			Factory.getVehicles('api/VehiclesModel').success(function(data){
				$scope.modules = data;console.log(data);
			});
		};
		$scope.init();
		
	}
]);