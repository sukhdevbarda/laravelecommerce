$(document).ready(function(){

$("#category").on('change',function(){
var cat_id = $(this).find('option:selected').val();
alert(cat_id);
ajax({
	method:'post',
	action:'prodcuts/subcategories',
	data:{cat_id:cat_id}


}).done(function(response){
if(response.data.result==true){
	var options='<option value="">select Subcategory </option>';
	for (var i = 0; i <response.data.subCategories.length; i++) {
	
		options +='<options value='+ response.data.subCategories[i].id+'>'+response.data.subCategories[i].name+ '</option>'
	}
	$("#subcategory").html(options);
}

});

});

});
