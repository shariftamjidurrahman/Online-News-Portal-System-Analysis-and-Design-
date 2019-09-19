<?php include"inc/header.php"; ?>
<?php include"inc/approveandedit.php"; ?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
				
			
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
						    <th width="5%">No.</th>
							<th width="15%">Post Title</th>
							<th width="25%">Description</th>
							<th width="15%">Category</th>
							<th width="10%">Image</th>
							<th width="10%">Author</th>
							<th width="20%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
							$editor=Session::get('role');
					if($editor=='editor'){
                                 $query="SELECT title,content,image,cat_name, user.name,newspost.post_id,approved,writes.user_id
						 		FROM user NATURAL JOIN writes NATURAL JOIN newspost  NATURAL JOIN post_category NATURAL JOIN category 
								WHERE user.id= writes.user_id AND writes.post_id = newspost.post_id AND
								category.cat_id=post_category.cat_id AND newspost.post_id=post_category.post_id
							    AND user.role='editor' ORDER BY newspost.post_id DESC";
				
						
						
					}else{
						$query="SELECT title,content,image,cat_name, user.name,newspost.post_id,approved,writes.user_id
						 FROM user  JOIN writes  JOIN newspost   JOIN post_category JOIN 
						 category WHERE user.id= writes.user_id AND writes.post_id = newspost.post_id AND
						  category.cat_id=post_category.cat_id AND newspost.post_id=post_category.post_id  
						  ORDER BY newspost.post_id DESC";
					}

						$post=$db->select($query);

						if($post){
							$i=0;
							while($result=$post->fetch_assoc()){
                              $i++;
							
                    ?>

						<tr class="odd gradeX">
						    <td><?php echo $i; ?></td>
							<td><?php echo $result['title']; ?></td>
							<td><?php echo $fm->textshorten($result['content'],100); ?></td>
							<td class="center"> <?php echo $result['cat_name']; ?> </td>
							<td > <img src="<?php echo $result['image'] ; ?>" height="60px" width="100px" style="text-align:center;" ></td>
							<td class="center"> <?php echo $result['name'] ; ?> </td>

							<td>
							 <a href="editpost.php?editpostid=<?php echo $result['post_id'] ; ?>">Edit</a>
							
							 <?php 
							 $editoraccess=	Session::get('role');
							 $postid2=$result['post_id'];
							 if ($editoraccess=='admin'){
							 echo'|| <a href="postlist.php?delpostid=' .$postid2.'">Delete</a> ||';
							 
							 if ($result['approved']=='yes'){
							  echo '<a href="postlist.php?rejectpostid='.$postid2. '">Reject</a>' ;
							 }else{ 
							  echo '<a href="postlist.php?approvepostid= '.$postid2.'"> Approve</a>'; 
							}
							} 
							?>
                             </td>
						</tr>
					<?php 
							}
						}else{
							echo "No Posts to Display";
						}
					
					?>	
					</tbody>
				</table>
	
               </div>
            </div>
        </div>
        
	 <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>  

<?php include"inc/footer.php"; ?>
