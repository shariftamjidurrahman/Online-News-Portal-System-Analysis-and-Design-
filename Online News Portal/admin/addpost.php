<?php include"inc/header.php"; ?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <?php  
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if(empty($_POST['title']) || empty($_POST['cat']) && $_POST['cat']=='0' || empty($_POST['content']) ){
                        echo'Field Must not be empty<br/>';
                     
                    }else{
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
                     if(empty($file_name)){
                        echo'Image Must not be empty';
                     }
                    elseif ($file_size >1048567) {
                        echo "<span class='error'>Image Size should be less then 1MB!
                        </span>";
                        } elseif (in_array($file_ext, $permited) === false) {
                        echo "<span class='error'>You can upload only:-"
                        .implode(', ', $permited)."</span>";
                        } else{
                            move_uploaded_file($file_temp, $uploaded_image);
                            $query = "INSERT INTO newspost(title,content,image) 
                            VALUES('$title','$content','$uploaded_image')";
                            $inserted_rows = $db->insert($query);                        
                            if ($inserted_rows) {

                                $query1="INSERT INTO post_category(cat_id,post_id)
                                            VALUES ('$cat', '$inserted_rows')";

                                $inserted_rows1 = $db->insert($query1);
                                 $userid=Session::get('id');
                                $query2="INSERT INTO writes(user_id,post_id)
                                            VALUES ('$userid', '$inserted_rows')";

                                $inserted_rows2 = $db->insert1($query2);

                                if($inserted_rows1 ){
                                     echo "<span class='success'>News Post Inserted Successfully. </span>";

                                }elseif($inserted_rows2){
                                       echo 'News Post Added Successfully.';
                                       
 
                                }
                                else{
                                    echo "<span class='success'>News Post Insertion error.</span>";

                                }
                           
                            }else {
                            echo "<span class='error'>News Post Not Inserted !</span>";
                            }
                        }
                  }}
                

                ?>
                <div class="block">               
                 <form action="addpost.php" method="POST" enctype="multipart/form-data">
                 
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Post Title..." class="medium" name="title" />
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
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="image"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="content"></textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
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