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