app.controller(
	'modules_install_ctrl', [
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
			
			Factory.insert().success(function(data){
				console.log(data);
			});
			// alert message
			Services.alertMessage('.message-install');
		};
		
	}
]);