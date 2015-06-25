app.controller(
	'account_ctrl', [
	'$scope'
	, 'Restful'
	, 'Services'
	, function ($scope, Restful, Services){
		
		var url = 'api/Session/Customer';
		$scope.init = function(){
			Restful.get(url).success(function(data){
				$scope.account_info = data;
			});
		};
		$scope.init();
		
		$scope.edit = function(params){
			$scope.account = angular.copy(params);
		};
		
		$scope.save = function(params){
			Restful.put(url, params).success(function(data){
				$.notify({
					title: '<strong>Success: </strong>',
					message: 'Update Account Succesful.'
				},{
					type: 'success'
				});
			});
		};

		
	}
]);