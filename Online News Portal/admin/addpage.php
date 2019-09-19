<?php include"inc/header.php"; ?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Page</h2>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $cat = mysqli_real_escape_string($db->link, $_POST['cat']);
                        $page = strtoupper(mysqli_real_escape_string($db->link, $_POST['page']));
                        $flag=0;
                        $query="SELECT menu FROM page WHERE 1";
                                $page1=$db->select($query);
                                if($page1){
                                while($result=$page1->fetch_assoc()){  
                                    $page2=$result['menu'];
                                   
                                    if($page2==$page){
                                        $flag=1;
                                    }
                                }
                                }
                            if (empty($cat) || empty($page) ) {
                                echo "<span class='error'>Field must not be empty</span>";
                            }
                            else{    
                                if($flag==1){
                                  echo "<span class='error'>Page Already Exists</span>";
                                }else{
                                $query1= "INSERT INTO page(menu,categoryid) 
                                        VALUES('$page','$cat')";
                                    $inserted_rows = $db->insert1($query1);                        
                                            if ($inserted_rows) {
                                                    echo'Page has been added';
                                            }else{
                                                    echo'Error to add Page';
                                        }
                                
                              }
                            }
                        
                    }
                    
                ?>
               <div class="block copyblock"> 
                 <form action="addpage.php" method="POST" enctype="multipart/form-data">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Page Name..." class="medium" name="page" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                             <?php 
                            $query="SELECT cat_id, cat_name FROM category WHERE 1";
                            $category=$db->select($query);
            
                           ?>
    
                              <select id="select" name="cat">
                                  <option value="0"> Select Category</option>
                                  <?php if($category){
                                while($result=$category->fetch_assoc()){  

                                   ?>
                                    <option value="<?php echo $result['cat_id'];?>"><?php echo $result['cat_name'];?></option>
                                    <?php }?>
                                    <?php }else{
                                echo"internal problem";
                                }?>
                                </select>
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Add Page" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <?php include"inc/footer.php"; ?>
