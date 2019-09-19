<?php include'inc/header.php';?>


<?php 
if(isset($_POST['id'])){
        $id = $_POST['id'];
    }elseif(!isset($_GET['id']) ||$_GET['id']==NULL ){
     header("Location:index.php");
   }else{
       $id=$_GET['id'];
   }
?>

    <div class="container content">
     
    <div class="row">
		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12  ">
		  <?php 
          $query="SELECT user.name,title,time_date,image,content FROM user NATURAL join writes NATURAL JOIN newspost
           WHERE user.id=writes.user_id AND post_id=writes.post_id AND newspost.approved='yes' AND post_id=$id";
          $post=$db->select($query);
            $result=$post->fetch_assoc();
     
         ?>
	<div class="col-md-6 columnpadding">
       <img src="admin/<?php echo $result['image'];?>" alt="no image" class="thumb img-responsive">

    </div>
    <div class="col-md-12 columnpadding">
       <div class="">
			      <h4 class=""><?php echo $result['title'];?></h4>
			      <p class="">By <?php echo $result['name'];?> <?php echo $fm->formatdate($result['time_date']); ?> </p>
			      <p><?php echo $result['content']; ?></p>
          </div>
    </div>
    
    <div class="col-md-12">
    
     
    <div class="col-md-6 form-group"> 
      <?php
      $comment='';
    if($_SERVER['REQUEST_METHOD']=="POST" ){
				
				$comment=mysqli_real_escape_string($db->link,$_POST['comment']);
        if(empty($comment)){
            echo'Comment cannot be empty';
        }else{
          
        $query = "INSERT INTO comments(details) 
                            VALUES('$comment')";
                            $inserted_rows = $db->insert($query);                        
                            if ($inserted_rows) {

                                $query1="INSERT INTO post_comment(com_id,post_id)
                                            VALUES ( '$inserted_rows','$id')";

                                $inserted_rows1 = $db->insert($query1);
                                 $userid=Session::get('id');
                                $query2="INSERT INTO commenter(user_id,com_id)
                                            VALUES ('$userid', '$inserted_rows')";

                                $inserted_rows2 = $db->insert1($query2);

                                if($inserted_rows1 ){
                                     echo "<span class='success'>Comment Added Successfully. </span>";

                                }elseif($inserted_rows2){
                                    
                                  
                                        echo '<script type="text/javascript">
                                       
                                       window.alert("Comment Added Successfully.");
                                       window.location="post.php?id='.$id.'"</script>'; 

                                       

                                       
                                
                                  
                                      
                                }
                                else{
                                    echo "<span class='success'>comment Insertion error.</span>";

                                }
                           
                            }else {
                            echo "<span class='error'>comment Not Inserted !</span>";
                            }
        }
     }
     ?>
      <?php if(Session::get('login')==true){
      echo'<form action="post.php?id='.$id.'" method="POST"> 
         <input type="hidden" name="id" value='.$id.' />
    <label for="exampleFormControlTextarea1">Submit Your Comments</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="comment"></textarea>
    <div class="commentbutton"> 
    <input class="btn btn-primary" type="submit" value="Submit">
      </div>
      </form>';
      }else{
     echo' <a href="admin/login.php"><h4>Please Login to Comment</h4></a>';
    }?>

    </div>
    </div>
    
    

   <div class="col-md-12 ">
    <div class="col-md-6 ">
      <h2>Comments</h2>
      <ul class="list-group">
        <?php
        $query="SELECT comments.details,user.name FROM comments JOIN post_comment JOIN commenter JOIN user
         on user.id=commenter.user_id and commenter.com_id=comments.com_id 
         where post_comment.post_id='$id' and comments.com_id=post_comment.com_id";
        $comment=$db->select($query);

						if($comment){
							//$i=0;
							while($result=$comment->fetch_assoc()){
                             // $i++;
        ?>
        <li class="list-group-item">
          <h3><span class="glyphicon glyphicon-user "></span> <?php echo $result['name'];?></h3><br/>
          <p><?php echo $result['details'];?>
          </p>


        </li>
        <?php 
							}
						}else{
							echo "No Comments to Display";
						}
					
					?>
       
      </ul>

    </div>
    </div>
    


        
  </div><!--/row-->
</div><!--/container -->
</div>


<?php include'inc/footer.php';?>