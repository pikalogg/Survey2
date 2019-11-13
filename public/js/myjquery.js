$(document).ready(function() {
    $('.add-to-cart-btn').click(function(event) {
    	/* Act on the event */
    	// console.log($(this).next().val());
    	var id = $(this).next().val();
    	var qty = $('#qtytotal').text();
    	qty = parseInt(qty);
    	$('#qtytotal').text(qty +1);
    	$.ajax({
    		url: '/add-to-card',
    		dataType: 'json',
    		data: {
    				id: id
    			},
    	})
    	.success(function(data){
    		console.log(id);
            swal('', "Đã thêm", "success");
    		$('#totall').text(data.total);
    	})
    	.always(function() {
    		console.log("complete");
    	});
    	
    });

    $('.delete').click(function(event) {
    	/* Act on the event */
    	var de = $(this).next().val();
    	$.ajax({
    		url: 'delete-cart',
    		dataType: 'json',
    		data: {rowId: de},
    	})
    	.success(function(data){
    		$('#qtytotal').text(data.count);
    		$('#totall').text(data.total);
            swal('', "Đã xóa", "success");
    		console.log(data);
    	})
    	.always(function() {
    		console.log("complete");
    	});
    	
    	$(this).parent().remove();
    });
})