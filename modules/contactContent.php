<?PHP
	$PrimaryContent = '<div id="widget">';
	$PrimaryContent = $PrimaryContent.'
			<div id="widgetTitle"><h1 class="title">Liên hệ</h1></div>
						<div id="widgetContent" style="padding:20px;">
		';
		$PrimaryContent = $PrimaryContent.'
								<div class="contactInfo">
									'.str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($configuration->config_contact_info)).'
								</div>
								<div style="margin-top:10px; border-top:1px dashed #ccc;">
										   <div id="contact-alert"></div>
                                           <form class="cmxform" id="contactFrom" name="contactFrom" method="POST" action="'.MTN_BASE_SITEURL.'/webAction.php?option=contact&action=contact">
												<div class="small">
                                                    <p>
    													<label for="name">Họ & tên:</label>
    													<input class="input" type="text" name="ct_name" id="ct_name" placeholder=""/>
    												</p>
    												<p>
    													<label for="email">E-Mail:</label>
    												    <input class="input" type="text" name="ct_email" id="ct_email" placeholder=""/>
    												</p>
                                                </div>
                                                <div class="small">
    												<p>
    													<label for="phone">Điện thoại:</label>
                                                        <input class="input" type="text" name="ct_phone" id="ct_phone" placeholder=""/>
    												</p>
    												<p>
    													<label for="address">Địa chỉ</label>
    													<input class="input" type="text" name="ct_address" id="ct_address" placeholder=""/>
    												</p>
                                                </div>
												<p>
													<label for="content">Nội dung liên hệ:</label>
													<textarea class="input editor" id="ct_content" name="ct_content" cols="60" rows="6"></textarea>
												</p>
											     <input name="submit" type="submit" id="contactSubmit" class="button" value="Gửi liên hệ" />
                                                <div class="clear"></div>
                                            </form>
								</div>';
	$PrimaryContent = $PrimaryContent.'</div><div class="clear"></div></div>';
?>
