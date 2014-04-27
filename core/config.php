<?php
// Database Credentials


define ('DB_HOST', 'localhost');
define ('DB_USER', 'root');
define ('DB_PASS', '');
define ('DB_NAME', 'db_leisure_center');
define ('base_url', 'http://localhost/leisure_center/');

/*
define ('DB_HOST', 'localhost');
define ('DB_USER', 'ebucket_user');
define ('DB_PASS', 'e7~5sdEgtU^Q');
define ('DB_NAME', 'ebucket_db_liesure');
define ('base_url', 'http://ebucketshop.com/demo/leisure_center/');
*/

/*
database	name		=	ebucket_db_liesure
database	username	=	ebucket_ebucket
database 	password	=	J$o7*0B*oio8
//e7~5sdEgtU^Q
user “ebucket_user” with password “e7~5sdEgtU^Q”.
*/

define ('DOC_ROOT', dirname (dirname ( dirname ( __FILE__ ))));
define ('LIB', DOC_ROOT . '/cc-core/lib');
define ('DATE_FORMAT', 'Y-m-d H:i:s');

date_default_timezone_set ('America/New_York');
$con 		=	mysql_connect(DB_HOST,DB_USER,DB_PASS);
if(!$con){die('Connection Failed'.mysql_error());}
mysql_select_db(DB_NAME,$con);
// ** fetch person list **
$query	=	"Select * from tb_no_of_pax";
$result	=	mysql_query($query);
while($no_pax_list	=	mysql_fetch_assoc($result)){
		$paxList[]	=$no_pax_list;	
	}
//--------------------------------------------------------------------------------------|
//** fetch categories
function catList(){
$query2	=	"Select * from tb_category";
$result2	=	mysql_query($query2);
while($cat_list	=	mysql_fetch_assoc($result2)){
		$catList[]	=$cat_list;	
	}
	return $catList;
}
$catList	=	catList();

//--------------------------------------------------------------------------------------|
//--------------------------------------------------------------------------------------|
//** fetch sub categories
function subCatList(){ 
$query3	=	"Select * from tb_sub_cat";
$result3	=	mysql_query($query3);
while($sub_cat_list	=	mysql_fetch_assoc($result3)){
		$subCatList[]	=$sub_cat_list;	
	}
	return $subCatList;
}
$subCatList	=	subCatList();

//--------------------------------------------------------------------------------------|
								//Order form
