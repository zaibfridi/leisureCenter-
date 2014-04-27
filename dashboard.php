<?php include_once ('core/config.php'); ?>
<?php 
session_start();
if(!isset($_SESSION['login']) ||  ($_SESSION['login']!= "1")) {
			header("Location: ".base_url."");
	}

?>

<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
  	<title> Leisure Center | Quotation Book </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css" href="<?=base_url?>details-form/index_files/style.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url?>details-form/index_files/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url?>details-form/index_files/jquery.datetimepicker.css"/>
    <!-- datepicker-->
    <link rel="stylesheet" type="text/css" href="<?=base_url?>details-form/index_files/detailstyle.css"/>
    <!-- //datepicker-->
    
    
	<script type="text/javascript" src="<?=base_url?>details-form/index_files/jquery-1.js"></script>
    <script type="text/javascript" src="<?=base_url?>details-form/index_files/jquery.js"></script>
    <script type="text/javascript" src="<?=base_url?>details-form/index_files/additional-methods.js"></script>
    <!-- datepicker-->
    <script type="text/javascript" src="<?=base_url?>details-form/index_files/jquery.datetimepicker.js"></script>
	<!--//datepicker-->
     <script type="text/javascript" src="<?=base_url?>js/bootstrap.min.js"></script>
    <!-- add more-->
    <link rel="stylesheet" href="<?=base_url?>details-form/index_files/stylesaddmore.css">
  	<link rel="stylesheet" href="<?=base_url?>details-form/index_files/styles-3addmore.css">
    <script src="<?=base_url?>details-form/index_files/modernizr-1.js"></script>
  	<!-- //add more-->
    <link href="<?=base_url?>css/bootstrap.min.css" rel="stylesheet">
   	
    
    
    
       
</head>

<body class="woodbg">
        <nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?=base_url?>dashboard.php"><img src="<?=base_url?>details-form/images/logo.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?=base_url?>dashboard.php">Dashboard</a></li>
            <li><a href="<?=base_url?>details-form/">Booking</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Setting <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?=base_url?>details-form/setting.php#groups">Groups</a></li>
            <li><a href="<?=base_url?>details-form/setting.php#categoris">Categoris</a></li>
            <li><a href="<?=base_url?>details-form/setting.php#items">Items</a></li>
            
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?=base_url?>logout.php">Logout</a></li>
            
        
      </ul>
      
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

        
      
    <style>
    #btn_goO:hover{ background-color:#eee; color:blue; }
    </style>
    

	<div class="smart-wrap" style="clear:both; margin-top:75px;">
    	<div class="smart-forms smart-container wrap-1">
        <?php /* ?>
      		<div class="col-sm-3 col-md-2 sidebar" style="background-color:#B5882E; padding-left:0 !important; padding-right:0 !important; border:2px solid #ccc;">
            <ul class="nav nav-sidebar">
            <li class="active"><a href="<?=base_url?>dashboard.php">Orders</a></li>
            <li><a href="<?=base_url?>details-form/setting.php#groups">Groups</a></li>
            <li><a href="<?=base_url?>details-form/setting.php#categoris">Categoris</a></li>
            <li><a href="<?=base_url?>details-form/setting.php#items">Items</a></li>
          </ul>
          </div>
		  <?php */ ?>
          <div style="float:right; margin-right:10px;"><form action="<?=base_url?>dashboard.php" enctype="multipart/form-data" name="search_form" id="search_form"><input type="text" placeholder="Search..." style="height: 32px; margin-top: 6px; padding: 5px ! important; width: 300px;" class="gui-input" name="search" id="search"><button type="submit" name="submit" class="btn btn-lg btn-primary btn-block" style="height: 32px; width: 56px; line-height: 12px; margin-top: 6px; margin-left: 5px; border: medium none;" id="btn_goO">GO</button></form></div>
          <div class="" style="word-wrap:break-word;padding-left:0 !important; padding-right:0 !important;border:1px solid #ccc;">
          		
                        <div class="" style="margin-bottom:0 !important;">
                            <div class="lc_label_name" style="border-radius:2px 2px 0 0; margin-left:0 !important;">Orders</div>
                        </div>
                        <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Customer Name</th>
                                  <th>Contact Person</th>
                                  <th>Date</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php if(!empty($ordersList)){ ?>
                              	<?php $i=1; ?>
                              	<?php foreach($ordersList as $order){ ?>
                                                <tr>
                                                  <td><?=$i?></td>
                                                  <td><?=$order['customer_name']?></td>
                                                  <td><?=$order['contact_person']?></td>
                                                  <td><?=$order['order_date']?></td>
                                                  <td><a href="#" style="color:#000;">PDF</a></td>
                                                </tr>
                                             <?php $i++; } ?>
                                <?php }else{ ?>
                                	 <td>Null</td>
                                  <td>Null</td>
                                  <td>Null</td>
                                  <td>Null</td>
                                  <td>Null</td>
                                <?php } ?>
                                
                              </tbody>
                        </table>
                 
          </div>
			
            
        </div><!-- end .smart-forms section -->
    </div>
    <!-- end .smart-wrap section -->
    
     


</body>
</html>