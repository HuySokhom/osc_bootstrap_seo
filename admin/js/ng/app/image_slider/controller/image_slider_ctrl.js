app.controller(
	'image_slider_ctrl', [
	'$scope'
	, 'Factory'
	, 'Services'
	, function ($scope, Factory, Services){
		$scope.add = function(){
			$scope.image_slider = '';
		};

		$scope.init = function(){
			Factory.getImageSlider().success(function(data){
				$scope.image_sliders = data;
			});
		};
		$scope.init();
		
		$scope.edit = function(params){
			$scope.image_slider = angular.copy(params);
		};

		$scope.save = function(params){
			var data = {
				text : $scope.image_slider.text,
				image : $scope.image_slider.image,
				sort_order: $scope.image_slider.sort_order
			};
			if( $scope.image_slider.id ){
				Factory.save(data, $scope.image_slider.id).success(function(data){
					$scope.init();
					$('#brand').modal('hide');
					console.log(data);
				});
			}else{
				Factory.insert(data).success(function(data){
					$scope.init();
					console.log(data);
					$('#brand').modal('hide');
				});
			}
		};
		
		$scope.remove = function($index, id){
			var data = {
				id: id
			};
			Factory.remove(data).success(function(data){
				$scope.image_sliders.elements.splice($index, 1);
				console.log(data);
			}); 
		};
		
	}
]);