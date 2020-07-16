	jQuery(".cart").on('submit',function(e){
				    
				if(prod_exists == 'true'){
						e.preventDefault();
						fd = new FormData();
						fd.append('action','twf_add_users_custom_data_options_for_products');
						fd.append('id','<?php echo get_the_id(); ?>');
						fd.append('usage',usage);
				// 		prescription_values.right_eye_sphere_value != null
						if(prescription_values.left_eye_axis_value !== undefined){
							for ( var key in prescription_values ) {
								fd.append(key, prescription_values[key]);
							}
						}
				     if(typeof prescription_values === 'undefined' && typeof lens_type === 'undefined' && typeof colour === 'undefined' && typeof lens_option === 'undefined' ){
				         //presciption 
				          prescription_values = {
											right_eye_sphere_value : '',
											right_eye_cylinder_value : '',
											right_eye_axis_value : '',
											left_eye_sphere_value : '',
											left_eye_cylinder_value : '',
											left_eye_axis_value : '',
											right_pd_value :'',
											left_pd_value : ''
							};
							
			           	 for ( var key in prescription_values ) {
								fd.append(key, prescription_values[key]);
							}
							//lens_type
							fd.append('lens_type','');
							fd.append('colour','');
							fd.append('lens_option','');
							
				     }else{
			           	 for ( var key in prescription_values ) {
								fd.append(key, prescription_values[key]);
							}
				         	fd.append('lens_type',lens_type);
                          	fd.append('colour',colour);
			           	fd.append('lens_option',lens_option);
				     }
				     if(typeof product_final_price !== 'undefined'){
						  	fd.append('additional_price',product_final_price);
					   }else{
						   	fd.append('additional_price',0);
					  }
				//       if(typeof prescription_values !== 'undefined'){
				           
				//           for ( var key in prescription_values ) {
				// 				fd.append(key, prescription_values[key]);
				// 			}
							
				//       }else{
				//           if(typeof lens_type === 'undefined'){
				// 		    prescription_values = {
				// 							right_eye_sphere_value : '',
				// 							right_eye_cylinder_value : '',
				// 							right_eye_axis_value : '',
				// 							left_eye_sphere_value : '',
				// 							left_eye_cylinder_value : '',
				// 							left_eye_axis_value : '',
				// 							right_pd_value :'',
				// 							left_pd_value : ''
				// 			};
							
			 //           	 for ( var key in prescription_values ) {
				// 				fd.append(key, prescription_values[key]);
				// 			}
				// 	     	}
				           	
							
				//       }
				//         if (typeof prescription_uploaded !== 'undefined'){
				// 			fd.append('prescription_uploaded',prescription_uploaded);
				// 		}
				// 		if(typeof lens_type !== 'undefined'){
				// 		    	fd.append('lens_type',lens_type);
				// 		}else{
				// 		    	fd.append('lens_type','');
				// 		}
				// 		if(typeof colour !== 'undefined'){
				// 		    	fd.append('colour',colour);
				// 		}else{
				// 		    	fd.append('colour','');
				// 		}
				// 		if(typeof lens_option !== 'undefined'){
				// 		    fd.append('lens_option',lens_option);
				// 		}else{
				// 		    fd.append('lens_option','');
				// 		}
				// 		fd.append('lens_type',lens_type);
				// 		fd.append('colour',colour);
				// 		fd.append('lens_option',lens_option);
				// 		fd.append('additional_price',product_final_price);
						
						jQuery(".lds-roller-holder").css("display","flex");
						jQuery.ajax({
							url:"<?php echo admin_url('admin-ajax.php'); ?>",
							type:"POST",
							contentType: false,
							processData: false,
							cache: false,
							data:fd,
							success:function(response,status)
							{
								jQuery(".lds-roller-holder").css("display","none");
								var title= '<?php echo get_the_title(); ?>';
								var site_url='<?php echo site_url(); ?>';
								jQuery('.woocommerce-notices-wrapper').append('<div class="woocommerce-message" role="alert"> <a href="'+site_url+'/cart/" tabindex="1" class="button wc-forward">View cart</a> “'+title+'” has been added to your cart.</div>');
								jQuery(".single_add_to_cart_button").html("Add to Cart");
							}
						});
					}
				});