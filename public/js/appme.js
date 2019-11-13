var app = angular.module('appme', ["ngTable","angularjs-dropdown-multiselect",'ngMaterial'] ,function($interpolateProvider) {
	$interpolateProvider.startSymbol('{%');
	$interpolateProvider.endSymbol('%}');
});

app.controller('colorController',['$scope','$http','NgTableParams','$mdToast', function colorController($scope,$http,NgTableParams,$mdToast){
	
	this.$onInit = function() {
		$scope.datas= [];
		$http.get('admin/color_information').then((req) => {
			$scope.datas = req.data;
			$scope.colors = new NgTableParams({}, { dataset: $scope.datas});
		});	
	}
	$scope.reset = ()=>{
		$scope.tenLoaiDanhMuc='';
	}
	$scope.newColor = ()=>{
		$scope.datas.unshift({color:'',id: 'NULL',new:false});
		$scope.colors = new NgTableParams({}, { dataset: $scope.datas});
	}
	$scope.change = (data)=>{
		if(data.new == false) {
			 $http.post('admin/color',{
				_token: $scope.csrf,
				color: data.color
			},{header : {'Content-Type' : 'application/json; charset=UTF-8'}})
			.then( (req) => {
				$mdToast.show(
			        $mdToast.simple()
			        .textContent('Đã thêm')
			        .position('top right')
		        	.hideDelay(3000)
		        )
				console.log(req.data);
				if( req.data ){
					data.id = req.data.id;
				}
			})
			data.new = true;

			
		}else{
			if(!data.show){
				// console.log(data.id);
				$http.post('admin/color_edit',{
					_token: $scope.csrf,
					id: data.id,
					color: data.color
				}).then((req)=>{
					data.color = req.data.color;
				})
				$mdToast.show(
		        $mdToast.simple()
		        .textContent('Đã thay đổi')
		        .position('top right')
		        .hideDelay(3000))
			}
			data.show = !data.show;
			
		}
		
	}
	$scope.delete = (data)=>{
		var index = $scope.datas.indexOf(data);
		if(index >= 0 ){
			$scope.datas.splice(index,1);
			$scope.colors = new NgTableParams({}, { dataset: $scope.datas});
			$http.post('admin/color_delete',{
				_token : $scope.csrf,
				id: data.id
			}).then((req)=>{
				$mdToast.show(
		        $mdToast.simple()
		        .textContent('Đã xóa')
		        .position('top right')
		        .hideDelay(3000))
				console.log(req);
			})
		}
	}
}])

app.controller('displayController',['$scope','$http','NgTableParams','$mdToast', function displayController($scope,$http,NgTableParams,$mdToast){
	this.$onInit = function() {
		$scope.datas= [];
		$http.get('admin/display_information').then((req) => {
			$scope.datas = req.data;
			$scope.displays = new NgTableParams({}, { dataset: $scope.datas});
		});
	}
	$scope.new = ()=>{
		$scope.datas.unshift({size:'',id: 'NULL',new:false});
		$scope.displays = new NgTableParams({}, { dataset: $scope.datas});
	}
	$scope.change = (data)=>{
		if(data.new == false) {
			 $http.post('admin/display',{
				_token: $scope.csrf,
				size: data.size
			},{header : {'Content-Type' : 'application/json; charset=UTF-8'}})
			.then( (req) => {
				$mdToast.show(
			        $mdToast.simple()
			        .textContent('Đã thêm')
			        .position('top right')
		        	.hideDelay(3000)
		        )
				console.log(req.data);
				if( req.data ){
					data.id = req.data.id;
				}
			})
			data.new = true;
		}else{
			if(!data.show){
				// console.log(data.id);
				$http.post('admin/display_edit',{
					_token: $scope.csrf,
					id: data.id,
					size: data.size
				}).then((req)=>{
					$mdToast.show(
			        $mdToast.simple()
			        .textContent('Đã thay đổi')
			        .position('top right')
		        	.hideDelay(3000)
		        )
					data.color = req.data.color;
				})
			}
			data.show = !data.show;
		}
		
	}
	$scope.delete = (data)=>{
		var index = $scope.datas.indexOf(data);
		if(index >= 0 ){
			$scope.datas.splice(index,1);
			$scope.displays = new NgTableParams({}, { dataset: $scope.datas});
			$http.post('admin/display_delete',{
				_token : $scope.csrf,
				id: data.id
			}).then((req)=>{
				$mdToast.show(
			        $mdToast.simple()
			        .textContent('Đã xóa')
			        .position('top right')
		        	.hideDelay(3000)
		        )
				console.log(req);
			})
		}
	}
}])