//--------------------------------------------------------------------------------------|
if (isset($_POST['submit_orderform'])){
	
			if (!empty ($_POST['customer_name'])) {
				$customer_name = htmlspecialchars (trim ($_POST['customer_name']));
				} else {
					$errors['customer_name'] = 'Fill Customer Name';
					}
			if (!empty ($_POST['contact_person'])) {
				$contact_person = htmlspecialchars (trim ($_POST['contact_person']));
				} else {
					$errors['contact_person'] = 'Fill Contact Person';
					}
			if (!empty ($_POST['location'])) {
				$location = htmlspecialchars (trim ($_POST['location']));
				} else {
					$errors['location'] = 'Fill location';
					}
			if (!empty ($_POST['telephone'])) {
				$telephone = htmlspecialchars (trim ($_POST['telephone']));
				} else {
					$errors['telephone'] = 'Fill telephone';
					}
			if ((!empty ($_POST['food_pick_up_time'])) && ($_POST['food_pick_up_time'] != "____/__/__ __:__")) {
				$food_pick_up_time =  (trim ($_POST['food_pick_up_time']));
				} else {
					$errors['food_pick_up_time'] = 'Select Food Pick Up Time';
					}
			if ((!empty ($_POST['food_service_time'])) && ($_POST['food_service_time'] != "____/__/__ __:__")) {
				$food_service_time =  (trim ($_POST['food_service_time']));
				} else {
					$errors['food_service_time'] = 'Select Food Service Time';
					}
			if (!empty ($_POST['no_of_pax_1'])) {
				$no_of_pax_1 =  (trim ($_POST['no_of_pax_1']));
				} else {
					$errors['no_of_pax_1'] = 'Select no of pax';
					}
			if (isset($_POST['gender']) && (!empty ($_POST['gender']))) {
				$gender =  (trim ($_POST['gender']));
				} else {
					$errors['gender'] = 'Select gender';
					}
					$string_party_type	=	"";
			if((isset($_POST['party_type'])) && (!empty($_POST['party_type']))){
				foreach($_POST['party_type'] as $partyKey => $value){
						$data[$value]	=	$value;	
						$string_party_type .= $value.",";
					}
				}else {
					$errors['party_type'] = 'Select Party Type';
					}
					$string_banquet_type	=	"";
			if((isset($_POST['banquet_type'])) && (!empty($_POST['banquet_type']))){
				foreach($_POST['banquet_type'] as $partyKey => $value){
						$data[$value]	=	$value;	
						$string_banquet_type .= $value.",";
					}
				}else {
					$errors['banquet_type'] = 'Select Banquet Type';
					}
			if (!empty ($_POST['all_foods_cost'])) {
				$all_foods_cost =  (trim ($_POST['all_foods_cost']));
				} else {
					$errors['all_foods_cost'] = 'Fill all foods cost';
					}
			if (!empty ($_POST['all_other_cost'])) {
				$all_other_cost =  (trim ($_POST['all_other_cost']));
				} else {
					$errors['all_other_cost'] = 'Fill all other cost';
					}
			if (!empty ($_POST['total_cost2'])) {
				$total_cost2 =  (trim ($_POST['total_cost2']));
				} else {
					$errors['total_cost2'] = 'Fill all total cost';
					}
			$string1		=	"";
			if($_POST['hdn_count_1'] >1){
					for($i=1; $i<=$_POST['hdn_count_1']; $i++){
							$food_category	=	"food_category_".$i;
							$item			=	"item_".$i;
							$no_of_items	=	"no_of_items_".$i;
							$cost_per_item	=	"cost_per_item_".$i;
							
							if (!empty ($_POST[$food_category])) {
									$data[$food_category] =  (trim ($_POST[$food_category]));
									$string1	.=	"{".$food_category.":".$_POST[$food_category]."}";
									
								}
							if (!empty ($_POST[$item])) {
									$data[$item] =  (trim ($_POST[$item]));
									$string1	.=	"{".$item.":".$_POST[$item]."}";
								}
							if (!empty ($_POST[$no_of_items])) {
									$data[$no_of_items] =  (trim ($_POST[$no_of_items]));
									$string1	.=	"{".$no_of_items.":".$_POST[$no_of_items]."}";
								}
							if (!empty ($_POST[$cost_per_item])) {
									$data[$cost_per_item] =  (trim ($_POST[$cost_per_item]));
									$string1	.=	"{".$cost_per_item.":".$_POST[$cost_per_item]."}";
								}
						}
				}else{
							$i=1;
							$food_category	=	"food_category_".$i;
							$item			=	"item_".$i;
							$no_of_items	=	"no_of_items_".$i;
							$cost_per_item	=	"cost_per_item_".$i;
							if (!empty ($_POST[$food_category])) {
									$data[$food_category] =  (trim ($_POST[$food_category]));
									$string1	.=	"{".$food_category.":".$_POST[$food_category]."}";
								}
							if (!empty ($_POST[$item])) {
									$data[$item] =  (trim ($_POST[$item]));
									$string1	.=	"{".$item.":".$_POST[$item]."}";
								}
							if (!empty ($_POST[$no_of_items])) {
									$data[$no_of_items] =  (trim ($_POST[$no_of_items]));
									$string1	.=	"{".$no_of_items.":".$_POST[$no_of_items]."}";
								}
							if (!empty ($_POST[$cost_per_item])) {
									$data[$cost_per_item] =  (trim ($_POST[$cost_per_item]));
									$string1	.=	"{".$cost_per_item.":".$_POST[$cost_per_item]."}";
								}
					
					}
			$string2	=	"";
			if($_POST['hdn_count_2'] >1){
					for($i=1; $i<=$_POST['hdn_count_2']; $i++){
							$name_of_other_item		=	"name_of_other_item_".$i;
							$no_of_other_items		=	"no_of_other_items_".$i;
							$other_cost_per_item	=	"other_cost_per_item_".$i;
							$total_cost				=	"total_cost_".$i;
							if (!empty ($_POST[$name_of_other_item])) {
									$data[$name_of_other_item] =  (trim ($_POST[$name_of_other_item]));
									$string2	.=	"{".$name_of_other_item.":".$_POST[$name_of_other_item]."}";
								}
							if (!empty ($_POST[$no_of_other_items])) {
									$data[$no_of_other_items] =  (trim ($_POST[$no_of_other_items]));
									$string2	.=	"{".$no_of_other_items.":".$_POST[$no_of_other_items]."}";
								}
							if (!empty ($_POST[$other_cost_per_item])) {
									$data[$other_cost_per_item] =  (trim ($_POST[$other_cost_per_item]));
									$string2	.=	"{".$other_cost_per_item.":".$_POST[$other_cost_per_item]."}";
								}
							if (!empty ($_POST[$total_cost])) {
									$data[$total_cost] =  (trim ($_POST[$total_cost]));
									$string2	.=	"{".$total_cost.":".$_POST[$total_cost]."}";
								}
						}
				}else{
						$i=1;
						$name_of_other_item		=	"name_of_other_item_".$i;
						$no_of_other_items		=	"no_of_other_items_".$i;
						$other_cost_per_item	=	"other_cost_per_item_".$i;
						$total_cost				=	"total_cost_".$i;
						if (!empty ($_POST[$name_of_other_item])) {
								$data[$name_of_other_item] =  (trim ($_POST[$name_of_other_item]));
								$string2	.=	"{".$name_of_other_item.":".$_POST[$name_of_other_item]."}";
							}
						if (!empty ($_POST[$no_of_other_items])) {
								$data[$no_of_other_items] =  (trim ($_POST[$no_of_other_items]));
								$string2	.=	"{".$no_of_other_items.":".$_POST[$no_of_other_items]."}";
							}
						if (!empty ($_POST[$other_cost_per_item])) {
								$data[$other_cost_per_item] =  (trim ($_POST[$other_cost_per_item]));
								$string2	.=	"{".$other_cost_per_item.":".$_POST[$other_cost_per_item]."}";
							}
						if (!empty ($_POST[$total_cost])) {
								$data[$total_cost] =  (trim ($_POST[$total_cost]));
								$string2	.=	"{".$total_cost.":".$_POST[$total_cost]."}";
							}
						
					
					}
					if(empty($errors)){
							$query4	= "INSERT INTO tb_orders (od_id, customer_name, contact_person, location, telephone, food_pick_up_time, food_service_time, no_of_pax_1, all_foods_cost, all_other_cost, total_cost2, gender, order_date,all_food_details,all_other_items,party_type,banquet_type)
														VALUES (NULL, '".$customer_name."', '".$contact_person."', '".$location."', '".$telephone."', '".$food_pick_up_time."', '".$food_service_time."', '".$no_of_pax_1."', '".$all_foods_cost."', '".$all_other_cost."', '".$total_cost2."', '".$gender."','".date('Y-m-d H:i:s')."','".$string1."','".$string2."','".$string_party_type."','".$string_banquet_type."');";		
														$result4	=	mysql_query($query4);
						}	
					
					
	}

