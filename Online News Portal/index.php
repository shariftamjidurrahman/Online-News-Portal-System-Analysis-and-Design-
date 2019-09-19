<?php include'inc/header.php';?>


    <div class="container content">
     <div class="row">
         		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12  ">

            <h1>Latest News</h1>
            <p>Stay With Us To Get Updated News.</p>
            </div>
     </div>

    <div class="row">
		<div class="col-md-5 col-lg-5 col-sm-12 col-xs-12  ">
		  <?php 
          $query=" SELECT user.name,title,time_date,image,newspost.post_id FROM user JOIN writes JOIN newspost
           on user.id=writes.user_id AND newspost.post_id=writes.post_id AND newspost.approved='yes'
           ORDER BY newspost.post_id DESC LIMIT 0,1 ";
          $post=$db->select($query);
            
      ?>
      <?php if($post){
          while($result=$post->fetch_assoc()){
    

      ?>

			<div class="featured-article">
				<a href="post.php?id=<?php echo $result['post_id'];?>">
					<img src="admin/<?php echo $result['image'];?>" alt="" class="thumb  heightadjust img-responsive">
				</a>
				<div class="block-title">
				<a href="post.php?id=<?php echo $result['post_id'];?>">	<h2><?php echo $fm->textshorten($result['title'],35);?></h2></a>
					<p class="by-author"><small>By <?php echo $result['name'];?> <?php echo $fm->formatdate($result['time_date']);?></small></p>
				</div>
			</div>
      <?php  }?><!--end while loop-->
      <?php }else{
       echo"internal problem";
      }?>
			<!-- /.featured-article -->
		</div>
		<div class="col-md-7 col-lg-7 col-sm-12 col-xs-12">
     <?php 
          $query1="SELECT user.name,title,time_date,content,image,post_id
           FROM user NATURAL join writes NATURAL JOIN newspost 
           WHERE user.id=writes.user_id AND post_id=writes.post_id AND newspost.approved='yes' 
           ORDER BY post_id DESC LIMIT 1,3";
          $post1=$db->select($query1);
            
      ?>
      
			<ul class="media-list main-list">
      <?php if($post1){
          while($result1=$post1->fetch_assoc()){   

      ?>
			  <li class="media">
			    <a class="pull-left" href="post.php?id=<?php echo $result1['post_id'];?>">
			      <img class="media-object" src="admin/<?php echo $result1['image'];?>" alt="..." width="190px"; height="90px">
			    </a>
			    <div class="media-body">
			      <a href="post.php?id=<?php echo $result1['post_id'];?>"><h4 class="media-heading"><?php echo $result1['title'];?></h4></a>
			      <p class="by-author">By <?php echo $result1['name'];?> <?php echo $fm->formatdate($result1['time_date']); ?> </p>
			      <p><?php echo $fm->textshorten($result1['content'],100); ?></p>
          </div>
			  </li>
			  <?php }?>
        <?php }else{
       echo"internal problem";
      }?>
			</ul>
		</div>
         
	</div>
    
<hr>

      <div class="row">
         <?php 
          $query1="SELECT user.name,title,time_date,content,image,post_id
           FROM user NATURAL join writes NATURAL JOIN newspost 
           WHERE user.id=writes.user_id AND post_id=writes.post_id AND newspost.approved='yes' 
           ORDER BY post_id DESC LIMIT 4,8";
          $post1=$db->select($query1);
            
      ?>
      
			<ul class="media-list main-list">
      <?php if($post1){
          while($result1=$post1->fetch_assoc()){   

      ?>
        <div class="col-xs-18 col-sm-6 col-md-3">
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