app.factory("Factory", [
 	'$http', 
 	function ($http) {
        
        var obj = {};
        // start get 
        obj.getVehicles = function(url) {
            return $http({
        		url: url,
    			method: 'GET',
//    			params: params
            });
        };
        
        // end start get 
        
        obj.remove = function(params) {
        	return $http({
        		method: 'DELETE', 
				url: 'api/Modules',
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
        		url: 'api/Modules',
    			method: 'PUT',
    			data: params
        	});
        };
        
        return obj;
        
 	}
]);
