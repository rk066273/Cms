<?php

if(isset($_POST['createpost'])){

     //print_r($_POST);
    // die();
    
    
    $post_category_id =$_POST['post_category_id'];
    $post_title =$_POST['title'];
     $post_author=$_POST['post_author'];
    //$post_status =$_POST['post_status'];
    $post_user =$_POST['post_user'];
    $post_date =date('d-m-y');
    $post_image = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $post_content =$_POST['post_content'];
    $post_tags =$_POST['post_tags'];
    

    $folder = "../images/".$post_image;

    if (move_uploaded_file($tempname, $folder))  {
      $msg = "Image uploaded successfully";
  }else{
      $msg = "Failed to upload image";
}

  $result = mysqli_query($conn, "SELECT * FROM image");

    
   
   $query = "INSERT INTO posts (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_user`, `post_date`, `post_image`, `post_content`, `post_tags`,`post_status`)";
   $query .= "VALUES (NULL, '{$post_category_id}', '{$post_title}', '{$post_author}', NULL ,now(),'{$post_image}','{$post_content}','{$post_tags}', NULL)";
    //print_r(
    //die();
   $create_post_query= mysqli_query($conn,$query);

  }

?>

<form action="" method="POST" enctype="multipart/form-data">
<div class="form-group">
<label for="title">Post Title</label>
<input type="text" class="form-control" name="title">
</div>


<div class="form-group">
<select name ="post_category_id" id="">

<?php


                         $query= "SELECT * FROM  Categories";
                        $select_category_editing= mysqli_query($conn,$query);

                         while($row= mysqli_fetch_assoc($select_category_editing))
                        {
                         $cat_id = $row['cat_id'];
                          $cat_title = $row['cat_title'];

                          echo "<option value='$cat_id'>{$cat_title}</option>";
                         
                        }


?>


</select>
</div>

<div class="form-group">
<label for="post_author">Post Author</label>
<input type="text" class="form-control" name="post_author">
</div>

<div class="form-group">
<label for="post_author">Post User</label>
<input type="text" class="form-control" name="post_user">
</div>

<div class="form-group">
<label for="post_image">Post Image</label>
<input type="file"  name="uploadfile">
</div>

<div class="form-group">
<label for="post_content">Post Content</label>
<textarea class="form-control" name="post_content" id="" cols="30" row="10"></textarea>
</div>


<div class="form-group">
<label for="post_tags">Post Tags</label>
<input type="text" class="form-control" name="post_tags">
</div>

<div class="form-group">
<label for="post_staus">Post Status</label>
<input type="text" class="form-control" name="post_status">
</div>

<div class="form-group">
<input class= "btn btn-primary"  type="submit"  name="createpost" value ="publish post">
</div>

</form>