<table class= " table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Comment</th>
                                <th>Email</th>
                               <th>Status</th>
                               <th>In Response to</th>
                                <th>Date</th>
                                <th>Approve</th>
                                <th>Unapprove</th>
                                <th>Delete</th>
                                </tr>
                        </thead>
                        <tbody>
                    
                     <?php
                        $query= "SELECT * FROM  comment";
    
                        $select_comments= mysqli_query($conn,$query);

                        while($row= mysqli_fetch_assoc($select_comments))
                        {

                        $comment_id = $row['comment_id'];
                        $comment_post_id =$row['comment_post_id'];
                        $comment_author = $row['comment_author'];
                        $comment_content = $row['comment_content'];
                        $comment_email = $row['comment_email'];
                        $comment_status = $row['comment_status'];
                        $comment_date = $row['comment_date'];
                      // $post_content = $row['post_content'];
                       //$post_tags = $row['post_tags'];
                       
                       
                       echo "<tr>";
                echo "<td> {$comment_id }</td>";
               // echo  "<td>{$comment_post_id}</td>";
                echo  "<td>{$comment_author}</td>";
                echo  "<td>{$comment_content}</td>";
                echo  "<td>{$comment_email}</td>";
                echo  "<td>{$comment_status}</td>";
                $query= "SELECT * FROM  posts WHERE post_id= $comment_post_id";
                $select_comments_id= mysqli_query($conn,$query);
                while($row= mysqli_fetch_assoc($select_comments_id))
                        {

                        $post_id = $row['post_id'];
                        $post_title =$row['post_title'];

                  echo  "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                        }

                echo  "<td>{$comment_date}</td>";
                echo  "<td><a href='comments.php?Approve=$comment_id'>Approve</td>";
                echo  "<td><a href='comments.php?Unapprove=$comment_id'>Unapprove</td>";
               echo  "<td><a href='comments.php?Delete=$comment_id'>Delete</td>";
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
    
                            
                        
                         