//--------------------------------------------------------------------------------------|
//** fetch sub orders record
$query5	=	"Select customer_name,contact_person,order_date from tb_orders";
$result5	=	mysql_query($query5);
while($orders_list	=	mysql_fetch_assoc($result5)){
		$ordersList[]	=$orders_list;	
	}
//--------------------------------------------------------------------------------------|
if(isset($_POST['form_no_of_pax'])){
	
		
		if (!empty ($_POST['txt_add_nop_item'])) {
				$txt_add_nop_item =  (trim ($_POST['txt_add_nop_item']));
				} else {
					$errors1['txt_add_nop_item'] = 'Add The Range Of Persons';
					}
		if(empty($errors1)){
			
				$query6	=	"INSERT INTO tb_no_of_pax (nop_id ,nop_name)VALUES ( NULL , '".$txt_add_nop_item."');";
				if(mysql_query($query6)){ $form_no_pax_message	=	"Range Successfully Added"; $message_class='style="color:green;"';}else{ $form_no_pax_message	=	"Something Wrong ! try later"; $message_class='style="color:red;"';}
					
			}
		
	
	}
	 
//--------------------------------------------------------------------------------------|
if(isset($_POST['form_add_new_category'])){
		
		
		if (!empty ($_POST['txt_add_category'])) {
				$txt_add_category =  (trim ($_POST['txt_add_category']));
				} else {
					$errors2['txt_add_category'] = 'Add the new category';
					}
		if(empty($errors2)){
					$query7	=	"INSERT INTO tb_category(cat_id, cat_name) VALUES (NULL, '".$txt_add_category."');";
					if(mysql_query($query7)){ $form_add_new_category	=	"Category Successfully Added"; $message_class='style="color:green;"'; $catList	=	catList(); $subCatList	=	subCatList();}else{ $form_add_new_category	=	"Something Wrong ! try later"; $message_class='style="color:red;"'; $catList	=	catList(); $subCatList	=	subCatList();}
					
			}
	
	}
