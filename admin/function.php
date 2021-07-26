<?php

function insert_categories(){
if(isset($_POST['submit']))
{
    global $conn;

    $cat_title= $_POST['cat_title'];

     if($cat_title == "" || empty($cat_title))

    {
        echo"This field should not be empty ";
    }

    else{

     $query= "INSERT INTO  Categories(cat_title)";
     $query .= "VALUE ('{$cat_title}')";

     $create_category_query=mysqli_query($conn,$query);

     if(!$create_category_query)

     {
         die('Query failed' .mysqli_error($conn));
     }

   }

}

}


function addCategories()
{
    global $conn;
    $query= "SELECT * FROM  Categories";
    
    $select_category= mysqli_query($conn,$query);

  while($row= mysqli_fetch_assoc($select_category))
{
  $cat_id = $row['cat_id'];
  $cat_title = $row['cat_title'];


 echo "<tr>";
  echo "<td> {$cat_id}</td>";
 echo  "<td>{$cat_title}</td>";
 echo  " <td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
 echo  " <td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
 echo "</tr>";
}

}


function deleteCategories()

{

    global $conn;
    if(isset($_GET['delete']))
    {
    $cat_title_one= $_GET['delete'];
    $query= "DELETE FROM  categories WHERE cat_id= {$cat_title_one} ";
    $delete_query=mysqli_query($conn,$query);
    header("Location:categories.php");

    } 

}


?>