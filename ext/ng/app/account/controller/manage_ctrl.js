app.controller(
	'manage_ctrl', [
	'$scope'
	, 'Restful'
	, 'Services'
	, 'Upload'
	, '$timeout'
	, function ($scope, Restful, Services, Upload, $timeout){
		var url = 'api/Session/User/ProductPost';
		$scope.init = function(params){
			Restful.get(url, params).success(function(data){
				$scope.products_post = data;
				$scope.totalItems = data.count;console.log(data);
			});
		};
		$scope.init();

		Restful.get('api/Manufacturers').success(function(data){
			$scope.manufacturers = data;
		});

		Restful.get('api/Session/Customer').success(function(data){
			$scope.user = data.elements[0];
		});

		Restful.get('api/Category').success(function(data){
			$('#category').html(data.html);
		});

		$scope.disabled = true;

		$scope.edit = function(params){
			$scope.products = params;
			$('#product-popup').modal('show');

		};

		$scope.save = function(){
			var category_id = $( "#entryCategories option:selected" ).val();
			$scope.disabled = false;
			// set object to save into product
			var params ={
				product_detail: [{
					products_name: $scope.title,
					products_description: $scope.description
				}],
				categories: [{
					categories_id: category_id
				}],
				product: [{
					location_id: $scope.account.customers_location,
					manufacturers_id: $scope.manufacturer.id,
					products_image:	$scope.image,
					products_image_thumbnail: $scope.image_thumbnail,
					products_price: $scope.price,
				}],
				contact_person: [{
					contact_name: $scope.user.user_name,
					contact_phone: $scope.user.customers_telephone,
					contact_address: $scope.user.customers_address,
					contact_location: $scope.user.customers_location,
					contact_email: $scope.user.customers_email_address
				}],
				products_image: [
					{
						image: $scope.image1,
						image_thumbnail: $scope.imageThumbnail1
					},
					{
						image: $scope.image2,
						image_thumbnail: $scope.imageThumbnail2
					},
					{
						image: $scope.image3,
						image_thumbnail: $scope.imageThumbnail3
					},
					{
						image: $scope.image4,
						image_thumbnail: $scope.imageThumbnail4
					},
					{
						image: $scope.image5,
						image_thumbnail: $scope.imageThumbnail5
					},
					{
						image: $scope.image6,
						image_thumbnail: $scope.imageThumbnail6
					},
					{
						image: $scope.image7,
						image_thumbnail: $scope.imageThumbnail7
					},
					{
						image: $scope.image8,
						image_thumbnail: $scope.imageThumbnail8
					}
				]
			};
			console.log(params);
			Restful.save('api/Session/User/ProductPost', params).success(function(data){
				console.log(data);
				$scope.disabled = true;
				$('#product-popup').modal('hide');
				$.notify({
					title: '<strong>Success: </strong>',
					message: 'Save Success.'
				},{
					type: 'success'
				});
			});
			return;
			Restful.put(url, params).success(function(data){
				$.notify({
					title: '<strong>Success: </strong>',
					message: 'Update Success.'
				},{
					type: 'success'
				});
			});
		};

		$scope.remove = function(id, $index){
			console.log(id);
			if (confirm('Are you sure you want to delete this product?')) {
				$.notify({
					title: '<strong>Success: </strong>',
					message: 'Delete Success.'
				},{
					type: 'success'
				});
				$scope.products_post.elements.splice($index, 1);
			}
		};

		//functionality upload
		$scope.uploadPic = function(file, type) {
			if (file) {console.log(type);
				file.upload = Upload.upload({
					url: 'api/UploadImage',
					data: {file: file, username: $scope.username},
				});
				file.upload.then(function (response) {
					$timeout(function () {
						file.result = response.data;
						if(type == 'main_image'){
							$scope.image = response.data.image;
							$scope.image_thumbnail = response.data.image_thumbnail;
						}else{
							for(var i; i >= type; i++){
								console.log(type);
							}
						}

					});
				}, function (response) {
					if (response.status > 0)
						$scope.errorMsg = response.status + ': ' + response.data;
				}, function (evt) {
					// Math.min is to fix IE which reports 200% sometimes
					file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
				});
			}
		};

		/**
		 * start functionality pagination
		 */
		var params = {};
		$scope.currentPage = 1;
		//get another portions of data on page changed
		$scope.pageChanged = function() {
			$scope.pageSize = 10 * ( $scope.currentPage - 1 );
			params.start = $scope.pageSize;
			$scope.init(params);
		};
	}
]);