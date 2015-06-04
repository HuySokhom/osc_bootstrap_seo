app.controller(
	'modules_ctrl', [
	'$scope'
	, 'Factory'
	, 'Services'
	, function ($scope, Factory, Services){
		// get module name for filter
		var path = $('#path').attr('class');
		var module = $('#module').attr('class');
		function init(){
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
		$scope.remove = function(params, index){
			// push object to install module
			$scope.modules.elements.push(params);
			$scope.module_install.splice(index, 1);
			// alert message
			Services.alertMessage('.message-remove');			
			var data = {
				code: params.code,
				module: module, 
				path: path
			};			
			Factory.remove(data).success(function(data){
				console.log(data);
			});
		};
		
	}
]);