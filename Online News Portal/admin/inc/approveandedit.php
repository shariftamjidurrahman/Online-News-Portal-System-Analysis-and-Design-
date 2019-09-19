<?php
if(!isset($_GET['delpostid'])  || $_GET['delpostid']==NULL){
       
    

	}else{
        $id = $_GET['delpostid'];
		$query="DELETE FROM newspost
        WHERE post_id='$id'";

		$post=$db->delete($query);
		
        echo $post;
	}
if(!isset($_GET['approvepostid'])  || $_GET['approvepostid']==NULL){
  
} else{
        $id1 = $_GET['approvepostid'];
		$query1="UPDATE newspost 
		SET
		approved='yes'
		WHERE post_id='$id1'";

		$approved=$db->update($query1);
		if($approved){
            echo "<span style='color:#fff;'>News Post Approved Successfully. </span>";
           
		}else{
			 echo "<span style='color:#fff;'>News Post Not Approved Successfully. </span>";

		}

	}
if(!isset($_GET['rejectpostid'])  || $_GET['rejectpostid']==NULL){
  
} else{
        $id1 = $_GET['rejectpostid'];
		$query1="UPDATE newspost 
		SET
		approved='no'
		WHERE post_id='$id1'";

		$approved=$db->update($query1);
		if($approved){
            echo "<span style='color:#fff;'>News Post Rejected Successfully. </span>";
            
		}else{
			 echo "<span style='color:#fff;'>News Post Not Approved Successfully. </span>";

		}

	}
    
?>