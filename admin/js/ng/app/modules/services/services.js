app.service("Services", 
	function() {
		
        this.alertMessage = function(attr){
        	$(attr).show();
			setTimeout(function(){
				$(attr).hide();
			},1000);
        };
        
 	}
);
