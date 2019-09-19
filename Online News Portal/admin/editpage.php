<?php include"inc/header.php"; ?>
<?php 
     if(isset($_POST['id'])){
        $id = $_POST['id'];
    }elseif($_GET['editpageid']==NULL || empty($_GET['editpageid'])){
                 echo '<script> window.location="pagelist.php"</script>';

     }else{
         $id=$_GET['editpageid'];
     }
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Page</h2>
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
                                if($flag==0){
                                  echo "<span class='error'>Page Already Exists</span>";
                                }else{
                                $query = "UPDATE page
                                SET
                                menu='$page' ,
                                categoryid='$cat'
                                WHERE id='$id'";
                                $updated_rows = $db->update($query);                        
                                            if ($updated_rows) {
                                            echo "<span class='success'>News Post updated Successfully. </span>";

                                            }else{
                                                    echo'<span class="error">Error to update Page.</span>';
                                        }
                                
                              }
                            }
                        
                    }
                    
                ?>
                 
               <div class="block copyblock"> 
                   <?php
                   $query3="SELECT * FROM page WHERE id='$id' ";
                                $page3=$db->select($query3);
                                if($page3){
                                while($result=$page3->fetch_assoc()){  
                              
                    ?>
                 <form action="editpage.php" method="POST" enctype="multipart/form-data">
                  <input type='hidden' name="id" value='<?php echo $id ?>' />

                    <table class="form">					
                        <tr>
                            <td>

                                <input type="text" value="<?php echo $result['menu'];?>"placeholder="Enter Page Name..." class="medium" name="page" />
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
                                while($pageresult=$category->fetch_assoc()){  

                                   ?>
                                    <option <?php if($pageresult['cat_id'] == $result['categoryid']){?>
                                        selected ="selected"
                                   
                                 <?php  } ?>value="<?php echo $pageresult['cat_id'];?>"><?php echo $pageresult['cat_name'];?></option>
                                    <?php }?>
                                    <?php }else{
                                echo"internal problem";
                                }?>
                                </select>
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update Page" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php }}?>
                </div>
            </div>
        </div>
        <?php include"inc/footer.php"; ?>
