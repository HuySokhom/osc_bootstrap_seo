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
			$scope.vehicle = params;
		};
		
		$scope.save = function(params){
			console.log($scope.vehicle);
		};
		
		$scope.remove = function($index, id){
			console.log(id);
			$scope.vehicle_model.elements.splice($index, 1);
		};
		
	}
]);