app.controller('storageController',['$scope','$http','NgTableParams','$mdToast', function storageController($scope,$http,NgTableParams,$mdToast){
	this.$onInit = function() {
	$scope.datas= [];
	$http.get('admin/storage_information').then((req) => {
		$scope.datas = req.data;
		$scope.storages = new NgTableParams({}, { dataset: $scope.datas});
	});
	}
	$scope.new = ()=>{
		$scope.datas.unshift({size:'',id: 'NULL',new:false});
		$scope.storages = new NgTableParams({}, { dataset: $scope.datas});
	}
	$scope.change = (data)=>{
		if(data.new == false) {
			 $http.post('admin/storage',{
				_token: $scope.csrf,
				size: data.size
			},{header : {'Content-Type' : 'application/json; charset=UTF-8'}})
			.then( (req) => {
				console.log(req.data);
				if( req.data ){
					data.id = req.data.id;
				}
				$mdToast.show(
			        $mdToast.simple()
			        .textContent('Đã thêm')
			        .position('top right')
		        	.hideDelay(3000)
		        )
			})
			data.new = true;
		}else{
			if(!data.show){
				// console.log(data.id);
				$http.post('admin/storage_edit',{
					_token: $scope.csrf,
					id: data.id,
					size: data.size
				}).then((req)=>{
					$mdToast.show(
			        $mdToast.simple()
			        .textContent('Đã thay đổi')
			        .position('top right')
		        	.hideDelay(3000)
		        )
					data.color = req.data.color;
				})
			}
			data.show = !data.show;
		}
		
	}
	$scope.delete = (data)=>{
		var index = $scope.datas.indexOf(data);
		if(index >= 0 ){
			$scope.datas.splice(index,1);
			$scope.storages = new NgTableParams({}, { dataset: $scope.datas});
			$http.post('admin/storage_delete',{
				_token : $scope.csrf,
				id: data.id
			}).then((req)=>{
				$mdToast.show(
			        $mdToast.simple()
			        .textContent('Đã xóa')
			        .position('top right')
		        	.hideDelay(3000)
		        )
				console.log(req);
			})
		}
	}
}])

app.controller('operatingSystemController',['$scope','$http','NgTableParams','$mdToast', function operatingSystemController($scope,$http,NgTableParams,$mdToast){
	this.$onInit = function() {
	$scope.datas= [];
	$http.get('admin/opoperating_systems_information').then((req) => {
		$scope.datas = req.data;
		$scope.op = new NgTableParams({}, { dataset: $scope.datas});
	});
	}
	$scope.new = ()=>{
		$scope.datas.unshift({name:'',id: 'NULL',new:false});
		$scope.op = new NgTableParams({}, { dataset: $scope.datas});
	}
	$scope.change = (data)=>{
		if(data.new == false) {
			 $http.post('admin/opoperating_systems',{
				_token: $scope.csrf,
				name: data.name
			},{header : {'Content-Type' : 'application/json; charset=UTF-8'}})
			.then( (req) => {
				console.log(req.data);
				if( req.data ){
					data.id = req.data.id;
				}
				$mdToast.show(
			        $mdToast.simple()
			        .textContent('Đã thêm')
			        .position('top right')
		        	.hideDelay(3000)
		        )
			})
			data.new = true;
		}else{
			if(!data.show){
				// console.log(data.id);
				$http.post('admin/opoperating_systems_edit',{
					_token: $scope.csrf,
					id: data.id,
					name: data.name
				}).then((req)=>{
					$mdToast.show(
			        $mdToast.simple()
			        .textContent('Đã thay đổi')
			        .position('top right')
		        	.hideDelay(3000)
		        )
					data.color = req.data.color;
				})
			}
			data.show = !data.show;
		}
		
	}
	$scope.delete = (data)=>{
		var index = $scope.datas.indexOf(data);
		if(index >= 0 ){
			$scope.datas.splice(index,1);
			$scope.op = new NgTableParams({}, { dataset: $scope.datas});
			$http.post('admin/opoperating_systems_delete',{
				_token : $scope.csrf,
				id: data.id
			}).then((req)=>{
				$mdToast.show(
			        $mdToast.simple()
			        .textContent('Đã xóa')
			        .position('top right')
		        	.hideDelay(3000)
		        )
				console.log(req);
			})
		}
	}
}])