//--------------------------------------------------------------------------------------|
if(isset($_POST['form_add_sub_category'])){
	
		if (!empty ($_POST['select_sub_categ'])) {
				$select_sub_categ =  (trim ($_POST['select_sub_categ']));
				} else {
					$errors3['select_sub_categ'] = 'Select category';
					}
		if (!empty ($_POST['txt_add_sub_categ'])) {
				$txt_add_sub_categ =  (trim ($_POST['txt_add_sub_categ']));
				} else {
					$errors3['txt_add_sub_categ'] = 'Add sub category in above category';
					}
		if(empty($errors3)){
					$query8	=	"INSERT INTO tb_sub_cat(sub_id,sub_cat_id,sub_name) VALUES (NULL, '".$select_sub_categ."', '".$txt_add_sub_categ."');";
					if(mysql_query($query8)){ $form_add_sub_category	=	"Sub-Category Successfully Added"; $message_class='style="color:green;"'; $catList	=	catList(); $subCatList	=	subCatList(); }else{ $form_add_sub_category	=	"Something Wrong ! try later"; $message_class='style="color:red;"'; $catList	=	catList(); $subCatList	=	subCatList();}
			}
	}
//--------------------------------------------------------------------------------------|
if(isset($_POST['form_add_new_item'])){
		
		if (!empty ($_POST['txt_add_item_name'])) {
				$txt_add_item_name =  (trim ($_POST['txt_add_item_name']));
				} else {
					$errors4['txt_add_item_name'] = 'Fill Name of item';
					}
		if (!empty ($_POST['select_add_item_categ'])) {
				$select_add_item_categ =  (trim ($_POST['select_add_item_categ']));
				} else {
					$errors4['select_add_item_categ'] = 'Select Category';
					}
		if (!empty ($_POST['select_sub_add_item_categ'])) {
				$select_sub_add_item_categ =  (trim ($_POST['select_sub_add_item_categ']));
				} else {
					$errors4['select_sub_add_item_categ'] = 'Select Sub Category';
					}
		$string_item_price	=	"";
		foreach($paxList as $pax){
			$txt_add_nop_item	=	"txt_add_nop_item_".$pax['nop_id'];
            if (!empty ($_POST[$txt_add_nop_item])) {
				//$txt_add_nop_item =  (trim ($_POST[$txt_add_nop_item]));
				$string_item_price	.= '{"'.$pax['nop_name'].'":"'.$_POST[$txt_add_nop_item].'"},';
				} else {
					$errors4[$txt_add_nop_item] = "Price On ".$pax['nop_name']." Items";
					}
			} 
		if(empty($errors4)){
						$query9	=	"INSERT INTO tb_items(item_id,item_cat_id,item_sub_cat_id,item_name,item_range_other) VALUES (NULL , '".$select_add_item_categ."', '".$select_sub_add_item_categ."','".$txt_add_item_name."', '".$string_item_price."');";
						if(mysql_query($query9)){ $form_add_new_item	=	"Item Successfully Added"; $message_class='style="color:green; margin-left:209px;"';}else{ $form_add_new_item	=	"Something Wrong ! try later"; $message_class='style="color:red;margin-left:209px;"';}
			
			}
	}
			


?>