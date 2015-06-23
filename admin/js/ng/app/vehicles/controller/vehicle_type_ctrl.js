app.controller(
	'vehicle_type_ctrl', [
	'$scope'
	, 'Factory'
	, 'Services'
	, function ($scope, Factory, Services){
		
		$scope.init = function(){
			Factory.getVehicles('api/VehiclesType').success(function(data){
				$scope.modules = data;console.log(data);
			});
		};
		$scope.init();
		
		$('.message-remove').hide();
		$scope.remove = function(params, index){
			var data = {
				code: params.code,
				module: module, 
				path: path
			};			
			Factory.remove(data).success(function(data){
				$scope.modules.splice(index, 1);
				$scope.count = $scope.count + 1;
				// alert message
				Services.alertMessage('.message-remove');	
			});
		};
		
	}
]);