<?php include"inc/header.php"; ?>
<?php 
     if(isset($_POST['id'])){
        $id = $_POST['id'];
    }elseif($_GET['editcatid']==NULL || empty($_GET['editcatid'])){
                 echo '<script> window.location="pagelist.php"</script>';

     }else{
         $id=$_GET['editcatid'];
     }
?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $cat = strtolower(mysqli_real_escape_string($db->link, $_POST['cat']));
                         $flag=0;
                        $query="SELECT cat_name FROM category WHERE 1";
                                $cat1=$db->select($query);
                                if($cat1){
                                while($result=$cat1->fetch_assoc()){  
                                    $cat2=$result['cat_name'];
                                   
                                    if($cat2==$cat){
                                        $flag=1;
                                    }
                                }
                                } 
                            if (empty($cat) ) {
                                echo "<span class='error'>Field must not be empty</span>";
                            }else{
                                if($flag==1){
                                  echo "<span class='error'>Category Already Exists</span>";
                                }else{        
                                $query = "UPDATE category
                                 SET
                                 cat_name='$cat'
                                 WHERE cat_id=$id ";
                                    $updated_rows = $db->update($query);                        
                                    if ($updated_rows) {
                                            echo"<span class='success'>Category has been updated</span>";
                                    }else{
                                             echo"<span class='error'>Category update error</span>";
                                   }
                            }    }
                    }
                ?>
               <div class="block copyblock"> 
                    <?php
                   $query3="SELECT * FROM category WHERE cat_id='$id' ";
                                $page3=$db->select($query3);
                                if($page3){
                                while($result=$page3->fetch_assoc()){  
                              
                    ?>
                 <form action="editcat.php" method="POST" enctype="multipart/form-data">
                <input type='hidden' name="id" value='<?php echo $id ?>' />

                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value ="<?php echo $result['cat_name'] ?>" placeholder="Enter Category Name..." class="medium" name="cat" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php }}?>
                </div>
            </div>
        </div>
        <?php include"inc/footer.php"; ?>