app.controller('brandController',['$scope','$http','NgTableParams','$mdToast', function brandController($scope,$http,NgTableParams,$mdToast){
	this.$onInit = function() {
	$scope.datas= [];
	$http.get('admin/brand_information').then((req) => {
		$scope.datas = req.data;
		$scope.brand = new NgTableParams({}, { dataset: $scope.datas});
	});
	}
	$scope.new = ()=>{
		$scope.datas.unshift({name:'',id: 'NULL',product: '0',new:false});
		$scope.brand = new NgTableParams({}, { dataset: $scope.datas});
	}
	$scope.change = (data)=>{
		if(data.new == false) {
			 $http.post('admin/brand',{
				_token: $scope.csrf,
				name: data.name
			},{header : {'Content-Type' : 'application/json; charset=UTF-8'}})
			.then( (req) => {
				console.log(req.data);
				if( req.data ){
					data.id = req.data.id;
				}
				$mdToast.show(
			        $mdToast.simple()
			        .textContent('Đã thêm')
			        .position('top right')
		        	.hideDelay(3000)
		        )
			})
			data.new = true;
		}else{
			if(!data.show){
				// console.log(data.id);
				$http.post('admin/brand_edit',{
					_token: $scope.csrf,
					id: data.id,
					name: data.name
				}).then((req)=>{
					$mdToast.show(
				        $mdToast.simple()
				        .textContent('Đã thay đổi')
				        .position('top right')
			        	.hideDelay(3000)
			        )
					data.color = req.data.color;
				})
			}
			data.show = !data.show;
		}
		
	}
	$scope.delete = (data)=>{
		var index = $scope.datas.indexOf(data);
		if(index >= 0 ){
			$scope.datas.splice(index,1);
			$scope.brand = new NgTableParams({}, { dataset: $scope.datas});
			$http.post('admin/brand_delete',{
				_token : $scope.csrf,
				id: data.id
			}).then((req)=>{
				$mdToast.show(
			        $mdToast.simple()
			        .textContent('Đã xóa')
			        .position('top right')
		        	.hideDelay(3000)
		        )
				console.log(req);
			})
		}
	}
}])

