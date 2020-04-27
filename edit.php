<?php
include 'connDB.php';
if (isset($_POST['edit'])) {
	$id = filter_var($_POST['id'],FILTER_SANITIZE_STRING);
	if (is_numeric($id)) {
		$query=$conn->prepare("SELECT * FROM comments WHERE id = '$id'");
		$query->execute();
		$row=$query->fetch(PDO::FETCH_ASSOC);
		echo '
			<div class="bg-light p-3 rounded mt-3">
				<div class="row">
					<input type="text" id="comm-update" value="'.$row['comment'].'" class="col-8">
	              	<button getid="'.$row['id'].'" class="btn col-3 ml-1 btn-primary mr-2 btn-update">Update</button>
				</div>
	            
	          </div>
			';
	}
}
if (isset($_POST['update'])) {
	$id = filter_var($_POST['id'],FILTER_SANITIZE_STRING);
	$comment=filter_var($_POST['comm'],FILTER_SANITIZE_STRING);
	$error=array();
	//validate comment
	if (empty($comment)||strlen($comment)>200||strlen($comment)<3) {
		$error[]="Comment must be 3 to 30 charset";
	}

	if (is_numeric($id) && empty($error)) {
		$query=$conn->prepare("UPDATE comments SET comment='$comment' WHERE id='$id'");
		$query->execute();
		echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
			echo 'success';
		echo'  <button class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
		       </button>
		    </div>';	
	}else{
		echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
			foreach ($error as $Msg) {
				
				echo $Msg . '<br>';
			}
		echo'  <button class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
		       </button>
		    </div>';
	}
}