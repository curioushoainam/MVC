function number_format( number, decimals, dec_point, thousands_sep ) {
    // http://kevin.vanzonneveld.net
    // + original by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
    // + improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // + bugfix by: Michael White (http://crestidg.com)
    // + bugfix by: Benjamin Lupton
    // + bugfix by: Allan Jensen (http://www.winternet.no)
    // + revised by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
    // * example 1: number_format(1234.5678, 2, '.', '');
    // * returns 1: 1234.57
                              
    var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
    var d = dec_point == undefined ? "," : dec_point;
    var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
    var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
                              
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}

// AJAX for pagination on shop page
$(document).ready(function(){
	// Go to top
	window.onscroll = function() {scrollFunction()};

	function scrollFunction() {
	    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
	        document.getElementById("gototop").style.display = "block";
	    } else {
	        document.getElementById("gototop").style.display = "none";
	    }
	}
	
	$("#gototop").click(function() {
	     $("html, body").animate({ scrollTop: 0 }, "slow");
	     return false;
	});
	//  -/- Go to top

	// how to use : toastr["bootstrap color"]("message","title")
	// toastr["success"]("load successfully","info")
	
	// pagination normally
	// $.ajax({
	// 	url: '/MVC/controller/shop_page_controller.php',
	// 	type : 'post',
	// 	dataType : 'text',
	// 	data :{
	// 		page: 1
	// 	},
	// 	success : function(response){
	// 		$('#contents').html(response);
	// 	},
	// 	error : function(jqXHR, textStatus, errorThrown){
	// 		$('#contents').html(data);
	// 	}
	// });

	// ===============================================
	// pagination with button "see more"
	$.ajax({
		url: '/MVC/controller/shop_page_controller.php',
		type : 'post',
		dataType : 'text',
		data :{
			pos: 0,
			limit: 8
		},
		success : function(response){
			data = JSON.parse(response);
			if(data.contents){
				$('#seemore').append(data.contents);
				$('#more').data('pos',data.pos);
			} else 
				_that.remove();
		},
		error : function(jqXHR, textStatus, errorThrown){
			$('#seemore').append(textStatus);
		},
		complete : function(){			
		}
	});	



});

$(document).on("click",".page", function(event){
	var _that = $(this);	
	event.preventDefault(); 
	$.ajax({
		url: '/MVC/controller/shop_page_controller.php',
		type : 'post',
		dataType : 'text',
		data :{
			page: _that.data('page')
		},
		success : function(response){
			$('#contents').html(response);
		},
		error : function(jqXHR, textStatus, errorThrown){
			$('#contents').html(data);
		},
		complete : function(){			
		}
	});
	return false; // for good measure
	
});

$(document).on("click","#more", function(event){
	var _that = $(this);
	$.ajax({
		url: '/MVC/controller/shop_page_controller.php',
		type : 'post',
		dataType : 'text',
		data :{
			pos: _that.data('pos'),
			limit: _that.data('limit')
		},
		success : function(response){
			data = JSON.parse(response);
			if(data.contents){
				$('#seemore').append(data.contents);
				_that.data('pos',data.pos);
			} else 
				_that.remove();
		},
		error : function(jqXHR, textStatus, errorThrown){
			$('#seemore').append(textStatus);
		},
		complete : function(){			
		}
	});	
});


// product detail section 
/* ============================================================================================== */
	$('.smallimage').mouseover(function(){
		$('#imglarge').attr('src', $(this).attr('src'));
	}); 

/* ============================================================================================== */
// function changeColor(key){
// 	document.getElementById('imgSmall1').src = '/First web project/admin/images/products/galaxy s8/' + key + '_1.jpg';
// 	document.getElementById('imgSmall2').src = '/First web project/admin/images/products/galaxy s8/' + key + '_2.jpg';
// 	document.getElementById('imgSmall3').src = '/First web project/admin/images/products/galaxy s8/' + key + '_3.jpg';
// 	document.getElementById('imgSmall4').src = '/First web project/admin/images/products/galaxy s8/' + key + '_4.jpg';
// 	document.getElementById('imgSmall5').src = '/First web project/admin/images/products/galaxy s8/' + key + '_5.jpg';
	
