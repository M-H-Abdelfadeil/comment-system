<?php
include 'connDB.php';
if (isset($_POST['delete'])) {
	$id = filter_var($_POST['id'],FILTER_SANITIZE_STRING);
	if (is_numeric($id)) {
		$query=$conn->prepare("DELETE FROM comments WHERE id = '$id'");
		$query->execute();
		echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
			echo 'success';
		echo'  <button class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
		       </button>
		    </div>';
	}

}