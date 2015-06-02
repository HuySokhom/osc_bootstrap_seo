app.controller(
	'modules_ctrl', [
	'$scope'
	, 'Factory'
	, 'Services'
	, function ($scope, Factory, Services){
		
		function init(){
			// get module name for filter
			var module = $('#module').attr('class');
			var path = $('#path').attr('class');
			var dataParse = {
				module: module, 
				path: path
			};
			Factory.getModule(dataParse).success(function(data){
				console.log(data);
				$scope.module_install = data;
			});
		}
		init();
		
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