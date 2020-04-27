$(function(){
	$(document).on('submit',function(e){
		e.preventDefault();
		var username=$('#username').val();
		var comment=$('#comment').val();
		$.ajax({
			url:'insert.php',
			type:'post',
			data:{
				insert:'insert',
				username:username,
				comment:comment
			},
			success:function(res){
				$('#username').val(null);
				$('#comment').val(null);
				fetch()
				$('#res').html(res);
			}
		})
	})

	//fetch comments
	function fetch(){
		$.ajax({
			url:'fetch.php',
			type:'post',
			data:{
				fetch:'fetch'
			},
			success:function(res){
				$('#box-comments').html(res)
			}
		})
	}fetch()

	//delete 
	$(document).on('click','.btn-delete',function(){
		var id = $(this).attr('getid');
		$.ajax({
			url:'delete.php',
			type:'post',
			data:{
				delete:'delete',
				id:id
			},
			success:function(res){
				fetch()
				$('#res').html(res);
			}
		})
	})
	//edit
	$(document).on('click','.btn-edit',function(){
		var id = $(this).attr('getid');
		$.ajax({
			url:'edit.php',
			type:'post',
			data:{
				edit:'edit',
				id:id
			},
			success:function(res){
				$('#res').html(res);
			}
		})
	})

	//update 
	$(document).on('click','.btn-update',function(){
		var id = $(this).attr('getid');
		var comm=$('#comm-update').val();
		$.ajax({
			url:'edit.php',
			type:'post',
			data:{
				update:'update',
				id:id,
				comm:comm
			},
			success:function(res){
				fetch()
				$('#res').html(res);
			}
		})
	})
})