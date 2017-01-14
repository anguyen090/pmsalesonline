<?PHP
//HÀM ĐÓNG DẤU IMAGESSSSSSS
	//Name of Watermark Image
	$watermark_img = "";//./imgs/dauImages.png
	//Opacity of Image
	$watermark_opacity = "70";
	//Watermark output Quality
	$watermark_quality = "100";

	//Do not edit the lines below
	define( 'WATERMARK_OVERLAY_IMAGE', $watermark_img );
	define( 'WATERMARK_OVERLAY_OPACITY', $watermark_opacity );
	define( 'WATERMARK_OUTPUT_QUALITY', $watermark_quality );
	function create_watermark( $source_file_path, $output_file_path )
	{
		list( $source_width, $source_height, $source_type ) = getimagesize( $source_file_path );
		if ( $source_type === NULL )
		{
			return false;
		}
		switch ( $source_type )
		{
			case IMAGETYPE_GIF:
				$source_gd_image = imagecreatefromgif( $source_file_path );
				break;
			case IMAGETYPE_JPEG:
				$source_gd_image = imagecreatefromjpeg( $source_file_path );
				break;
			case IMAGETYPE_PNG:
				$source_gd_image = imagecreatefrompng( $source_file_path );
				break;
			default:
				return false;
		}
		$overlay_gd_image = imagecreatefrompng( WATERMARK_OVERLAY_IMAGE );
		$overlay_width = imagesx( $overlay_gd_image );
		$overlay_height = imagesy( $overlay_gd_image );

		imagecopymerge(
			$source_gd_image,
			$overlay_gd_image,
			$source_width - $overlay_width,
			$source_height - $overlay_height,
			0,
			0,
			$overlay_width,
			$overlay_height,
			WATERMARK_OVERLAY_OPACITY
		);
		imagejpeg( $source_gd_image, $output_file_path, WATERMARK_OUTPUT_QUALITY );
		imagedestroy( $source_gd_image );
		imagedestroy( $overlay_gd_image );
	}
//--------------------------------------------------------------------------------------
//HÀM UPLOAD HÌNH ẢNH VÀ ĐÓNG DẤU
	function uploadImages($file_type,$file_name,$file_size,$file_tmp,$path_big,$path_thumbs,$thumbs_width,$big_width)
	{
			$err = '';
			//the new width of the resized image, in pixels.
			$img_thumb_width = $thumbs_width; // Hinh Thumbsnail
			$img_thumb_width2 = $big_width; // Hinh Co dong dau

			$extlimit = "yes"; //Limit allowed extensions? (no for all extensions allowed)
			//List of allowed extensions if extlimit = yes
			$limitedext = array(".gif",".jpg",".png",".jpeg",".bmp");
						
		   //check the file's extension
		   $ext = strrchr($file_name,'.');
		   $ext = strtolower($ext);
		   //uh-oh! the file extension is not allowed!
		   if (($extlimit == "yes") && (!in_array($ext,$limitedext))) {
			  $err = "Bạn chỉ được phép upload hình ảnh với đuôi JPG|PNG|GIF|BMP!";
		   }
		   else
		   {
			   //so, whats the file's extension?
			   $getExt = explode ('.', $file_name);
			   $file_ext = $getExt[count($getExt)-1];
		
			   //create a random file name
			   $rand_name = $getExt[0];//md5(time());
			   $rand_name= $rand_name."_".rand(0,999999);
			   //the new width variable
			   $ThumbWidth = $img_thumb_width;
			   $ThumbWidth2 = $img_thumb_width2;
		
				//////////////////////////
			   // CREATE THE THUMBNAIL //
			   //////////////////////////
			   
			   //keep image type
			   if($file_size){
				   //list the width and height and keep the height ratio.
				   list($width, $height) = getimagesize($file_tmp);
				   if(!getimagesize($file_tmp))
				   {
						$err = "Tập tin này không phải là tập tin hình ảnh !";
				   }
				   else{
						//UPLOAD HÌNH GÓC
						move_uploaded_file ($file_tmp, "$path_big/$rand_name.$file_ext");
					}
				}
			}
			if(!$err){
				return $path_big.$rand_name.".".$file_ext;
			}
			else{
				echo 	'<script language="javascript">
							alert("Kết quả:Upload images bị lỗi!!! \n---------------------------------------\nError: '.$err.' !");
						</script>';
			}
	}
?>