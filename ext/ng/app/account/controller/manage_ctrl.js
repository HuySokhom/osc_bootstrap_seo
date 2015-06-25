app.controller(
	'manage_ctrl', [
	'$scope'
	, 'Restful'
	, 'Services'
	, function ($scope, Restful, Services){
		var url = 'api/ProductPost';
		$scope.init = function(){
			Restful.get(url).success(function(data){
				$scope.products_post = data;
				console.log(data);
			});
		};
		$scope.init();
		
	}
]);