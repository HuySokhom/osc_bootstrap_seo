app.controller(
	'modules_edit_ctrl', [
	'$scope'
	, 'Factory'
	, 'Services'
	, '$location'
	, function ($scope, Factory, Services, $location){
		function init(){
			Factory.get().success(function(data){
				$scope.modules = data;
			});
		};
		init();
		
		$('.message-install').hide();
		$scope.installModule = function(params){
			$scope.module_install.push(params);
			Services.removeObject($scope.modules.elements, params.title);
			// alert message
			Services.alertMessage('.message-install');
		};
		
	}
]);