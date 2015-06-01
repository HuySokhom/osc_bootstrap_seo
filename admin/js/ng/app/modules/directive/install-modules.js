app.directive('installModules',function(){	
	return {
		restrict: 'EA',
		templateUrl : 'js/ng/app/modules/partials/edit-module.html',
		controller: 'modules_edit_ctrl'
	};
	
});