<?php include_once ('../core/config.php'); ?>
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
				 $('#food_pick_up_time').datetimepicker({
					 mask:'9999/19/39 29:59'
					 });
					 
				 $('#food_service_time').datetimepicker({
					 mask:'9999/19/39 29:59'
					 });
					 
					 function cat_list(){
					 var catObj	=	'<?php echo json_encode($catList); ?>';
					 catObj		=	JSON.parse(catObj)
					 var list	=	"";
					 jQuery.each(catObj, function(i, obj) {
						 list	+=	'<option value="'+obj.cat_id+'">'+obj.cat_name+'</option>';
						 });
						 return list;
					 }
						 //alert(list);
					 
					 
					 /**************** add more *********************/
					 
					 

  var lastdeletedID, lastdeletedTEXT, lastdeletedINDEX, count = 0;
  
  function updateCounter(){
    $('.count').text(count);
	$('#hdn_count_1').val(count+1);
    var deleteButton = $('.clear-all');
    if(count === 0){
      //deleteButton.attr('disabled', 'disabled').addClass('disabled');
	  $('#remove_all').css("display","none");
    }
    else{
      //deleteButton.removeAttr('disabled').removeClass('disabled');
	  $('#remove_all').css("display","block");
    }
  }
  //generates a unique id
  function generateId(){
     return "reminder-" + +new Date();    
  }
  //saves an item to localStorage
  var saveReminder = function(id, content){
    localStorage.setItem(id, content);
  };
                                       
  var editReminder = function(id){
     var $this = $('#' + id);
     $this.focus()
          .append($('<button />', {
                        "class": "icon-save save-button", 
                         click: function(){
                                  
                                   $this.attr('contenteditable', 'false');

                                   var newcontent = $this.text(), saved = $('.save-notification');

                                   if(!newcontent) {
                                       var confirmation = confirm('Delete this item?');
                                       if(confirmation) {
                                          removeReminder(id);
                                       }
                                   }
                                   else{
                                        localStorage.setItem(id, newcontent);
                                        saved.show();
                                        setTimeout(function(){
                                           saved.hide();
                                        },2000);
                                        $(this).remove();
                                        $('.icon-pencil').show();
                                   }
                
                                }
                 
           }));                
   };
  
   //removes item from localStorage
   var deleteReminder = function(id, content){
     localStorage.removeItem(id);
     count--;
     updateCounter();
   };
 
   var UndoOption = function(){
      var undobutton = $('.undo-button');
      setTimeout(function(){
        undobutton.fadeIn(300).on('click', function(){
          createReminder(lastdeletedID, lastdeletedTEXT, lastdeletedINDEX);
          $(this).fadeOut(300);
        });
        setTimeout(function(){
          undobutton.fadeOut(1000);
        }, 3000);  
      },1000)
      
   };
 
   var removeReminder = function(id){
      var item = $('#' + id );
      lastdeletedID = id;
      lastdeletedTEXT = item.text();
      lastdeletedINDEX = item.index();
      
      item.addClass('removed-item')
          .one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(e) {
              $(this).remove();
           });

      deleteReminder(id);
     //add undo option only if the edited item is not empty
      if(lastdeletedTEXT){
        UndoOption();
      }
    };
   
    	var createReminder = function(id, content, index){
      /*var reminder = '<li id="' + id + '">' + content + '</li>',*/
	 	var catlistItems	=	 cat_list();
	 	listFoodNum = $('.reminders li');
	  	var listFoodNumber	=	listFoodNum.length+2;
	  	var reminder = '<li id="' + id + '"><div class="section colm colm3 align-left"><label class="field select"><select id="food_category_'+listFoodNumber+'" name="food_category_'+listFoodNumber+'"><option selected="selected" value="">------Categories-----</option>'+catlistItems+'</select><i class="arrow double"></i></label></div><div class="section colm colm3 align-left"><label for="Item_'+listFoodNumber+'" class="field prepend-icon"><input name="item_'+listFoodNumber+'" id="item_'+listFoodNumber+'" class="gui-input" placeholder="item" type="text"><label for="item_'+listFoodNumber+'" class="field-icon"><i class="fa fa-user"></i></label></label></div><div class="section colm colm3 align-left"><label for="no_of_items_'+listFoodNumber+'" class="field prepend-icon"><input name="no_of_items_'+listFoodNumber+'" id="no_of_items_'+listFoodNumber+'" class="gui-input" placeholder="No. Of Items" type="text"><label for="no_of_items_'+listFoodNumber+'" class="field-icon"><i class="fa fa-user"></i></label></label></div><div class="section colm colm3 align-left"><label for="cost_per_item_'+listFoodNumber+'" class="field prepend-icon"><input name="cost_per_item_'+listFoodNumber+'" id="cost_per_item_'+listFoodNumber+'" class="gui-input" placeholder="Cost Per Item" type="text"><label for="cost_per_item_'+listFoodNumber+'" class="field-icon"><i class="fa fa-user"></i></label></label></div></li>',
          list = $('.reminders li');
          
		  
		  
      
      if(!$('#'+ id).length){
        
        if(index && index < list.length){
          var i = index +1;
          reminder = $(reminder).addClass('restored-item');
          $('.reminders li:nth-child(' + i + ')').before(reminder);
        }
        if(index === 0){
          reminder = $(reminder).addClass('restored-item');
          $('.reminders').prepend(reminder);
        }
        if(index === list.length){
          reminder = $(reminder).addClass('restored-item');
          $('.reminders').append(reminder);
        }
        if(index === undefined){
          reminder = $(reminder).addClass('new-item');
          $('.reminders').append(reminder); 
        }
		
        var createdItem = $('#'+ id);
		createdItem.on('keydown', function(ev){
            if(ev.keyCode === 13) return false;
        });
        
        saveReminder(id, content);
        count++;
        updateCounter();
      }
    };
