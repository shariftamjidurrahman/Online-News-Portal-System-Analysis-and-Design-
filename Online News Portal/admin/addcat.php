<?php include"inc/header.php"; ?>


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
                                        
                                $query = "INSERT INTO category(cat_name) 
                                        VALUES('$cat')";
                                    $inserted_rows = $db->insert1($query);                        
                                    if ($inserted_rows) {
                                            echo'<span class="success">Category has been added</span>';
                                    }else{
                                            echo'<span class="success">Error to add Category</span>';
                                }
                                }
                            }
                    }
                ?>
               <div class="block copyblock"> 
                 <form action="addcat.php" method="POST" enctype="multipart/form-data">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Category Name..." class="medium" name="cat" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <?php include"inc/footer.php"; ?>
