<table class= " table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>post_cat</th>
                                <th>Title</th>
                                <th>author</th>
                               <th>User</th>
                                <th>date</th>
                                <th>Images</th>
                                <th>Content</th>
                                 <th>Tags</th>
                                <th>Comment</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>

                              </tr>
                        </thead>
                        <tbody>


                        <?php

if(isset($_GET['delete']))
{
$id_delete= $_GET['delete'];
$query= "DELETE FROM  posts WHERE post_id= {$id_delete} ";
$delete_query=mysqli_query($conn,$query);
header("Location:posts.php");
}

                         ?>


                        <?php
                        
                        $query= "SELECT * FROM  posts";
    
                       $select_posts= mysqli_query($conn,$query);

                        while($row= mysqli_fetch_assoc($select_posts))
                        {

                        $post_id = $row['post_id'];
                        $post_category_id =$row['post_category_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_user = $row['post_user'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                       $post_content = $row['post_content'];
                      $post_tags = $row['post_tags'];
                      $post_comment_count = $row['post_comment_count'];
                      $post_status = $row['post_status'];
                       
                       
                       echo "<tr>";
                echo "<td> {$post_id}</td>";

                 $query= "SELECT * FROM  categories WHERE cat_id= {$post_category_id} ";
                $select_posts_editing_cat= mysqli_query($conn,$query);
                 while($row= mysqli_fetch_assoc($select_posts_editing_cat))
                  {

                 $cat_id = $row['cat_id'];
                 $cat_title = $row['cat_title'];
                  echo "<td>{$cat_title}</td>";
                  }

                 //echo  "<td>{$post_category_id}</td>";
                echo  "<td>{$post_title}</td>";
                 echo  "<td>{$post_author}</td>";
                echo  "<td>{$post_user}</td>";
                echo  "<td>{$post_date}</td>";
                echo "<td><img  width='100'src='../images/$post_image' alt='image'></td>";
                echo  "<td>{$post_content}</td>";
                echo  "<td>{$post_tags}</td>";
                echo  "<td>{$post_comment_count}</td>";
                echo  "<td>{$post_status}</td>";
                echo  "<td><a href='posts.php?source=editing&p_id={$post_id}'>Edit</td>";
                echo  "<td><a href='posts.php?delete={$post_id}'>Delete</td>";
                echo "<tr>";

                

}

                         ?>

</tbody>
                </table> 

    
                            
                        
                         