<?php include"inc/header.php"; ?>

    
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Page List</h2>
                <?php
                if(!isset($_GET['delpageid'])  || $_GET['delpageid']==NULL){
                    
                    

                    }else{
                        $id = $_GET['delpageid'];
                        $query="DELETE FROM page
                        WHERE id='$id'";

                        $post=$db->delete1($query);
                        
                        if($post){
                            echo"<span class='success'>Page Deleted Successfully. </span>";
                        }else{
                            echo"<span class='error'>Page Deletion Error. </span>";
                        }
                    }
                ?>
	                
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Page Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					 <?php 
					 	$query="SELECT * FROM page";
						 $category=$db->select($query);
						 if($category){
							 $i=0;
							 while($result=$category->fetch_assoc()){
								 $i++;
					 ?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['menu'];?></td>
							<td><a href="editpage.php?editpageid=<?php echo $result['id']?>">Edit</a> || <a href="pagelist.php?delpageid=<?php echo $result['id']?>">Delete</a></td>
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
