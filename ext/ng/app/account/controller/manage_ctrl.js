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


		$scope.disabled = true;

		$scope.edit = function(params){
			console.log(params);
		};

		$scope.save = function(params){
			Restful.put(url, params).success(function(data){
				$.notify({
					title: '<strong>Success: </strong>',
					message: 'Update Success.'
				},{
					type: 'success'
				});
			});
		};

		$scope.remove = function(id){
			if (confirm('Are you sure you want to delete this product?')) {
				$.notify({
					title: '<strong>Success: </strong>',
					message: 'Delete Success.'
				},{
					type: 'success'
				});
			}
		}
	}
]);