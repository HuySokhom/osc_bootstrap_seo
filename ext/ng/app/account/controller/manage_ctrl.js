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
			});
		};
		$scope.init();

		Restful.get('api/Manufacturers').success(function(data){
			$scope.manufacturers = data;
		});

		Restful.get('api/Session/Customer').success(function(data){
			$scope.user = data.elements[0];
		});

		Restful.get('api/Category').success(function(data){
			$('#category').html(data.html);
		});

		$scope.disabled = true;

		$scope.edit = function(params){
			$scope.products = params;
			$('#product-popup').modal('show');

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

		$scope.remove = function(id, $index){
			console.log(id);
			if (confirm('Are you sure you want to delete this product?')) {
				$.notify({
					title: '<strong>Success: </strong>',
					message: 'Delete Success.'
				},{
					type: 'success'
				});
				$scope.products_post.elements.splice($index, 1);
			}
		}
	}
]);