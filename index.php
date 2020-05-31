<?php ob_start();?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Library</title>
 
</head>
<body>
    <?php 
        include 'db.php';
    ?>


?>
         <!-- Generate table with  js  -->
 <h1 class="header"> Library</h1>   
    <div class="container" >
        <form method="post" class="form" > 
            <br>
            <div class="controlBtn">
                <button type="button" class="btn btn-primary btn-lg addNewBook" name="button"  value="Add a new Book"> Add a new Book</button>
                <input type="submit" id="right-btn" class="btn btn-primary btn-lg submit" name="submit" value="Save">
            </div>
                     <?php
                        //send info to server

                        if(isset($_POST['submit'])){
                            $title=$_POST['title'];
                            $author=$_POST['author'];
                            $page=$_POST['pages'];
                            if (!empty($title) && !empty($author) && !empty($page)) {
                                $query = "INSERT INTO books ( Title,Author,Pages ) VALUES('$title','$author', '$page')" ;
                                $query_update=mysqli_query($connection , $query);
                                   if(!$query_update){
                                 die("query failed". mysqli_error($connection));
                              }; 
                            }else{
                              echo "<p class='text-center text-monospace text-primary'> Fields cannot be empty  <p>"; 
                            
                             
                        }
                    }
                    ?>
                      </form>

                     <h4 class="headersec"  >My Book List</h4> <br/>
                        <form method="post" class="form" > 
                         <div class="book-list">
                          
                          

                            <?php 
                                $query="SELECT * FROM books";
                                $select_books = mysqli_query($connection , $query);
                                    while($row=mysqli_fetch_assoc($select_books)){
                                        $title_update=$row['Title'];
                                        $author_update=$row['Author'];
                                        $page_update=$row['Pages'];
                                        $id=$row['books_id'];
                                     ?> 
                                          
                                           <table class="table table-bordered table-dark" id="table">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Author</th>
                                                    <th scope="col">Pages</th>
                                                    <th scope="col">Edit</th>
                                                    <th scope="col">Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                    <th scope="row"><?php echo $id; ?></th>
                                                    <td><?php echo $title_update; ?></td>
                                                    <td><?php echo $author_update; ?></td>
                                                    <td><?php echo $page_update; ?></td>
                                                    <td> <?php  echo "<a class='edit' href='index.php?id_edit={$id}' data={$id}>Edit</a>" ?></td>
                                                    <td> <?php  echo "<a onClick=\" javascript: return confirm('Are you sure you want to delete') \" href='index.php?delete={$id}'>Delete</a>" ?></td>
                                                </tr>
                                                
                                                </tbody>
                                                </table>
                                        
                                                            <?php 
                                                                            } ?>
                                        </form>
                                            <?php 
                                                //delete post
                                                if(isset($_GET['delete'])){
                                                    $delete_row=$_GET['delete'];
                                                $delete_query = "DELETE FROM books WHERE books_id={$delete_row}";
                                                $delete_selected_row = mysqli_query($connection , $delete_query);
                                                header("Location: index.php");
                                                
                                                }
                                                
                                            ?>
                                                            <?php 
                                                    if(isset($_GET['id_edit'])){
                                                        $source = $_GET['id_edit'];
                                                       
                                                        $query_edit="SELECT * FROM books WHERE books_id = $source " ;
                                                        $select_books = mysqli_query($connection , $query_edit);
                                                        while($row=mysqli_fetch_assoc($select_books)){
                                                            $title=$row['Title'];
                                                            $author=$row['Author'];
                                                            $pagee=$row['Pages'];
                                                            $id=$row['books_id'];
                                                           
                                                        }
                                                        include 'edit.php';  
                                                      
                                            };
                                             ?>

                                      
                                            <br>  
        
                                             <?php           
                                            // if(isset($_POST['submit'])){
                                            //     $title=$_POST['title'];
                                            //     $author=$_POST['author'];
                                            //     $page=$_POST['pages'];

                                            //     if (!empty($title) && !empty($author) && !empty($page)) {
                                            //         $query = "INSERT INTO books ( Title,Author,Pages ) VALUES('$title','$author', '$page') WHERE  books_id = $source " ;
                                            //         $query_update=mysqli_query($connection , $query);
                                            //            if(!$query_update){
                                            //          die("query failed". mysqli_error($connection));
                                            //       }; 
                                            //     }else{
                                            //       echo "<p class='text-center text-monospace text-primary'> Fields cannot be empty  <p>"; 
                                                
                                                 
                                           // }
                                   //     }
                                                                 ?>
                                                                 

                            
                        
                        </div>   
            </div>
      
    </div>
            
           
            
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
    <script type="text/javascript" src='js.js'></script>
</html>