app.controller('productController',['$scope','$http','NgTableParams','$mdToast', function productController($scope,$http,NgTableParams,$mdToast){
	var formData = new FormData();
	this.$onInit = function() {
		$scope.datas= [];
		$http.get('admin/product_information').then((req) => {
			$scope.datas = req.data;
	    	$scope.product = new NgTableParams({}, { dataset: $scope.datas});
			console.log($scope.datas);
		});
		$http.get('admin/color_information').then((req) => {
			req.data.map( color => {
				color.label = color.color;
			})
			$scope.colors = req.data;
			// console.log($scope.colors);
		});

		$http.get('admin/display_information').then((req) => {
			$scope.displays = req.data;
		});

		$http.get('admin/brand_information').then((req) => {
			$scope.brands = req.data;
		});

		$http.get('admin/opoperating_systems_information').then((req) => {
			$scope.ops = req.data;
		});

		$http.get('admin/storage_information').then((req) => {
			$scope.storages = req.data;
		});
		$scope.name = '';
		$scope.price = 0;
		$scope.sale = 0;
		$scope.quantity = 0;

		$scope.color = []; 
		$scope.colorSetting = {};
	}

	
	$scope.new = ()=>{
		if(!($scope.name && $scope.color && $scope.brand && $scope.display && $scope.storage)){
			return;
		}
		var colorArray = [];
		$scope.color.map(color => {
			// formData.append('colors[]', color.id);
			colorArray.push(color.id);
		})
		// console.log(colorArray);
		formData.append('_token',$scope.csrf);
		formData.append('name',$scope.name);
		formData.append('colors',colorArray);
		formData.append('display_id',$scope.display.id);
		formData.append('storage_id',$scope.storage.id);
		formData.append('brand_id',$scope.brand.id);
		formData.append('op_id',$scope.op.id);
		formData.append('price',$scope.price);
		formData.append('sale',$scope.sale);
		formData.append('quantity',$scope.quantity);
		formData.append('description',$scope.description);
		var request = {
	        method: 'POST',
	        url: '/admin/product',
	        data: formData,
	        headers: {
	            'Content-Type': undefined
	        }
	    };
	    $http(request).then( function success(res){
	    	formData = new FormData();
	    	$scope.name = '';
	    	$scope.price = 0;
			$scope.sale = 0;
			$scope.quantity = 0;
	    	// $scope.color = [];
	    	// $scope.display = {};
	    	// $scope.storage = {};
	    	// $scope.brand = {};
	    	// $scope.op = {};
	    	document.getElementsByClassName('imagefile').value = '';
	    	$scope.description = '';
	    	res.data.color_id = colorArray;
	    	$scope.datas.unshift(res.data);
	    	$scope.product = new NgTableParams({}, { dataset: $scope.datas});
	    	$mdToast.show(
			        $mdToast.simple()
			        .textContent('Đã thêm')
			        .position('top right')
		        	.hideDelay(3000)
		        )
	    });
		// $scope.datas.unshift({name:'',id: 'NULL',product: '0',new:false});
		// $scope.brand = new NgTableParams({}, { dataset: $scope.datas});
	}

	$scope.change = (data)=>{
			if(!data.show){
				formData.append('_token',$scope.csrf);
				if(data.brand_sl){
					formData.append('brand_id',data.brand_sl.id);
				}
				if(data.display_sl){
					formData.append('display_id',data.display_sl.id);
				}
				if(data.storage_sl){
					formData.append('storage_id',data.storage_sl.id);
				}
				if(data.operating_system_sl){
					formData.append('op_id',data.operating_system_sl.id);
				}

				var colorArray = [];
				data.color_sl.map(color => {
					// formData.append('colors[]', color.id);
					colorArray.push(color.id);
				});
				formData.append('colors',colorArray);

				formData.append('price',data.price);
				formData.append('sale',data.sale);
				formData.append('quantity',data.quantity);
				formData.append('description',data.description);
				formData.append('name',data.name);
				formData.append('id',data.id);

				var request = {
			        method: 'POST',
			        url: '/admin/product_edit',
			        data: formData,
			        headers: {
			            'Content-Type': undefined
			        }
			    };
			    $http(request).then( function success(res){
			    	formData = new FormData();
	    			document.getElementsByClassName('imagefile').value = '';
			    	data.colors = res.data.colors;
			    	data.links = res.data.links;
			    	console.log(data);
			    	console.log(res.data);
			    	$mdToast.show(
				        $mdToast.simple()
				        .textContent('Đã thay đổi')
				        .position('top right')
			        	.hideDelay(3000)
			        )
			    });
				// console.log(data.id);
				// $http.post('admin/product_edit',{
				// 	_token: $scope.csrf,
				// 	id: data.id,
				// 	name: data.name
				// }).then((req)=>{
				// 	data.color = req.data.color;
				// })
			}
			data.show = !data.show;
	}
	$scope.delete = (data)=>{
		var index = $scope.datas.indexOf(data);
		console.log(index);
		if(index >= 0 ){
			$scope.datas.splice(index,1);
			$scope.product = new NgTableParams({}, { dataset: $scope.datas});
			$http.post('admin/product_delete',{
				_token : $scope.csrf,
				id: data.id
			}).then((req)=>{
				$mdToast.show(
			        $mdToast.simple()
			        .textContent('Đã xóa')
			        .position('top right')
		        	.hideDelay(3000)
		        )
				console.log(req);
			})
		}
	}
	$scope.setTheFiles = function ($files) {
        angular.forEach($files, function (value, key) {
            formData.append('imagefile[]', value);
        });
    };
}]);

app.controller('orderController',['$scope','$http','NgTableParams','$mdToast', function orderController($scope,$http,NgTableParams,$mdToast){
	this.$onInit = function() {
	$scope.datas= [];
	$http.get('admin/order_information').then((req) => {
		$scope.datas = req.data;
		$scope.order = new NgTableParams({}, { dataset: $scope.datas});
	});
	}
}])

app.controller('orderdetailController',['$scope','$http','NgTableParams','$mdToast', function orderdetailController($scope,$http,NgTableParams,$mdToast){
	this.$onInit = function() {
	$scope.datas= [];
	$http.get('admin/orderdetail_information').then((req) => {
		$scope.datas = req.data;
		$scope.orderdetail = new NgTableParams({}, { dataset: $scope.datas});
	});
	}
}])

