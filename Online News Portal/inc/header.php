<?php include'lib/Database.php';?>
<?php include'helpers/format.php';?>
<?php include'config/config.php';?>
<?php include'lib/Session.php';?>
<?php 
   
     $path =$_SERVER['SCRIPT_FILENAME'];
     $currentPage=basename($path,'.php');
      $db = new Database();
      $fm=new format();
      Session::init();
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">
         <link rel="stylesheet" href="css/bootstrap.min.css">

        <link rel="stylesheet" href="css/main.css">

    </head>
    <body>

  <nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">NEWS PORTAL</a>
    </div>

    <div class="navbar-collapse style= collapse in" id="bs-megadropdown-tabs" style="
    padding-left: 0px;">
        <ul class="nav navbar-nav">
            <li class="<?php if($currentPage =='index'){echo 'active';}?>"><a href="index.php"> HOME</a></li>
            <?php 
              $query="SELECT menu,categoryid FROM page WHERE 1";
              $menu=$db->select($query);
              if($menu){
                  while($result=$menu->fetch_assoc()){
            ?>
             <li  class="<?php if(isset ($_GET['catid']) && $_GET['catid']==$result['categoryid']){
                 echo'active';
                  }
                 ?>"><a href="page.php?catid=<?php echo $result['categoryid']?>"> <?php echo $result['menu'];?></a></li>
             <?php } 

             }?>
           
        </ul>
              
        <ul class="nav navbar-nav navbar-right">
          <form class="navbar-form navbar-left" role="search" method="GET" action="search.php">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search" name="search">
                  
                  <button type="submit" class="btn btn-default">Submit</button>
                  </div>
              </form>
              <?php 
                if(Session::get("login")==true){
                   $name=  Session::get('name');
                   $email= Session::get('email');
                if(isset($_GET['action']) && $_GET['action']=='logout'){
                           Session::destroy();
                           echo'<script>window.location="index.php";</script>';
                                 
                }
              
        echo '<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span> 
                        <strong>'.$name.'</strong>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul style="background-color:white;" class="dropdown-menu">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="text-center">
                                            <span class="glyphicon glyphicon-user icon-size"></span>
                                        </p>
                                    </div>
                                    
                                    
                                    <div class="col-lg-8">
                                        <p class="text-left"><strong>'.$name.'</strong></p>
                                        <p class="text-left small"> '.$email.'</p>
                                        
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                         
                     
                  
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>
                                            <a href="?action=logout" class="btn btn-danger btn-block">SIGN OUT</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>';
          }?>
                
            <li class="">
            <?php 
            
            if (Session::get('login')==false){

                  echo'<a href="/news/admin" >SIGN IN</a>';
            }?>
            </li>

             
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>