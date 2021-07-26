<?php

if(isset($_POST['createuser'])){

     //print_r($_POST);
    // die();
    
    
    $username =$_POST['username'];
    // $post_title =$_POST['title'];
    //  $post_author=$_POST['post_author'];
    // //$post_status =$_POST['post_status'];
    // $post_user =$_POST['post_user'];
    // $post_date =date('d-m-y');
    // $post_image = $_FILES["uploadfile"]["name"];
    // $tempname = $_FILES["uploadfile"]["tmp_name"];
    // $post_content =$_POST['post_content'];
    // $post_tags =$_POST['post_tags'];
    

//     $folder = "../images/".$post_image;

//     if (move_uploaded_file($tempname, $folder))  {
//       $msg = "Image uploaded successfully";
//   }else{
//       $msg = "Failed to upload image";
// }

//   $result = mysqli_query($conn, "SELECT * FROM image");
   
   $query = "INSERT INTO `users` (`username`)";
   $query .= "VALUES ('$username')";

  $create_post_query= mysqli_query($conn,$query);
   
  }

?>

<form action="" method="POST" enctype="multipart/form-data">
<div class="form-group">
<label for="username">Username</label>
<input type="text" class="form-control" name="username">
</div>


<div class="form-group">
<input class= "btn btn-primary"  type="submit"  name="createuser" value ="Add post">
</div>

</form>