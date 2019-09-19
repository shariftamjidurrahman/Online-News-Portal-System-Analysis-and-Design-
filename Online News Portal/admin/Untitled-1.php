<?php include"inc/header.php"; ?>
<?php 
    if(isset($_POST['id'])){
        $id = $_POST['id'];
    }else if(!isset($_GET['editpostid'])  || $_GET['editpostid']==NULL){
        echo '<script> window.location="postlist.php"</script>';
    }else{
        $id = $_GET['editpostid'];
    }

?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Post</h2>
                <?php  
                if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
                    
                     $title = mysqli_real_escape_string($db->link, $_POST['title']);
                    $cat = mysqli_real_escape_string($db->link, $_POST['cat']);
                    $content = mysqli_real_escape_string($db->link, $_POST['content']);
                    $permited  = array('jpg', 'jpeg', 'png', 'gif');
                    $file_name = $_FILES['image']['name'];
                    $file_size = $_FILES['image']['size'];
                    $file_temp = $_FILES['image']['tmp_name'];

                    $div = explode('.', $file_name);
                    $file_ext = strtolower(end($div));
                    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                    $uploaded_image = "upload/".$unique_image;
                    if ($title==" "||$cat==" "|| $content==" " ) {
                       echo "<span class='error'>Field must not be empty</span>";
                    }else{
                    if(!empty($file_name)){
                        if ($file_size >1048567) {
                        echo "<span class='error'>Image Size should be less then 1MB!
                        </span>";
                        } elseif (in_array($file_ext, $permited) === false) {
                        echo "<span class='error'>You can upload only:-"
                        .implode(', ', $permited)."</span>";
                        } else{
                            move_uploaded_file($file_temp, $uploaded_image);
                            $query = "UPDATE newspost
                            SET
                            title='$title' ,
                            content='$content',
                            image='$uploaded_image'
                            WHERE post_id='$id'";
                            $updated_rows = $db->update1($query);                        
                            if ($updated_rows) {

                                $query1=" UPDATE post_category
                                            SET
                                            cat_id='$cat'
                                            WHERE post_id='$id'";
                                $updated_rows1 = $db->update($query1);

                                if($updated_rows1 ){
                                     echo "<span class='success'>News Post Updated Successfully. </span>";

                                }else{
                                    echo "<span class='success'>News Post Update error.</span>";

                                }
                           
                            }else {
                            echo "<span class='error'>News Post Not Inserted !</span>";
                            }
                        }
                     }else{
                         $query = "UPDATE newspost
                            SET
                            title='$title' ,
                            content='$content'
                            WHERE post_id='$id'";
                            $updated_rows = $db->update1($query);                        
                            if ($updated_rows) {
                                

                                $query1=" UPDATE post_category
                                            SET
                                            cat_id='$cat'
                                            WHERE post_id='$id'";
                                $updated_rows1 = $db->update($query1);
                                

                                if($updated_rows1 ){
                                     echo "<span class='success'>News Post updated Successfully. </span>";

                                }else{
                                    echo "<span class='success'>News Post Update error.</span>";

                                }

                     }  
                }
                    
            }
    }
             
        
                

                ?>
                <div class="block"> 
                    <?php 
						$query="SELECT title,content,image,cat_id
                        FROM newspost  NATURAL JOIN post_category NATURAL JOIN category
                        WHERE  category.cat_id=post_category.cat_id And post_category.post_id = '$id'
                        AND newspost.post_id= '$id' LIMIT 1 ";

						$post=$db->select($query);

						if($post){
							
							while($postresult=$post->fetch_assoc()){
                              
                    ?>              
                 <form action="Untitled-1.php" method="post" enctype="multipart/form-data">
                    <input type='hidden' name="id" value='<?php echo $id ?>' />
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $postresult['title'];?>" class="medium" name="title" />
                            </td>
                        </tr>
                     
                       
                   
                    
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <img src="<?php echo $postresult['image']?>" width="200px"height="100px"><br/>
                                <input type="file" name="image"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="content">
                                    <?php echo $postresult['content']?>
                                </textarea>
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                            <?php
                             $query="SELECT cat_id, cat_name FROM category WHERE 1";
                              $category=$db->select($query);
                              ?>
                              <select id="select" name="cat[]" multiple="multiple">
                                 
                                   
                                <?php if($category){
                                    while($result=$category->fetch_assoc()){  

                                   ?>
                                    <option
                                   <?php
                                   $query="SELECT cat_id
                        FROM newspost  NATURAL JOIN post_category NATURAL JOIN category
                        WHERE  category.cat_id=post_category.cat_id And post_category.post_id = '$id'
                        AND newspost.post_id= '$id'  ";

						$post=$db->select($query);

						if($post){
							
							while($postresult=$post->fetch_assoc()){
                                    if($postresult['cat_id'] == $result['cat_id']){?>
                                        selected ="selected"
                                   
                                 <?php  }}} ?>value="<?php echo $result['cat_id'];?>">
                                     <?php echo $result['cat_name'];?></option>
                                     
                              <?php }?>
                          <?php }else{
                                echo"internal problem";
                                }?>
                                   
                                </select>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php }?>
                                    <?php }else{
                                echo"internal problem";
                                }?>
                </div>
            </div>
        </div>
         <!--Fancy Button-->
    <script src="js/fancy-button/fancy-button.js" type="text/javascript"></script>
    <script src="js/setup.js" type="text/javascript"></script>
    <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
		<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
		    setSidebarHeight();
        });
    </script>
    <!-- /TinyMCE -->
    <style type="text/css">
		#tinymce{font-size:15px !important;}
    </style>
        <?php include"inc/footer.php"; ?>