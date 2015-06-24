app.controller(
	'vehicle_brand_ctrl', [
	'$scope'
	, 'Factory'
	, 'Services'
	, function ($scope, Factory, Services){
		
		$scope.header = 'Vehicle Brand';
		$scope.add = function(){			
			$scope.vehicle = '';
		};

		$scope.init = function(){
			Factory.getVehicles({Type: 'brand'}).success(function(data){
				$scope.vehicle_brand = data;console.log(data);
			});
		};
		$scope.init();
		
		$scope.edit = function(params){
			$scope.vehicle = params;
		};
		
		$scope.save = function(params){
			var data = {
				name : $scope.vehicle.name,
				type : 'brand'
			};
			if( $scope.vehicle.id ){
				Factory.save($scope.vehicle).success(function(data){
					$scope.init();console.log(data);
				});
			}else{
				Factory.insert(data).success(function(data){
					$scope.init();
				});
			}
		};
		
		$scope.remove = function($index, id){
			var data = {
				id: id,
				type: 'brand'
			};
			Factory.remove(data).success(function(data){
				$scope.vehicle_brand.elements.splice($index, 1);
				console.log(data);
			});
		};
		
	}
]);