//handler for input
    var handleInput = function(){
          $('#btn_add_more').on('click', function(event){
             var input = $('#hidden_text'),
              value = input.val();
              event.preventDefault();
              if (value){ 
                  var text = value;
                  var id = generateId();
                  createReminder(id, text);
                   
              }
          });
     };
  
     var loadReminders = function(){
       if(localStorage.length!==0){
         for(var key in localStorage){
           var text = localStorage.getItem(key);
           if(key.indexOf('reminder') === 0){
             createReminder(key, text);
           }
         }
       }
     };
	 
	                  //remove items from DOM
              var items = $('li[id ^= reminder]');
              items.addClass('removed-item').one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(e) {
                $(this).remove();
             });

              //look for items in localStorage that start with reminder- and remove them
              var keys = [];
              for(var key in localStorage){ 
                 if(key.indexOf('reminder') === 0){

                   localStorage.removeItem(key);
                 }
              }
              count = 0;
              updateCounter();
            
  //handler for the "delete all" button
     var handleDeleteButton = function(){
          $('.clear-all').on('click', function(){
            if(confirm('Are you sure you want to delete all the items in the list? There is no turning back after that.')){                 //remove items from DOM
              var items = $('li[id ^= reminder]');
              items.addClass('removed-item').one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(e) {
                $(this).remove();
             });

              //look for items in localStorage that start with reminder- and remove them
              var keys = [];
              for(var key in localStorage){ 
                 if(key.indexOf('reminder') === 0){

                   localStorage.removeItem(key);
                 }
              }
              count = 0;
              updateCounter();
            }
          });
      };
  
    var init = function(){
           //$('#text').focus();
           loadReminders();
           handleDeleteButton();
           handleInput();
           updateCounter();
    };
	
  //start all
  init();
  
  
  /*--------------------------------------------*/
  
  var lastdeletedID2, lastdeletedTEXT2, lastdeletedINDEX2, count2 = 0;
  
  function updateCounter2(){
    $('.count2').text(count2);
	$('#hdn_count_2').val(count2+1);
    var deleteButton2 = $('.clear-all');
    if(count2 === 0){
      //deleteButton.attr('disabled', 'disabled').addClass('disabled');
	  $('#remove_all2').css("display","none");
    }
    else{
      //deleteButton.removeAttr('disabled').removeClass('disabled');
	  $('#remove_all2').css("display","block");
    }
	
  }
  
  function generateId2(){
     return "reminder2-" + +new Date();    
  }
  
  var saveReminder2 = function(id2, content2){
    localStorage.setItem(id2, content2);
  };
  
  var editReminder2 = function(id2){
     var $this2 = $('#' + id2);
     $this2.focus()
          .append($('<button />', {
                        "class": "icon-save save-button", 
                         click: function(){
                                  
                                   $this2.attr('contenteditable', 'false');

                                   var newcontent2 = $this2.text(), saved2 = $('.save-notification');

                                   if(!newcontent2) {
                                       var confirmation2 = confirm('Delete this item?');
                                       if(confirmation2) {
                                          removeReminder2(id2);
                                       }
                                   }
                                   else{
                                        localStorage.setItem(id2, newcontent2);
                                        saved2.show();
                                        setTimeout(function(){
                                           saved2.hide();
                                        },2000);
                                        $(this).remove();
                                        $('.icon-pencil').show();
                                   }
                
                                }
                 
           }));                
   };
   
   
  
   var deleteReminder2 = function(id2, content2){
     localStorage.removeItem(id2);
     count2--;
     updateCounter2();
   };
  
  var UndoOption2 = function(){
      var undobutton2 = $('.undo-button2');
      setTimeout(function(){
        undobutton2.fadeIn(300).on('click', function(){
          createReminder2(lastdeletedID2, lastdeletedTEXT2, lastdeletedINDEX2);
          $(this).fadeOut(300);
        });
        setTimeout(function(){
          undobutton2.fadeOut(1000);
        }, 3000);  
      },1000)
      
   };
  
  var removeReminder2 = function(id2){
      var item2 = $('#' + id2 );
      lastdeletedID2 = id2;
      lastdeletedTEXT2 = item2.text();
      lastdeletedINDEX2 = item2.index();
      
      item2.addClass('removed-item')
          .one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(e) {
              $(this).remove();
           });

      deleteReminder2(id2);
     //add undo option only if the edited item is not empty
      if(lastdeletedTEXT2){
        UndoOption2();
      }
    };
	
  
  var createReminder2 = function(id2, content2, index2){
      /*var reminder = '<li id="' + id + '">' + content + '</li>',*/
	  //if(list2 == 'undefined'){ list2.length	=	1;}
	  listNum = $('.reminders2 li');
	  var listNumber	=	listNum.length+2;
	  var reminder2 = '<li id="' + id2 + '"><div class="section colm colm3 align-left"><label for="name_of_other_item_'+listNumber+'" class="field prepend-icon"><input name="name_of_other_item_'+listNumber+'" id="name_of_other_item_'+listNumber+'" class="gui-input" placeholder="Name of other Item" type="text"><label for="name_of_other_item_'+listNumber+'" class="field-icon"><i class="fa fa-user"></i></label></label></div><div class="section colm colm3 align-left"><label for="no_of_other_items_'+listNumber+'" class="field prepend-icon"><input name="no_of_other_items_'+listNumber+'" id="no_of_other_items_'+listNumber+'" class="gui-input" placeholder="NO of Items" type="text"><label for="no_of_other_items_'+listNumber+'" class="field-icon"><i class="fa fa-user"></i></label></label></div><div class="section colm colm3 align-left"><label for="other_cost_per_item_'+listNumber+'" class="field prepend-icon"><input name="other_cost_per_item_'+listNumber+'" id="other_cost_per_item_'+listNumber+'" class="gui-input" placeholder="Cost Per Item" type="text"><label for="cost_per_item_'+listNumber+'" class="field-icon"><i class="fa fa-user"></i></label></label></div><div class="section colm colm3 align-left"><label for="total_cost_'+listNumber+'" class="field prepend-icon"><input name="total_cost_'+listNumber+'" id="total_cost_'+listNumber+'" class="gui-input" placeholder="Total Cost" type="text"><label for="total_cost_'+listNumber+'" class="field-icon"><i class="fa fa-user"></i></label></label></div></li>',
          list2 = $('.reminders2 li');
          
      
      if(!$('#'+ id2).length){
        
        if(index2 && index2 < list2.length){
          var i2 = index2 +1;
          reminder2 = $(reminder2).addClass('restored-item');
          $('.reminders2 li:nth-child(' + i2 + ')').before(reminder);
        }
        if(index2 === 0){
          reminder2 = $(reminder2).addClass('restored-item');
          $('.reminders2').prepend(reminder);
        }
        if(index2 === list2.length){
          reminder2 = $(reminder2).addClass('restored-item');
          $('.reminders2').append(reminder2);
        }
        if(index2 === undefined){
          reminder2 = $(reminder2).addClass('new-item');
          $('.reminders2').append(reminder2); 
        }
		
        var createdItem2 = $('#'+ id2);

       
				 
        createdItem2.on('keydown', function(ev){
            if(ev.keyCode === 13) return false;
        });
        
        saveReminder2(id2, content2);
        count2++;
        updateCounter2();
      }
    };
  
   var handleInput2 = function(){
          $('#btn_add_more2').on('click', function(event){
			 
             var input2 = $('#hidden_text2'),
              value2 = input2.val();
              event.preventDefault();
              if (value2){ 
                  var text2 = value2;
                  var id2 = generateId2();
                  createReminder2(id2, text2);
                   
              }
          });
     };
	 
   var loadReminders2 = function(){
       if(localStorage.length!==0){
         for(var key2 in localStorage){
           var text2 = localStorage.getItem(key2);
           if(key2.indexOf('reminder2') === 0){
             createReminder2(key2, text2);
           }
         }
       }
     };
	 
                           //remove items from DOM
              var items2 = $('li[id ^= reminder2]');
              items2.addClass('removed-item').one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(e) {
                $(this).remove();
             });

              //look for items in localStorage that start with reminder- and remove them
              var keys2 = [];
              for(var key2 in localStorage){ 
                 if(key2.indexOf('reminder2') === 0){

                   localStorage.removeItem(key2);
                 }
              }
              count2 = 0;
              updateCounter2();
            
          
  
   var handleDeleteButton2 = function(){
          $('.clear-all2').on('click', function(){
            if(confirm('Are you sure you want to delete all the items in the list? There is no turning back after that.')){                 //remove items from DOM
              var items2 = $('li[id ^= reminder2]');
              items2.addClass('removed-item').one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(e) {
                $(this).remove();
             });

              //look for items in localStorage that start with reminder- and remove them
              var keys2 = [];
              for(var key2 in localStorage){ 
                 if(key2.indexOf('reminder2') === 0){

                   localStorage.removeItem(key2);
                 }
              }
              count2 = 0;
              updateCounter2();
            }
          });
      };
  var init2 = function(){
           //$('#text').focus();
           loadReminders2();
           handleDeleteButton2();
           handleInput2();
           updateCounter2();
    };
  init2();


					 /******************* add more ********************/
					
				$.validator.methods.smartCaptcha = function(value, element, param) {
						return value == param;
				};
						
				$( "#smart-form" ).validate({
				
						/* @validation states + elements 
						------------------------------------------- */
						
						errorClass: "state-error",
						validClass: "state-success",
						errorElement: "em",
						
						/* @validation rules 
						------------------------------------------ */
							
						rules: {
								customer_name: { required: true },
								contact_person: { required: true },
								location: { required: true },
								telephone: { required: true },
								food_pick_up_time: { required: true },
								food_service_time: { required: true },
								no_of_pax_1: { required: true },
								party_type: { required: true },
								banquet_type: { required: true },
								gender:{ required: true },
								food_category_1:{ required: true },
								item_1:{ required: true },
								no_of_items_1:{ required: true },
								cost_per_item_1:{ required: true }																							
							
						},
						
						/* @validation error messages 
						---------------------------------------------- */
							
						messages:{
								customer_name: {required: 'Enter first name'},
								contact_person: {required: 'Enter last name'},
								location: {required: 'Enter Location'},	
								telephone: {required: 'Enter Telephone'},
								food_pick_up_time: {required: 'Select Food Pick Up Time'},	
								food_service_time: {required: 'Select Food Service Time'},
								no_of_pax_1: {required: 'Select No Of Person'},
								party_type: {required: 'Select Party Type'},
								banquet_type: {required: 'Select Banquet Type'},				
								gender:{required: 'Please choose Gender'},
								food_category_1: {required: 'Select Food Category'},
								item_1:{ required: 'Enter Name Item' },
								no_of_items_1:{ required: 'Enter No Item' },
								cost_per_item_1:{ required: 'Enter Cost Per Item' }																				
						 
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
      <a class="navbar-brand" href="<?=base_url?>dashboard.php"><img src="<?=base_url?>details-form/images/logo.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?=base_url?>dashboard.php">Dashboard</a></li>
            <li class="active"><a href="<?=base_url?>details-form/">Booking</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Setting <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?=base_url?>details-form/setting.php#groups">Groups</a></li>
            <li><a href="<?=base_url?>details-form/setting.php#categoris">Categoris</a></li>
            <li><a href="<?=base_url?>details-form/setting.php#items">Items</a></li>
            
          </ul>
        </li>
      </ul>
      
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

        
      
    
    

	<div class="smart-wrap" style="clear:both; margin-top:75px;">
    	<div class="smart-forms smart-container wrap-1">
      		
            <form novalidate method="post" action="<?=base_url?>details-form/index.php" id="smart-form" name="orderForm">
            	<div class="form-body">
                
                    <div class="spacer-b30">
                    	<div class="tagline"><span> Personal Detail </span></div><!-- .tagline -->
                    </div>
                    
                    
                    
                    <div class="frm-row">
                        <div class="section colm colm6 align-left">
                            <div class="lc_label_name">Customer Name</div>
                        </div>
                        <div class="section colm colm6 align-left">
                            <div class="lc_label_name">Contact Person</div>
                        </div>
                    </div>
                    
                    <div class="frm-row">
                    	<div class="section colm colm6">
                            <label for="customer_name" class="field prepend-icon">
                                <input name="customer_name" id="customer_name" class="gui-input" placeholder="Customer Name" type="text">
                                <label for="customer_name" class="field-icon"><i class="fa fa-user"></i></label>  
                            </label>
                        </div><!-- end section -->
                        
                        <div class="section colm colm6">
                            <label for="contact_person" class="field prepend-icon">
                                <input name="contact_person" id="contact_person" class="gui-input" placeholder="Contact Person" type="text">
                                <label for="contact_person" class="field-icon"><i class="fa fa-user"></i></label>  
                            </label>
                        </div><!-- end section -->
                    </div>
                    <!-- end .frm-row section -->
                    
                     <div class="frm-row">
                        <div class="section colm colm6 align-left">
                            <div class="lc_label_name">Location</div>
                        </div>
                        <div class="section colm colm6 align-left">
                            <div class="lc_label_name">Telephone</div>
                        </div>
                    </div>
                    
                    <div class="frm-row">
                        <div class="section colm colm6">
                            <label for="location" class="field prepend-icon">
                                <input name="location" id="location" class="gui-input" placeholder="Location" type="text">
                                <label for="location" class="field-icon"><i class="fa fa-user"></i></label>  
                            </label>
                        </div><!-- end section -->
                        
                        <div class="section colm colm6">
                            <label for="telephone" class="field prepend-icon">
                                <input name="telephone" id="telephone" class="gui-input" placeholder="Telephone" type="text">
                                <label for="telephone" class="field-icon"><i class="fa fa-user"></i></label>  
                            </label>
                        </div><!-- end section -->
                    </div><!-- end .frm-row section -->
                    
                    
                    <div class="frm-row">
                        <div class="section colm colm6 align-left">
                            <div class="lc_label_name">Food pick up time</div>
                        </div>
                        <div class="section colm colm6 align-left">
                            <div class="lc_label_name">Food service time</div>
                        </div>
                    </div>
                    
                    <div class="frm-row">
                        <div class="section colm colm6">
                            <label for="food_pick_up_time" class="field prepend-icon">
                                <input name="food_pick_up_time" id="food_pick_up_time" class="gui-input" placeholder="Food pick up time " type="text">
                                <label for="food_pick_up_time" class="field-icon"><i class="fa fa-user"></i></label>  
                            </label>
                        </div><!-- end section -->
                        
                        <div class="section colm colm6">
                            <label for="food_service_time" class="field prepend-icon">
                                <input name="food_service_time" id="food_service_time" class="gui-input" placeholder="Food service time" type="text">
                                <label for="food_service_time" class="field-icon"><i class="fa fa-user"></i></label>  
                            </label>
                        </div><!-- end section -->
                    </div><!-- end .frm-row section -->
                    
                    <div class="spacer-b30">
                    	<div class="tagline"><span> Banquet Details </span></div><!-- .tagline -->
                    </div>
                    
                    
                    <div class="frm-row">
                    	<div class="section colm colm6 align-left">
                            <div class="lc_label_name">No of PAX</div>
                        </div>
                     	<div class="section colm colm6">
                        <label class="field select">
                            <select id="no_of_pax_1" name="no_of_pax_1">
                                <option selected="selected" value="">Select No of PAX</option>
                                <?php foreach($paxList as $pax){ ?> 
										<option value="<?php echo $pax['nop_id']; ?>"><?php echo $pax['nop_name']; ?></option>
									<?php } ?>
                            </select>
                            <i class="arrow double"></i>                    
                        </label>  
                    </div>
                   	</div>
                    
                    <div class="frm-row">
                    	<div class="section colm colm6 align-left">
                            <div class="lc_label_name">Gender</div>
                        </div>
                     	<div class="section colm colm6">
                        <div class="option-group field">
                        		<label class="option" for="male">
                                    <input type="radio" value="male" id="male" name="gender">
                                    <span class="radio"></span> Male                 
                                </label>
                                <label class="option" for="female">
                                    <input type="radio" value="female" id="female" name="gender">
                                    <span class="radio"></span> Female                 
                                </label>
                                </div>
                        </div>
                   	</div>
                     
                     
                     
                      <div class="frm-row" >
                      	<div class="section colm colm6 align-left" style="border:1px solid #ccc;padding-top:5px; padding-bottom:5px; min-height: 142px; border-right:none;">
                        	<div class="lc_label_name" style="">Party Type</div>
                            <div class="option-group field">
                            
                                <label class="option" style="min-width:115px; margin-top:5px;">
                                    <input name="party_type[]" value="buffet" type="checkbox">
                                    <span class="checkbox"></span>Buffet            
                                </label>
                          
                                <label class="option" style="min-width:115px; margin-top:5px;">
                                    <input name="party_type[]" value="sit_down" type="checkbox">
                                    <span class="checkbox"></span>Sit Dwon              
                                </label>
                                
                                <label class="option" style="min-width:115px; margin-top:5px;">
                                    <input name="party_type[]" value="coctail" type="checkbox">
                                    <span class="checkbox"></span>Coctail            
                                </label> 
                                <label class="option" style="min-width:115px; margin-top:5px;">
                                    <input name="party_type[]" value="vip_party" type="checkbox">
                                    <span class="checkbox"></span>VIP Party              
                                </label>
                                
                                <label class="option" style="min-width:115px; margin-top:5px;">
                                    <input name="party_type[]" value="other" type="checkbox">
                                    <span class="checkbox"></span>Other            
                                </label>                                
                                
                            </div>
                            
                        	
                        </div>
                        
                        <div class="section colm colm6 align-left" style="border:1px solid #ccc;padding-top:5px; padding-bottom:5px; min-height: 142px;">
                        	<div class="lc_label_name" style="">Banquet Type</div>
                            <div class="option-group field">
                            
                                <label class="option" style="min-width:115px; margin-top:5px;">
                                    <input name="banquet_type[]" value="coffee" type="checkbox">
                                    <span class="checkbox"></span>Coffee            
                                </label>
                          
                                <label class="option" style="min-width:115px; margin-top:5px;">
                                    <input name="banquet_type[]" value="dinner" type="checkbox">
                                    <span class="checkbox"></span>Dinner              
                                </label>
                                
                                <label class="option" style="min-width:115px; margin-top:5px;">
                                    <input name="banquet_type[]" value="iftar" type="checkbox">
                                    <span class="checkbox"></span>Iftar            
                                </label> 
                                <label class="option" style="min-width:115px; margin-top:5px;">
                                    <input name="banquet_type[]" value="lunch" type="checkbox">
                                    <span class="checkbox"></span>Lunch              
                                </label>
                                
                                <label class="option" style="min-width:115px; margin-top:5px;">
                                    <input name="banquet_type[]" value="meals" type="checkbox">
                                    <span class="checkbox"></span>Meals            
                                </label>
                                <label class="option" style="min-width:115px; margin-top:5px;">
                                    <input name="banquet_type[]" value="sohour" type="checkbox">
                                    <span class="checkbox"></span>Sohour              
                                </label>
                                
                                                               
                                
                            </div>
                        	
                        </div>
                        
                      </div>
                      
                     
                     <div class="spacer-b30">
                    	<div class="tagline"><span> Food Details </span></div><!-- .tagline -->
                    </div>
                    <div class="frm-row">
                    	<div class="section colm colm3 align-left">
                        	<div class="lc_label_name" style="">Select Category</div>
                             <label class="field select">
                            <select id="food_category_1" name="food_category_1">
                                <option selected="selected" value="">------Categories-----</option>
                                <?php foreach($catList as $cat){ ?> 
										<option value="<?php echo $cat['cat_id']; ?>"><?php echo $cat['cat_name']; ?></option>
									<?php } ?>
                            </select>
                            <i class="arrow double"></i>                    
                        </label>
                        </div>
                    	<div class="section colm colm3 align-left">
                        	<div class="lc_label_name" style="">Name of Item</div>
                             <label for="item_1" class="field prepend-icon">
                                <input name="item_1" id="item_1" class="gui-input" placeholder="item" type="text">
                                <label for="item_1" class="field-icon"><i class="fa fa-user"></i></label>  
                            </label>
                        </div>
                        <div class="section colm colm3 align-left">
                        	<div class="lc_label_name" style="">No. Of Items</div>
                             <label for="no_of_items_1" class="field prepend-icon">
                                <input name="no_of_items_1" id="no_of_items_1" class="gui-input" placeholder="No. Of Items" type="text">
                                <label for="no_of_items_1" class="field-icon"><i class="fa fa-user"></i></label>  
                            </label>
                        </div>
                        <div class="section colm colm3 align-left">
                        	<div class="lc_label_name" style="">Cost Per Item</div>
                             <label for="cost_per_item_1" class="field prepend-icon">
                                <input name="cost_per_item_1" id="cost_per_item_1" class="gui-input" placeholder="Cost Per Item" type="text">
                                <label for="cost_per_item_1" class="field-icon"><i class="fa fa-user"></i></label>  
                            </label>
                        </div>
                        
                        <ul class="reminders" style="clear:both; padding-left:0 !important;"></ul>
                    </div>
                    
                    
                    <div class="frm-row" style="margin:0 auto;">
                    <input id="hidden_text" placeholder="Remind me to.." type="hidden" value="dumy_text">
      <!--<input id="btn_add_more" value="Add" type="button">-->
                    	<button id="btn_add_more" type="button" class="button btn-primary" style="width:100%; margin:0 auto !important; float:none;">Add More Item</button>
                        <span style="display:none" class="count">0</span><br><br>
                        <input type="hidden" value="1" id="hdn_count_1" name="hdn_count_1">
      					<button style="display:none; width:100%; margin:0 auto !important; float:none; margin-top:10px; background-color:#1A3181 !important;" id="remove_all" class="clear-all button btn-primary" type="button">Remove All</button>
                    </div>
                    
                    
                     
                         
                         <br><br>
                         	<div class="spacer-b30">
                    			<div class="tagline"><span> Other Items </span></div><!-- .tagline -->
                    		</div>
                    
                                                  
                
                <div class="frm-row">
                
                		<div class="section colm colm3 align-left">
                        	<div class="lc_label_name" style="">Name of other Item</div>
                             <label for="name_of_other_item_1" class="field prepend-icon">
                                <input name="name_of_other_item_1" id="name_of_other_item_1" class="gui-input" placeholder="Name of other Item" type="text">
                                <label for="name_of_other_item_1" class="field-icon"><i class="fa fa-user"></i></label>  
                            </label>
                        </div>
                        
                    	<div class="section colm colm3 align-left">
                        	<div class="lc_label_name" style="">NO of Items</div>
                             <label for="no_of_other_items_1" class="field prepend-icon">
                                <input name="no_of_other_items_1" id="no_of_other_items_1" class="gui-input" placeholder="NO of Items" type="text">
                                <label for="no_of_other_items_1" class="field-icon"><i class="fa fa-user"></i></label>  
                            </label>
                        </div>
                        <div class="section colm colm3 align-left">
                        	<div class="lc_label_name" style="">Cost Per Item</div>
                             <label for="other_cost_per_item_1" class="field prepend-icon">
                                <input name="other_cost_per_item_1" id="other_cost_per_item_1" class="gui-input" placeholder="Cost Per Item" type="text">
                                <label for="other_cost_per_item_1" class="field-icon"><i class="fa fa-user"></i></label>  
                            </label>
                        </div>
                        <div class="section colm colm3 align-left">
                        	<div class="lc_label_name" style="">Total Cost</div>
                             <label for="total_cost_1" class="field prepend-icon">
                                <input name="total_cost_1" id="total_cost_1" class="gui-input" placeholder="Total Cost" type="text">
                                <label for="total_cost_1" class="field-icon"><i class="fa fa-user"></i></label>  
                            </label>
                        </div>
                        
                        <ul class="reminders2" style=" list-style:none; clear:both; padding-left:0 !important;"></ul>
                    </div>
                    
                    <div class="frm-row" style="margin:0 auto;">
                    <input id="hidden_text2" placeholder="Remind me to.." type="hidden" value="dumy_text">
      <!--<input id="btn_add_more" value="Add" type="button">-->
                    	<button id="btn_add_more2" type="button" class="button btn-primary" style="width:100%; margin:0 auto !important; float:none;">Add More Item</button>
                        <span style="display:none" class="count2">0</span><br><br>
                        <input type="hidden" value="1" id="hdn_count_2" name="hdn_count_2">
      					<button style="display:none; width:100%; margin:0 auto !important; float:none; margin-top:10px; background-color:#1A3181 !important;" id="remove_all2" class="clear-all2 button btn-primary" type="button">Remove All</button>
                    </div>
                       
                       
                       <br><br>
                         	<div class="spacer-b30">
                    			<div class="tagline"><span>Grand Total </span></div><!-- .tagline -->
                    		</div>
                            <div class="frm-row">
                    	<div class="section colm colm4 align-left">
                        	<div class="lc_label_name" style="">All Foods Cost</div>
                             <label for="all_foods_cost" class="field prepend-icon">
                                <input name="all_foods_cost" id="all_foods_cost" class="gui-input" placeholder="All Foods Cost" type="text">
                                <label for="all_foods_cost" class="field-icon"><i class="fa fa-user"></i></label>  
                            </label>
                        </div>
                        <div class="section colm colm4 align-left">
                        	<div class="lc_label_name" style="">All Other Cost</div>
                             <label for="all_other_cost" class="field prepend-icon">
                                <input name="all_other_cost" id="all_other_cost" class="gui-input" placeholder="All Other Cost" type="text">
                                <label for="all_other_cost" class="field-icon"><i class="fa fa-user"></i></label>  
                            </label>
                        </div>
                        <div class="section colm colm4 align-left">
                        	<div class="lc_label_name" style="">Total Cost</div>
                             <label for="total_cost2" class="field prepend-icon">
                                <input name="total_cost2" id="total_cost2" class="gui-input" placeholder="Total Cost" type="text">
                                <label for="total_cost2" class="field-icon"><i class="fa fa-user"></i></label>  
                            </label>
                        </div>
                        
                        
                    </div>
                       
                                      
                    
                </div><!-- end .form-body section -->
                <div class="form-footer">
                	<button type="submit" name="submit_orderform" id="submit_orderform" class="button btn-primary"> Submit </button>
                    <button type="reset" class="button"> Cancel </button>
                </div><!-- end .form-footer section -->
            </form>
			
            
        </div><!-- end .smart-forms section -->
    </div>
    <!-- end .smart-wrap section -->
    
     


</body>
</html>