<table class= " table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Username</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                               <th>Email</th>
                               <th>Role</th>
                                <th>Date</th>
                                </tr>
                        </thead>
                        <tbody>
                    
                     <?php
                        $query= "SELECT * FROM  Users";
                        $select_Users= mysqli_query($conn,$query);
                        while($row= mysqli_fetch_assoc($select_Users))
                        {

                        $user_id = $row['user_id'];
                        $username =$row['username'];
                        $user_firstname = $row['user_firstname'];
                        $user_lastname = $row['user_lastname'];
                        $user_email = $row['user_email'];
                        $user_image = $row['user_image'];
                        $user_role = $row['user_role'];
                      // $post_content = $row['post_content'];
                       //$post_tags = $row['post_tags'];
                       
                       
                       echo "<tr>";
                echo "<td> {$user_id}</td>";
               // echo  "<td>{$comment_post_id}</td>";
                echo  "<td>{$username}</td>";
                echo  "<td>{$user_firstname}</td>";
                echo  "<td>{$user_lastname}</td>";
                echo  "<td>{$user_email}</td>";
                echo  "<td>{$user_role}</td>";

                // $query= "SELECT * FROM  posts WHERE post_id= $comment_post_id";
                // $select_comments_id= mysqli_query($conn,$query);
                // while($row= mysqli_fetch_assoc($select_comments_id))
                //         {

                //         $post_id = $row['post_id'];
                //         $post_title =$row['post_title'];

                //   echo  "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                //         }

              //  echo  "<td><a href='comments.php?Approve=$comment_id'>Approve</td>";
                //echo  "<td><a href='comments.php?Unapprove=$comment_id'>Unapprove</td>";
               //echo  "<td><a href='comments.php?Delete=$comment_id'>Delete</td>";
                echo "<tr>";

                

}

                         ?>

</tbody>
</table> 

<?php

if(isset($_GET['Delete']))
{
    $comment_id = $_GET['Delete'];
    $query= " DELETE  FROM  comment WHERE comment_id = {$comment_id}  ";
     $delete_query=mysqli_query($conn,$query);
     header("Location: comments.php");

}

if(isset($_GET['Approve']))
{
    $approve_id = $_GET['Approve'];
    $query= "UPDATE comment SET comment_status = 'Approved'  WHERE comment_id = $approve_id ";
     $delete_query=mysqli_query($conn,$query);
     header("Location: comments.php");

}

if(isset($_GET['Unapprove']))
{
    $unapprove_id = $_GET['Unapprove'];
    $query= "UPDATE comment SET comment_status = 'Unapproved'  WHERE comment_id = $unapprove_id ";
     $delete_query=mysqli_query($conn,$query);
     header("Location: comments.php");

}

?>
    
                            
                        
                         