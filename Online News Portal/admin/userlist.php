<?php include"inc/header.php"; ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>User List</h2>
				<?php
                if(!isset($_GET['deluserid'])  || $_GET['deluserid']==NULL){
                    
                    

                    }else{
                        $id = $_GET['deluserid'];
                        $query="DELETE FROM user
                        WHERE id='$id'";

                        $post=$db->delete1($query);
                        
                        if($post){
                            echo"<span class='success'>User Deleted Successfully. </span>";
                        }else{
                            echo"<span class='error'>User Deletion Error. </span>";
                        }
                    }
                ?>
	                
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>User Name</th>
                            <th>Role</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					 <?php 
					 	$query="SELECT * FROM user";
						 $user=$db->select($query);
						 if($user){
							 $i=0;
							 while($result=$user->fetch_assoc()){
								 $i++;
					 ?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['name'];?></td>
                            <td><?php echo $result['role'];?></td>
							<td><a href="userlist.php?deluserid=<?php echo $result['id'];?>">Delete</a></td>
						</tr>
						<?php }
						 }else{
						    echo "No User to Display";
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
