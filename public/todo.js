var refreshTodoList=function(){

	$.ajax({
			url:"getAllTodos",
			type:"post",
			success:function(data)
			{
				
			
				var obj=JSON.parse(data);

				//$('#add_task').html('');


				$(obj).each(function(index,data){
					console.log($('.panel-heading_'+data.id).length  +" asadf "+data.id);
					if($('.panel-heading_'+data.id).length==0){
							var html='<div class="panel-heading panel-heading_'+data.id+'" style="display:none" data-attr-id="'+data.id+' > \
								<div class="pannel-listing">\
									<h4>\
											'+data.title+'\
									</h4>\
									<a href="#" class="delete_title" data-id="'+data.id+'"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>\
									<div class="clear"></div>	\
								</div>	\
							</div>';
							$('#add_task').append(html);
							$('.panel-heading_'+data.id).show('slow');
					}
					
				})
				bindLoadEvents();
			},
			// done:function(data){
			//  	$(".add_task").append(data);
			// }

		});


}

var bindLoadEvents=function(){

	$(".delete_title").unbind('click').on("click",function(e)
	{
		var confirmation=confirm("Are you sure you want to delete?");
		if(confirmation){

			e.preventDefault();
			var self=$(this).parents('.panel-heading');
			$.ajax({
				url:"delete/"+$(this).data("id"),
				type:"get",
				success:function(data) 
				{
					obj=JSON.parse(data);
					
				    if(obj.status=="ok")
				   	{
				      self.hide('slow', function()
				      				{
				      					 self.remove();
				      				});
				      $('.message_success').remove();
				     $('#add_task').before('<span class="message_success">'+obj.message+'</span>')
				    }
				}
			});
		}
		
	});

	$(".panel-heading").dblclick(function(e)
	{	
		if($(this).find('.pannel_edit_div').length){
			$(this).find('.pannel_edit_div').remove();
		}
		
		$(this).find('h4').hide();
		var currentText=$(this).find('h4').text();
		$(this).find('h4').after("<div style='width:80%;float:left' class='pannel_edit_div'><input value='"+$.trim(currentText)+"' type='text' class='pannel_edit form-control'></div>");
		$('.pannel_edit').unbind('change').on('change',function(){
			var updatedData=$(this).val();
			var updateID=$(this).parents('.panel-heading').attr('data-attr-id');
			console.log("tochange "+updatedData);
			console.log("id "+updateID);

		})
	});	
}

$(document).ready(function()
{
	$(".add_form").on("submit",function(e)
	{	
		e.preventDefault();
		var post={};
		post.title=$("[name='title']").val();
		$.ajax({
			url:"add",
			type:"post",
			data:post,
			success:function(data)
			{
				
				console.log("success");
				refreshTodoList();
			},
			// done:function(data){
			//  	$(".add_task").append(data);
			// }

		});
		$(".add_form").trigger("reset");
	});

bindLoadEvents();


	$(".edit_form").on('submit',function(e)
		{
			e.preventDefault();
			var values={};
			values.title=$(".form-control").val();
			$.ajax({
				type:"post",
				data:values,
				url:"update/"+$(this).data('id'),
				success:function()
				{
					console.log("updated");
				}
			});
		});
});


