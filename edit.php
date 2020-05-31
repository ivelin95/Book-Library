                            <?php ob_start();?>
                                            <div class="list-edit">
                                            <form class="form" method="post" action='#'>
                                            <br>
                                            <input type="text" readonly placeholder="<?php echo  $id?>" name="id" class="rows"> 
                                            <input type="text" placeholder="<?php echo  $title?>" name="title" class="rows">  
                                            <input type="text" placeholder="<?php echo  $author?>" name="author" class="rows" >
                                            <input type="number" placeholder="<?php echo  $pagee?>" name="pages" class="rows"> 
                                            <input type="submit"  name="update"  value="update" class="rows"> 

                                            <?php
                        //send info to server

                        if(isset($_POST['update'])){
 
                            $title=$_POST['title'];
                            $author=$_POST['author'];
                            $page=$_POST['pages'];
                            if (!empty($title) && !empty($author) && !empty($page)) {
                                $query_to_server= "UPDATE books SET Title = '{$title}',Author = '$author', Pages = '$page' WHERE books_id = '$source'";
                                $query = mysqli_query($connection,$query_to_server);
                                echo "<p  class='text' >Your book has been updated <a href='index.php'>View all books</a>  <p>";
                                   if(!$query){
                                 die("query failed". mysqli_error($connection));
                              }; 
                            }else{
                              echo "<p style='color:red'> Fields cannot be empty  <p>"; 
                            
                             
                        }
                    }
                    ?>
                                        </form>
                                            </div>   