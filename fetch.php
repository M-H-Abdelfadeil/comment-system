<?php
include 'connDB.php';
if (isset($_POST['fetch'])) {
	$query=$conn->prepare("SELECT * FROM comments");
	$query->execute();
	$rows=$query->fetchAll(PDO::FETCH_ASSOC);
	if ($query->rowCount()==0) {
		echo '<div class="text-light">No Comment</div>';
	}else{
		foreach ($rows as $row) {
			echo '
			<div class="bg-light p-3 rounded mt-3">
	            <h5>'.$row['username'].'</h5>
	            <div>'.$row['comment'].'</div>
	            <div class="d-flex flex-row-reverse ">
	              <button getid="'.$row['id'].'" class="btn btn-danger btn-delete">Delete</button>
	              <button getid="'.$row['id'].'" class="btn btn-primary mr-2 btn-edit">Edit</button>
	            </div>
	          </div>
			';
		}

	}
	
}