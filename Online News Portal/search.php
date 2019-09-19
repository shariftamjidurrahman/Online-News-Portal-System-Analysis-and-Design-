	<?php include'inc/header.php';?>
  <?php
if(!isset($_GET['search'])  || $_GET['search']==NULL){
       
echo'<script>window.location="index.php"</script>';

	}else{
        $search = $_GET['search'];
		

		
	}
  ?>
<div class="container">
    <div class="row">
    <div class="col-md-12 columnsearch">
    
     <?php 
         $query1="SELECT user.name,title,time_date,content,image,newspost.post_id,approved
          FROM user JOIN writes JOIN newspost JOIN post_category JOIN category
           ON user.id=writes.user_id
           AND newspost.post_id=writes.post_id AND newspost.approved='yes' AND post_category.post_id=newspost.post_id
            AND post_category.cat_id=category.cat_id
            WHERE newspost.title like '%$search%' OR newspost.content LIKE '%$search%' OR user.name LIKE '%$search%' OR 
            category.cat_name LIKE '%$search%'
            ORDER BY newspost.post_id";
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
       echo"No results Found For '$search'";
       
      }?>
			</ul>
		</div>
    </div>
    </div>
    
    
        <?php include'inc/footer.php';?>