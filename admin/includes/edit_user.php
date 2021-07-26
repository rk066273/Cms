<?php
                      if(isset($_GET['p_id']))
                      {
                      $Editing = $_GET['p_id'];
                      }
                      $query= "SELECT * FROM  posts WHERE post_id = $Editing ";
    
                       $select_posts_editing= mysqli_query($conn,$query);

                        while($row= mysqli_fetch_assoc($select_posts_editing))
                        {

                       $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_category_id =$row['post_category_id'];
                        $post_author = $row['post_author'];
                       $post_user = $row['post_user'];
                      $post_date = $row['post_date'];
                      $post_image = $row['post_image'];
                      $post_content = $row['post_content'];
                       $post_tags = $row['post_tags'];

                        }


                        if(isset($_POST['createpost']))
                      {
                          
                     //$post_createpost= $_POST['createpost'];

                       //$post_id = $_POST['post_id'];
                        $post_title = $_POST['title'];
                        $post_category_id = $_POST['post_category_id'];
                        $post_author = $_POST['post_author'];
                       $post_user = $_POST['post_user'];
                      //$post_date = $_POST['post_date'];
                       $post_image = $_FILES["post_image"]["name"];
                      $tempname = $_FILES["post_image"]["tmp_name"];
                       $post_content = $_POST['post_content'];
                       $post_tags = $_POST['post_tags'];

                      $folder = "../images/".$post_image;

   if(move_uploaded_file($tempname, $folder))  {
     $msg = "Image uploaded successfully";
  }else{
      $msg = "Failed to upload image";}
      if(empty($post_image))
      {
        $query =" SELECT * FROM posts WHERE post_id= $Editing ";
        $select_image= mysqli_query($conn,$query);

                        while($row= mysqli_fetch_assoc($select_image))
                        {

                     $post_image = $row['post_image'];
                        }

                        

                        }

      
//$result = mysqli_query($conn, "SELECT * FROM image");
//$query.= "post_image ='{$post_image}', ";

//$query= "UPDATE posts SET";
//$query .= "post_title ='{$post_title}', ";
//$query .= "post_category_id ='{$post_category_id}', ";
//$query .= "post_author ='{$post_author}', ";
//$query .= "post_user ='{$post_user}', ";
//$query .= "post_date = now(), ";
//$query .= "post_content ='{$post_content}', ";
//$query .= "post_tags ='{$post_tags}' ";
//$query .= " WHERE post_id = '{$Editing}' ";
//post_date= 'now()'

$query = "UPDATE posts SET post_title = '$post_title', post_category_id = '$post_category_id', post_author = '$post_author' , post_user = '$post_user', post_image= '$post_image', post_date = now(),  post_content = '$post_content',post_tags = '$post_tags'  WHERE post_id = $Editing ";

$select_posts_editin= mysqli_query($conn,$query);

if(!$select_posts_editin)

{
    die("query failed" . mysqli_error($conn));
}

                      

 }

?>
<form action="" method="POST" enctype="multipart/form-data">



<div class="form-group">
<label for="title">Post Title</label>
<input value= "<? echo $post_title; ?>" type="text" class="form-control" name="title">
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
<input  value= "<? echo $post_author; ?>"type="text" class="form-control" name="post_author">
</div>

<div class="form-group">
<label for="post_author">Post User</label>
<input value= "<? echo $post_user; ?>" type="text" class="form-control" name="post_user">
</div>

<div class="form-group">
<img width="100" src="../images/<?php  echo $post_image; ?>" alt="image">
<input type="file" name="post_image">
</div>

<div class="form-group">
<label for="post_content">Post Content</label>
<textarea class="form-control" name="post_content" id="" cols="30" row="10"><? echo $post_content; ?>
 
</textarea>
</div>


<div class="form-group">
<label for="post_tags">Post Tags</label>
<input value= "<? echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
</div>


<div class="form-group">
<label for="post_staus">Post Status</label>
<input value= "<? echo $post_status; ?>" type="text" class="form-control" name="post_status">
</div>

<div class="form-group">
<input class= "btn btn-primary"  type="submit"  name="createpost" value ="publish post">
</div>

</form>