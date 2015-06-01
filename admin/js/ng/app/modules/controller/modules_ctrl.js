app.controller(
	'modules_ctrl', [
	'$scope'
	, 'Factory'
	, 'Services'
	, function ($scope, Factory, Services){
		
		$scope.module_install = [];
		
		$scope.remove = function(params){
			console.log(params);
			Services.removeObject($scope.module_install, params.title);
			// alert message
//			$('.message').show();
//			setTimeout(function(){
//				$('.message').hide();
//			},1000);	
		};
		
	}
]);