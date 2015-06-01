app.controller(
	'modules_ctrl', [
	'$scope'
	, 'Factory'
	, 'Services'
	, function ($scope, Factory, Services){
		
		$scope.module_install = [];
		
		$('.message-remove').hide();
		$scope.remove = function(params){
			// push object to install module
			$scope.modules.elements.push(params);
			Services.removeObject($scope.module_install, params.title);
			// alert message
			Services.alertMessage('.message-remove');
		};
		
	}
]);