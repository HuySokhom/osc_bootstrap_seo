app.controller(
	'modules_edit_ctrl', [
	'$scope'
	, 'Factory'
	, 'Services'
	, function ($scope, Factory, Services){
		
		$scope.module_edit = [];
		$scope.edit = function(params, header){
			$scope.header = header;
			angular.element('#element').empty();
			var dataParse = {
				class_name: params.code, 
				path: angular.element('#path').attr('class')
			};
			Factory.editModules(dataParse).success(function(data){
				angular.element('#element').append(data);
			});
		};
		
		$scope.save = function(params){
			
		};
		
	}
]);