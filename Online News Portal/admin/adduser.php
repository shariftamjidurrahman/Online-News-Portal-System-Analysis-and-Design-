<?php include"inc/header.php"; ?>


        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New User</h2>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $name = mysqli_real_escape_string($db->link, $_POST['name1']);
                        $email = strtolower(mysqli_real_escape_string($db->link, $_POST['email']));
                        $password = mysqli_real_escape_string($db->link, $_POST['pass']);

                        $role= mysqli_real_escape_string($db->link, $_POST['user']);
                        $details=$name.'\n'.$email;
                        
                            if (empty($role) || empty($email) || empty($name) || empty($password)) {
                                echo "<span class='error'>Field must not be empty</span>";
                                
                            }else{
                                
                                        
                                $query = "INSERT INTO user(name,email,password,role,details) 
                                        VALUES('$name','$email','$password','$role','$details')";
                                    $inserted_rows = $db->insert1($query);                        
                                    if ($inserted_rows) {
                                            echo'<span class="success">User has been added</span>';
                                    }else{
                                            echo'<span class="success">Error to add User/span>';
                                }
                                }
                            
                    }
                ?>
               <div class="block copyblock"> 
                 <form action="adduser.php" method="POST" enctype="multipart/form-data">
                    <table class="form">					
                        <tr>
                            <td>
					         <input type="text" class="medium" id="" placeholder="Name" name="name1">
                            </td>
                        </tr>
                        <tr>
                            <td>
					         <input type="email" class="medium" id="" placeholder="Email" name="email">
                            </td>
                        </tr>
                        <tr>
                            <td>
					         <input type="password" class="medium" id="" placeholder="Password" name="pass">
                            </td>
                        </tr>
                        <tr>
                        <td>
                            
    
                              <select id="select" name="user">
                                  <option value="0"> Select Role</option>
                                  <option value="admin">Admin</option>
                                    <option value="editor">Editor</option>
                                    <option value="subscriber">Subscriber</option>
                                    
                                </select>
                            </td>
                            </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Add User" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <?php include"inc/footer.php"; ?>
