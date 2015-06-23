app.controller(
	'vehicle_brand_ctrl', [
	'$scope'
	, 'Factory'
	, 'Services'
	, function ($scope, Factory, Services){
		
		$scope.init = function(){
			Factory.getVehicles('api/VehiclesBrand').success(function(data){
				$scope.modules = data;console.log(data);
			});
		};
		$scope.init();
		
		
	}
]);