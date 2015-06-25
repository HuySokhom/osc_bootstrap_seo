app.controller(
	'account_ctrl', [
	'$scope'
	, 'Restful'
	, 'Services'
	, function ($scope, Restful, Services){
		
		$scope.disabled = true;
		var url = 'api/Session/Customer';
		$scope.init = function(){
			Restful.get(url).success(function(data){
				$scope.account_info = data;
			});
		};
		$scope.init();
		
		$scope.edit = function(params){
			if( $scope.disabled == true ){
				$scope.disabled = false;
			}else{
				$scope.disabled = true;
			}
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