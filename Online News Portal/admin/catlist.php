<?php include"inc/header.php"; ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
				<?php
                if(!isset($_GET['delcatid'])  || $_GET['delcatid']==NULL){
                    
                    

                    }else{
                        $id = $_GET['delcatid'];
                        $query="DELETE FROM category
                        WHERE cat_id='$id'";

                        $post=$db->delete1($query);
                        
                        if($post){
                            echo"<span class='success'>Category Deleted Successfully. </span>";
                        }else{
                            echo"<span class='error'>Category Deletion Error. </span>";
                        }
                    }
                ?>
	                
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					 <?php 
					 	$query="SELECT * FROM category";
						 $category=$db->select($query);
						 if($category){
							 $i=0;
							 while($result=$category->fetch_assoc()){
								 $i++;
					 ?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['cat_name'];?></td>
							<td><a href="editcat.php?editcatid=<?php echo $result['cat_id'];?>">Edit</a> || <a href="catlist.php?delcatid=<?php echo $result['cat_id'];?>">Delete</a></td>
						</tr>
						<?php }
						 }else{
						    echo "No category to Display";
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
