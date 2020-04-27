<?php
include 'connDB.php';
if (isset($_POST['insert'])) {
	$username=filter_var($_POST['username'],FILTER_SANITIZE_STRING);
	$comment=filter_var($_POST['comment'],FILTER_SANITIZE_STRING);
	$error=array();
	//validate username
	if (empty($username)||strlen($username)>30||strlen($username)<3) {
		$error[]="Username must be 3 to 30 charset";
	}
	//validate comment
	if (empty($comment)||strlen($comment)>200||strlen($comment)<3) {
		$error[]="Comment must be 3 to 30 charset";
	}

	if (!empty($error)) {
		echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
			foreach ($error as $Msg) {
				
				echo $Msg . '<br>';
			}
		echo'  <button class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
		       </button>
		    </div>';
	}else{
		$query=$conn->prepare("INSERT INTO comments (username,comment) VALUES('$username','$comment')");
		$query->execute();
		echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
			echo 'success';
		echo'  <button class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
		       </button>
		    </div>';
	}
}