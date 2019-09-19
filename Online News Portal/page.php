<?php include'inc/header.php';?>

<?php 
     if($_GET['catid']==NULL || empty($_GET['catid'])){
         header("Location:index.php");
     }else{
         $catid=$_GET['catid'];
     }
?>

    <div class="container content">
     <div class="row ">
         		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12  ">
                     <?php
                     $query="SELECT * from page where categoryid='$catid'";
                     $cat=$db->select($query);
                     if($cat){
                         $result=$cat->fetch_assoc();
                     ?>
            <h2> <?php echo $result['menu']?> </h2>
            <?php }?>
            <p> Stay With Us To Get Updated News.</p>
            </div>
     </div>

    

      <div class="row content-inside">
         <?php 
          $query1="SELECT user.name,title,time_date,content,image,newspost.post_id
           FROM user JOIN writes JOIN newspost JOIN post_category
           on user.id=writes.user_id AND newspost.post_id=writes.post_id AND newspost.approved='yes' 
           WHERE post_category.cat_id =$catid && post_category.post_id=newspost.post_id
           ORDER BY newspost.post_id DESC ";
          $post1=$db->select($query1);
            
      ?>
      
			<ul class="media-list main-list">
      <?php if($post1){
          while($result1=$post1->fetch_assoc()){   

      ?>
        <div class="col-xs-18 col-sm-6 col-md-3 ">
          <div class="thumbnail">
            <img src="admin/<?php echo $result1['image'];?>">
              <div class="caption">
          <a href="post.php?id=<?php echo $result1['post_id'];?>" >
                <h4><?php echo $fm->textshorten($result1['title'],20);?></h4>
          </a>
          <a href="post.php?id=<?php echo $result1['post_id'];?>" >
                <p><?php echo $fm->textshorten($result1['content'],100); ?></p>
         </a> 
            </div>
          </div>
        </div>
         <?php }?>
        <?php }else{
       echo"internal problem";
      }?>
       

        
  </div><!--/row-->
</div><!--/container -->


<?php include'inc/footer.php';?>