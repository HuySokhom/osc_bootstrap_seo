app.directive('locationAccount',[
	'Restful'
	, function(Restful){
    return {
        link: function($scope, $element, $attrs){
        	var urlLocation = 'api/Location';
			Restful.get(urlLocation).success(function(data){
				$scope.location = data;
			});
        },
        templateUrl: 'ext/ng/app/account/partials/location.html'
    };
}]);