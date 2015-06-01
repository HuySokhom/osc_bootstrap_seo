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
        
        obj.remove = function(params) {
        	return $http({
        		method: 'DELETE', 
				url: url + params.id,
				data: params
        	});
        };
        
        obj.add = function(params){
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
