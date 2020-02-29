<?php

	$dynamic_array = array(		
				  array(				   
					   "id_primary" => $id_primary, 					   
					   "dynamic_color" => $dynamic_color,
					   "status_color" => $status_color,				   
					   "dynamic_body" => $dynamic_body,						   					   
					   "link_key" => $link_key,
					   "link_key_demonstrativos" => $link_key_demonstrativos,
					   "link_key_rendimentos" => $link_key_rendimentos,
				   ));	
		
			
		
						foreach ($dynamic_array as $dy_arr) {
							$profile  = new Template("../html/dynamic-grid-list.html");			
						 
							foreach ($dy_arr as $key => $value) {
								$profile->set($key, $value);
							}//end foreach 
							
							$dy_arrTemplates[] = $profile;
						}//end foreach 	
?>