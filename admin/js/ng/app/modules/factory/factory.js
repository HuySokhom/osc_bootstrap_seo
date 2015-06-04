app.factory("Factory", [
 	'$http', 
 	function ($http) {
        var url = 'api/Modules';
        var obj = {};
        
        obj.get = function() {
            return $http({
        		url: url,
    			method: 'GET',
            });
        };
        
        obj.getModule = function(params) {
            return $http({
        		url: 'api/Module',
    			method: 'GET',
    			params: params
            });
        };
        
        obj.editModules = function(params) {
            return $http({
        		url: 'api/ModulesEdit',
    			method: 'GET',
    			params: params
            });
        };
        
        obj.remove = function(params) {
        	return $http({
        		method: 'DELETE', 
				url: 'api/Module',
				data: params
        	});
        };
        
        obj.insert = function(params){
        	return $http({
        		url: url,
    			method: 'POST',
    			data: params
        	});
        };
        
        obj.save = function(params){
        	return $http({
        		url: url + params.id,
    			method: 'PUT',
    			data: params
        	});
        };
        
        return obj;
        
 	}
]);