// 	document.getElementById('imgSmall1').name = key + '_1.jpg';
// 	document.getElementById('imgSmall2').name = key + '_2.jpg';
// 	document.getElementById('imgSmall3').name = key + '_3.jpg';
// 	document.getElementById('imgSmall4').name = key + '_4.jpg';
// 	document.getElementById('imgSmall5').name = key + '_5.jpg';
	
// 	document.getElementById('imglarge').src = '/First web project/admin/images/products/galaxy s8/' + key + '_1.jpg';
// }




$(document).on('click', '.addtocart', function(event){
	event.preventDefault();

	var _that = $(this);
	var prod_id = _that.data('prod_id');
	
	$.ajax({
		url : './controller/addtocart.php',
		dataType: 'text',
		type: 'post',
		data : {
			prod_id : prod_id
		},
		success : function(res){
			data = JSON.parse(res);
			if(data.state == 'ok'){
				toastr["success"]("Thêm vào giỏ hàng thành công","info");
				$('#countcart').html(data.soluong);
			} else {
				toastr["warning"]("Thêm không thành công","warning");
			}			
		},
		error : function(err){
			toastr["warning"]("Lỗi server","warning");
		}			
	});

	return false;
});

$(document).on('change', '.qty', function(){
	
	var _that = $(this);
	var prod_id = _that.data('prod_id');
	var soluong = _that.val();
	// alert(prod_id);alert(soluong);
	$.ajax({
		url : './controller/updatetocart.php',
		dataType: 'text',
		type: 'post',
		data : {
			prod_id : prod_id,
			soluong : soluong
		},
		success : function(res){
			data = JSON.parse(res);
			if(data.state == 'ok'){
				toastr["success"]("Cập nhật giỏ hàng thành công","info");
				$('#total1').html(number_format(data.total));
				$('#total2').html(number_format(data.total));
				$('#subtotal'+ data.prod_id).html(number_format(data.subtotal));
			} else {
				toastr["warning"]("Cập nhật giỏ hàng thất bại","warning");
			}			
		},
		error : function(err){
			toastr["warning"]("Lỗi server","warning");
		}			
	});
});

$(document).on('click', '.btn_delitem', function(){
	
	var _that = $(this);
	var prod_id = _that.data('prod_id');
	// alert(prod_id)

	$.ajax({
		url : './controller/deltocart.php',
		dataType: 'text',
		type: 'post',
		data : {
			prod_id : prod_id
		},
		success : function(res){
			data = JSON.parse(res);
			if(data.state == 'ok'){
				toastr["success"]("Xóa item thành công","info");
				$('#total1').html(number_format(data.total));
				$('#total2').html(number_format(data.total));
				$('#row'+ data.prod_id).remove();
			} else {
				toastr["warning"]("Xóa item thất bại","warning");
			}			
		},
		error : function(err){
			toastr["warning"]("Lỗi server","warning");
		}			
	});
});


// Checkout section 
// $(document).on('click','#btn_promocode', function(){
// 	if($('#pccheck').val() && $('#promocode').val())	
// 		var promocode = $('#promocode').val();
// 	// alert(prod_id)

// 	$.ajax({
// 		url : './controller/checkout.php',
// 		dataType: 'text',
// 		type: 'post',
// 		data : {
// 			promocode : promocode
// 		},
// 		success : function(res){
// 			data = JSON.parse(res);
// 			if(data.state == 'ok'){
// 				toastr["success"]("Promo code cập nhật thành công","info");				
// 			} else {
// 				toastr["warning"]("Promo code cập nhật thất bại","warning");
// 			}			
// 		},
// 		error : function(err){
// 			toastr["warning"]("Lỗi server","warning");
// 		}			
// 	});
// });