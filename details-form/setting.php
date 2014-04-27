<?php include('../core/config.php'); ?>
<?php 
session_start();
if(!isset($_SESSION['login']) ||  ($_SESSION['login']!= "1")) {
			header("Location: ".base_url."");
	}

?>

<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
  	<title> Leisure Center | Setting </title>
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
   
    
    <!--[if lte IE 9]>   
        <script type="text/javascript" src="js/jquery.placeholder.min.js"></script>
    <![endif]-->    
    
    <!--[if lte IE 8]>
        <link type="text/css" rel="stylesheet" href="css/smart-forms-ie8.css">
    <![endif]-->
    
    <script type="text/javascript">
	
		$(function() {
		
				/* @custom validation method (smartCaptcha) 
				------------------------------------------------------------------ */
				
					
					
				$.validator.methods.smartCaptcha = function(value, element, param) {
						return value == param;
				};
						
				$( "#add_range_of_pax" ).validate({
				
						/* @validation states + elements 
						------------------------------------------- */
						
						errorClass: "state-error",
						validClass: "state-success",
						errorElement: "em",
						
						/* @validation rules 
						------------------------------------------ */
							
						rules: {
								
								txt_add_nop_item: { required: true }
																															
							
						},
						
						/* @validation error messages 
						---------------------------------------------- */
							
						messages:{
								
								txt_add_nop_item: {required: 'Add The Range Of Persons'}
																												
						 
						},

						/* @validation highlighting + error placement  
						---------------------------------------------------- */	
						
						highlight: function(element, errorClass, validClass) {
								$(element).closest('.field').addClass(errorClass).removeClass(validClass);
						},
						unhighlight: function(element, errorClass, validClass) {
								$(element).closest('.field').removeClass(errorClass).addClass(validClass);
						},
						errorPlacement: function(error, element) {
						   if (element.is(":radio") || element.is(":checkbox")) {
									element.closest('.option-group').after(error);
						   } else {
									error.insertAfter(element.parent());
						   }
						}
								
				});
				$( "#add_category" ).validate({
				
						/* @validation states + elements 
						------------------------------------------- */
						
						errorClass: "state-error",
						validClass: "state-success",
						errorElement: "em",
						
						/* @validation rules 
						------------------------------------------ */
							
						rules: {
								
								txt_add_category: { required: true }
																															
							
						},
						
						/* @validation error messages 
						---------------------------------------------- */
							
						messages:{
								
								txt_add_category: {required: 'Add category'}
																												
						 
						},

						/* @validation highlighting + error placement  
						---------------------------------------------------- */	
						
						highlight: function(element, errorClass, validClass) {
								$(element).closest('.field').addClass(errorClass).removeClass(validClass);
						},
						unhighlight: function(element, errorClass, validClass) {
								$(element).closest('.field').removeClass(errorClass).addClass(validClass);
						},
						errorPlacement: function(error, element) {
						   if (element.is(":radio") || element.is(":checkbox")) {
									element.closest('.option-group').after(error);
						   } else {
									error.insertAfter(element.parent());
						   }
						}
								
				});	
				
				$( "#frm_sub_category" ).validate({
				
						/* @validation states + elements 
						------------------------------------------- */
						
						errorClass: "state-error",
						validClass: "state-success",
						errorElement: "em",
						
						/* @validation rules 
						------------------------------------------ */
							
						rules: {
								select_sub_categ: { required: true },
								txt_add_sub_categ: { required: true },
																															
							
						},
						
						/* @validation error messages 
						---------------------------------------------- */
							
						messages:{
								select_sub_categ: {required: 'Select sub category'},
								txt_add_sub_categ: {required: 'Add Sub category'},
																												
						 
						},

						/* @validation highlighting + error placement  
						---------------------------------------------------- */	
						
						highlight: function(element, errorClass, validClass) {
								$(element).closest('.field').addClass(errorClass).removeClass(validClass);
						},
						unhighlight: function(element, errorClass, validClass) {
								$(element).closest('.field').removeClass(errorClass).addClass(validClass);
						},
						errorPlacement: function(error, element) {
						   if (element.is(":radio") || element.is(":checkbox")) {
									element.closest('.option-group').after(error);
						   } else {
									error.insertAfter(element.parent());
						   }
						}
								
				});	
				
				$( "#add_item" ).validate({
				
						/* @validation states + elements 
						------------------------------------------- */
						
						errorClass: "state-error",
						validClass: "state-success",
						errorElement: "em",
						
						/* @validation rules 
						------------------------------------------ */
							
						rules: {
								txt_add_item_name: { required: true },
								select_add_item_categ: { required: true },
								select_sub_add_item_categ: { required: true }
																															
							
						},
						
						/* @validation error messages 
						---------------------------------------------- */
							
						messages:{
								txt_add_item_name: {required: 'Add name'},
								select_add_item_categ: {required: 'Select category'},
								select_sub_add_item_categ: {required: 'Select sub category'}
																												
						 
						},

						/* @validation highlighting + error placement  
						---------------------------------------------------- */	
						
						highlight: function(element, errorClass, validClass) {
								$(element).closest('.field').addClass(errorClass).removeClass(validClass);
						},
						unhighlight: function(element, errorClass, validClass) {
								$(element).closest('.field').removeClass(errorClass).addClass(validClass);
						},
						errorPlacement: function(error, element) {
						   if (element.is(":radio") || element.is(":checkbox")) {
									element.closest('.option-group').after(error);
						   } else {
									error.insertAfter(element.parent());
						   }
						}
								
				});
		
		});				
    
    </script>
    
    
       
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
      <a class="navbar-brand" href="<?=base_url?>"><img src="<?=base_url?>details-form/images/logo.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class=""><a href="<?=base_url?>dashboard.php">Dashboard</a></li>
            <li ><a href="<?=base_url?>details-form/">Booking</a></li>
        <li class="dropdown active">
          <a href="#" class="dropdown-toggle " data-toggle="dropdown">Setting <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?=base_url?>details-form/setting.php#groups">Groups</a></li>
            <li><a href="<?=base_url?>details-form/setting.php#categoris">Categories</a></li>
            <li><a href="<?=base_url?>details-form/setting.php#sub_category">Sub Categories</a></li>
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
    
    

	<div class="smart-wrap" style="clear:both; margin-top:75px;">
    	<div class="smart-forms smart-container wrap-1">
        
        	
          	<div class="form-body">
                <div class="spacer-b30" id="groups"><div class="tagline"><span> Edit In No of Pax  </span></div></div>
                <!-- .tagline -->
                <div class="frm-row">
                	<div style="border:1px solid #ccc; padding:10px; min-height:293px; margin-bottom:5px;">
                        <div class="section colm colm12 align-left">
                            <div class="lc_label_name">No of Pax</div>
                        </div>
                        <div class="section colm colm3 text-align align-right">
							Current List:
						</div>
                        <form action="<?=base_url?>details-form/setting.php" name="add_range_of_pax" id="add_range_of_pax" enctype="multipart/form-data" method="post">              
                        <div class="section colm colm8">
                        
							<label class="field select">
								<select id="no_of_pax" name="no_of_pax">
									<option value="">No of PAX</option>
									<?php foreach($paxList as $pax){ ?> 
										<option value="<?php echo $pax['nop_id']; ?>"><?php echo $pax['nop_name']; ?></option>
									<?php } ?>
								</select>
								<i class="arrow double"></i>                    
							</label>
                            
                            
						</div>
                        <div class="section colm colm3 text-align align-right">Add The Range Of Persons</div>
                        <div class="section colm colm8">
                        	       
							<label class="field prepend-icon" for="txt_add_nop_item">
							<input type="text" placeholder="Add No of pax" class="gui-input" id="txt_add_nop_item" name="txt_add_nop_item" value="">
							</label>
                             <?php if(isset($form_no_of_pax)){ ?>
                             	<em <?=$message_class?> for="<?=$form_no_of_pax?>"><?=$form_no_of_pax?></em>
                         	<?php } ?>
                             <button type="submit" name="form_no_of_pax" id="form_no_of_pax" class="button btn-primary" style="margin-top:10px;"> Save </button>
                         </div>
                         	
                         </form>
                        
                        
                       
                     </div>
                    </div>
                    
                <!-- // no of persons-->
                
                 <div class="spacer-b30" id="categoris" style="margin-top:25px;"><div class="tagline"><span> Edit In Category List </span></div></div>
                <!-- .tagline -->
                <div class="frm-row">
                	<div style="border:1px solid #ccc; padding:10px; min-height:293px;">
                        <div class="section colm colm12 align-left">
                            <div class="lc_label_name">Category</div>
                        </div>
                        <div class="section colm colm3 text-align align-right">
							Current Category List:
						</div>
                         <form action="<?=base_url?>details-form/setting.php" name="add_category" id="add_category" enctype="multipart/form-data" method="post">              
                        <div class="section colm colm8">
							<label class="field select">
								<select id="select_category" name="select_category">
									<option selected="selected" value="">------Categories-----</option>
                                <?php foreach($catList as $cat){ ?> 
										<option value="<?php echo $cat['cat_id']; ?>"><?php echo $cat['cat_name']; ?></option>
									<?php } ?>
								</select>
								<i class="arrow double"></i>                    
							</label>
						</div>
                        
                        <div class="section colm colm3 text-align align-right" id="categoris">Add the new category </div>
                        <div class="section colm colm8">
                        	        
							<label class="field prepend-icon" for="txt_add_category">
							<input type="text" placeholder="Add No of pax" class="gui-input" id="txt_add_category" name="txt_add_category" value="">
							</label>
                             <?php if(isset($form_add_new_category)){ ?>
                             	<em <?=$message_class?> for="<?=$form_add_new_category?>"><?=$form_add_new_category?></em>
                         	<?php } ?>
                             <button type="submit" name="form_add_new_category" class="button btn-primary" style="margin-top:10px;"> Save </button>
                         </div>
                         </form>
                        
                       
                     </div>
                    </div>
                    
                    
                    <div class="spacer-b30" id="sub_category" style="margin-top:25px;"><div class="tagline"><span> Add Sub-Category In Category List </span></div></div>
                <!-- .tagline -->
                <div class="frm-row">
                	<div style="border:1px solid #ccc; padding:10px; min-height:293px;" id="">
                        <div class="section colm colm12 align-left">
                            <div class="lc_label_name">Sub Category</div>
                        </div>
                        <div class="section colm colm3 text-align align-right">
							select the Category:
						</div>
                         <form action="<?=base_url?>details-form/setting.php" name="frm_sub_category" id="frm_sub_category" enctype="multipart/form-data" method="post">              
                        <div class="section colm colm8">
							<label class="field select">
								<select id="select_sub_categ" name="select_sub_categ">
									<option selected="selected" value="">------Categories-----</option>
                                <?php foreach($catList as $cat){ ?> 
										<option value="<?php echo $cat['cat_id']; ?>"><?php echo $cat['cat_name']; ?></option>
									<?php } ?>
								</select>
								<i class="arrow double"></i>                    
							</label>
						</div>
                        
                        <div class="section colm colm3 text-align align-right" id="" style="font-size:11px;">Add sub category in above category </div>
                        <div class="section colm colm8">
                        	        
							<label class="field prepend-icon" for="txt_add_sub_categ">
							<input type="text" placeholder="Add sub category in above category" class="gui-input" id="txt_add_sub_categ" name="txt_add_sub_categ" value="">
							</label>
                             <?php if(isset($form_add_sub_category)){ ?>
                             	<em <?=$message_class?> for="<?=$form_add_sub_category?>"><?=$form_add_sub_category?></em>
                         	<?php } ?>
                             <button type="submit" class="button btn-primary" name="form_add_sub_category" style="margin-top:10px;"> Save </button>
                         </div>
                         </form>
                        
                       
                     </div>
                    </div>
                    
                    
                    <!-- items-->
                    
                    	<div class="spacer-b30" id="items" style="margin-top:25px;"><div class="tagline"><span> Add Item </span></div></div>
                        <!-- .tagline -->
                        <div class="frm-row">
                            <div style=" padding:10px; min-height:700px;" id="">
                                <div class="section colm colm12 align-left">
                                    <div class="lc_label_name">Add Item</div>
                                </div>
                                <div class="section colm colm3 text-align align-right">
                                    Name of item:
                                </div>
                                 <form action="<?=base_url?>details-form/setting.php" name="add_item" id="add_item" enctype="multipart/form-data" method="post">              
                                <div class="section colm colm8">
                                    <label class="field prepend-icon" for="txt_add_item_name">
										<input type="text" placeholder="Name of item" class="gui-input" id="txt_add_item_name" name="txt_add_item_name" value="">
									</label>
                                </div>
                                
                        <div class="section colm colm3 text-align align-right">Select Category :</div>
                        
                        <div class="section colm colm8">
							<label class="field select">
								<select id="select_add_item_categ" name="select_add_item_categ">
									<option selected="selected" value="">------Categories-----</option>
                                <?php foreach($catList as $cat){ ?> 
										<option value="<?php echo $cat['cat_id']; ?>"><?php echo $cat['cat_name']; ?></option>
									<?php } ?>
								</select>
								<i class="arrow double"></i>                    
							</label>
						</div>
                        
                         <div class="section colm colm3 text-align align-right">Select Sub Category :</div>
                        
                        <div class="section colm colm8">
							<label class="field select">
								<select id="select_sub_add_item_categ" name="select_sub_add_item_categ">
									<option selected="selected" value="">------Sub Categories-----</option>
                                <?php foreach($subCatList as $subCat){ ?> 
										
                                        <option value="<?php echo $subCat['sub_id']; ?>"><?php echo $subCat['sub_name']; ?></option>
									<?php } ?>
								</select>
								<i class="arrow double"></i>                    
							</label>
						</div>
                        
                        
                        <?php foreach($paxList as $pax){ ?> 
                        <div class="section colm colm3 text-align align-right">Price On <?=$pax['nop_name']?></div>
                        
                        <div class="section colm colm8">
							<label class="field prepend-icon" for="add_nop_item">
										<input type="text" placeholder="Price On <?=$pax['nop_name']?> Items " class="gui-input" id="txt_add_nop_item_<?=$pax['nop_id']?>" name="txt_add_nop_item_<?=$pax['nop_id']?>" value="">
									</label>
						</div>
                        <?php } ?>
                        <?php if(isset($form_add_new_item)){ ?>
                             	<em <?=$message_class?> for="<?=$form_add_new_item?>"><?=$form_add_new_item?></em>
                         	<?php } ?>
                        
                        <button type="submit" class="button btn-primary"  name="form_add_new_item" style="margin-top:10px; margin-right:76px;"> Save </button>
                        
                         
                                 </form>
                                
                               
                             </div>
                            </div>
                    <!--//items-->
                
             </div>
             
            
			
            
        </div><!-- end .smart-forms section -->
    </div>
    <!-- end .smart-wrap section -->
    
     


</body>
</html>