app.controller('userController',['$scope','$http','NgTableParams','$mdToast', function userController($scope,$http,NgTableParams,$mdToast){
	this.$onInit = function() {
	$scope.datas= [];
	$http.get('admin/user_information').then((req) => {
		$scope.datas = req.data;
		$scope.user = new NgTableParams({}, { dataset: $scope.datas});
	});
	}
	// $scope.new = ()=>{
	// 	$scope.datas.unshift({name:'',id: 'NULL',product: '0',new:false});
	// 	$scope.user = new NgTableParams({}, { dataset: $scope.datas});
	// }
	$scope.change = (data)=>{
		if(!data.show){
			// console.log(data.id);
			$http.post('admin/user_edit',{
				_token: $scope.csrf,
				id: data.id,
				level: data.level_sl
			}).then((req)=>{
				data.level = req.data;
				console.log(req.data,data);
				$mdToast.show(
			        $mdToast.simple()
			        .textContent('Đã thay đổi')
			        .position('top right')
		        	.hideDelay(3000)
		        )
			})
		}
		data.show = !data.show;
	}
	$scope.delete = (data)=>{
		var index = $scope.datas.indexOf(data);
		if(index >= 0 ){
			$scope.datas.splice(index,1);
			$scope.user = new NgTableParams({}, { dataset: $scope.datas});
			$http.post('admin/user_delete',{
				_token : $scope.csrf,
				id: data.id
			}).then((req)=>{
				console.log(req);
			})
		}
	}
}])

app.controller('commentController',['$scope','$http','NgTableParams','$mdToast', function commentController($scope,$http,NgTableParams,$mdToast){
	this.$onInit = function() {
	$scope.datas= [];
	$http.get('admin/comment_information').then((req) => {
		$scope.datas = req.data;
		$scope.comment = new NgTableParams({}, { dataset: $scope.datas});
	});
	}
	// $scope.new = ()=>{
	// 	$scope.datas.unshift({name:'',id: 'NULL',new:false});
	// 	$scope.comment = new NgTableParams({}, { dataset: $scope.datas});
	// }
	// $scope.change = (data)=>{
	// 	if(data.new == false) {
	// 		 $http.post('admin/opoperating_systems',{
	// 			_token: $scope.csrf,
	// 			name: data.name
	// 		},{header : {'Content-Type' : 'application/json; charset=UTF-8'}})
	// 		.then( (req) => {
	// 			console.log(req.data);
	// 			if( req.data ){
	// 				data.id = req.data.id;
	// 			}
	// 		})
	// 		data.new = true;
	// 	}else{
	// 		if(!data.show){
	// 			// console.log(data.id);
	// 			$http.post('admin/opoperating_systems_edit',{
	// 				_token: $scope.csrf,
	// 				id: data.id,
	// 				name: data.name
	// 			}).then((req)=>{
	// 				data.color = req.data.color;
	// 			})
	// 		}
	// 		data.show = !data.show;
	// 	}
		
	// }
	$scope.delete = (data)=>{
		var index = $scope.datas.indexOf(data);
		if(index >= 0 ){
			$scope.datas.splice(index,1);
			$scope.comment = new NgTableParams({}, { dataset: $scope.datas});
			$http.post('admin/comment_delete',{
				_token : $scope.csrf,
				id: data.id
			}).then((req)=>{
				$mdToast.show(
			        $mdToast.simple()
			        .textContent('Đã xóa')
			        .position('top right')
		        	.hideDelay(3000)
		        )
				console.log(req);
			})
		}
	}
}])


