<form action="" method="post">

                    <div class="form-group">
                        <label for="cat-title">Edit</label>

                        <?php

                     if(isset($_GET['edit']))
                     {
                        $cat_id= $_GET['edit'];
                         $query= "SELECT * FROM  Categories WHERE cat_id= $cat_id ";
                        $select_category_edit= mysqli_query($conn,$query);

                        while($row= mysqli_fetch_assoc($select_category_edit))
                        {
                          $cat_id = $row['cat_id'];
                          $cat_title = $row['cat_title'];
                          ?>
                        
    <input value ="<?php if(isset($cat_title)) {echo $cat_title ; } ?>" type ="text"class="form-control" name="cat_title">

                       <?php }} ?>

                   <?php


if(isset($_POST['update_category']))
{
   $cat_title= $_POST['cat_title'];
    $query= "UPDATE  categories SET cat_title = '{$cat_title}' WHERE cat_id= {$cat_id} ";
   $select_category_update= mysqli_query($conn,$query);

   if(!$select_category_update)

     {
         die('Query failed' .mysqli_error($conn));
     }
   
    }



?>
                   
            </div>
                   <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="update_category" value="UpdateCategory">
                    </div>
</form>