app.controller(
	'modules_edit_ctrl', [
	'$scope'
	, 'Factory'
	, 'Services'
	, function ($scope, Factory, Services){
		
		$scope.module_edit = [];
		$scope.edit = function(params){
			var path = $('#path').attr('class');
			var dataParse = {
				class_name: params.code, 
				path: path
			};
			Factory.editModules(dataParse).success(function(data){
				$scope.module_edit = data;
			});
		};
		
	}
]);