app.controller('imageController',['$scope','$http','NgTableParams','$mdToast', function imageController($scope,$http,NgTableParams,$mdToast){
	this.$onInit = function() {
	$scope.datas= [];
	$http.get('admin/image_information').then((req) => {
		$scope.datas = req.data;
		$scope.brand = new NgTableParams({}, { dataset: $scope.datas});
	});
	}
	$scope.new = ()=>{
		$scope.datas.unshift({name:'',id: 'NULL',product: '0',new:false});
		$scope.brand = new NgTableParams({}, { dataset: $scope.datas});
	}
	$scope.change = (data)=>{
		if(data.new == false) {
			 $http.post('admin/image',{
				_token: $scope.csrf,
				name: data.name
			},{header : {'Content-Type' : 'application/json; charset=UTF-8'}})
			.then( (req) => {
				console.log(req.data);
				if( req.data ){
					data.id = req.data.id;
				}
			})
			data.new = true;
		}else{
			if(!data.show){
				// console.log(data.id);
				$http.post('admin/image_edit',{
					_token: $scope.csrf,
					id: data.id,
					name: data.name
				}).then((req)=>{
					data.color = req.data.color;
				})
			}
			data.show = !data.show;
		}
		
	}
	$scope.delete = (data)=>{
		var index = $scope.datas.indexOf(data);
		if(index >= 0 ){
			$scope.datas.splice(index,1);
			$scope.brand = new NgTableParams({}, { dataset: $scope.datas});
			$http.post('admin/image_delete',{
				_token : $scope.csrf,
				id: data.id
			}).then((req)=>{
				console.log(req);
			})
		}
	}
}])

app.controller('exController',['$scope','$http','NgTableParams','$mdToast', function exController($scope,$http,NgTableParams,$mdToast){
	var formData = new FormData();
	this.$onInit = function() {
		$scope.datas= [];
		$http.get('admin/ex_information').then((req) => {
			$scope.datas = req.data;
			$scope.ex = new NgTableParams({}, { dataset: $scope.datas});
		});
	}
	$scope.new = ()=>{
		if( !($scope.text && $scope.type && $scope.link) ){
			return;
		}
		// console.log(colorArray);
		formData.append('_token',$scope.csrf);
		formData.append('text',$scope.text);
		formData.append('type',$scope.type);
		formData.append('link',$scope.link);
		var request = {
	        method: 'POST',
	        url: '/admin/ex',
	        data: formData,
	        headers: {
	            'Content-Type': undefined
	        }
	    };
	    $http(request).then( function success(res){
	    	formData = new FormData();
	    	$scope.text = '';
	    	$scope.type = '';
	    	$scope.link = '';
	    	document.getElementsByClassName('imagefile').value = '';
	    	$scope.datas.unshift(res.data);
	    	$scope.ex = new NgTableParams({}, { dataset: $scope.datas});
	    	$mdToast.show(
			        $mdToast.simple()
			        .textContent('Đã thêm')
			        .position('top right')
		        	.hideDelay(3000)
		        )
	    });
		// $scope.datas.unshift({name:'',id: 'NULL',product: '0',new:false});
		// $scope.brand = new NgTableParams({}, { dataset: $scope.datas});
	}

	$scope.change = (data)=>{
			if(!data.show){
				formData.append('_token',$scope.csrf);
				formData.append('text',data.text);
				formData.append('type',data.type);
				formData.append('link',data.link);
				formData.append('id',data.id);

				var request = {
			        method: 'POST',
			        url: '/admin/ex_edit',
			        data: formData,
			        headers: {
			            'Content-Type': undefined
			        }
			    };
			    $http(request).then( function success(res){
			    	formData = new FormData();
			    	data.image = res.data.image;
	    			document.getElementsByClassName('imagefile').value = '';
	    			$mdToast.show(
			        $mdToast.simple()
			        .textContent('Đã thay đổi')
			        .position('top right')
		        	.hideDelay(3000)
		        )
			    });
			}
			data.show = !data.show;
	}
	$scope.delete = (data)=>{
		var index = $scope.datas.indexOf(data);
		console.log(index);
		if(index >= 0 ){
			$scope.datas.splice(index,1);
			$scope.ex = new NgTableParams({}, { dataset: $scope.datas});
			$http.post('admin/ex_delete',{
				_token : $scope.csrf,
				id: data.id
			}).then((req)=>{
				$mdToast.show(
			        $mdToast.simple()
			        .textContent('Đã xóa')
			        .position('top right')
		        	.hideDelay(3000)
		        )
				console.log(req);
			})
		}
	}
	$scope.setTheFiles = function ($files) {
        angular.forEach($files, function (value, key) {
            formData.append('imagefile', value);
        });
    };
}])

app.directive('ngFiles', ['$parse', function ($parse) {
    function file_links(scope, element, attrs) {
        var onChange = $parse(attrs.ngFiles);
        element.on('change', function (event) {
            onChange(scope, {$files: event.target.files});
        });
    }
    return {
        link: file_links
    }
}]);