<?php
/*
* Admin setting form
* Using post values
*/
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
    if(isset($_POST['js_hidden']) && $_POST['js_hidden'] == 'Y') {
        $type = $_POST['type'];
        update_option('type', $type);
		
		$link = $_POST['link'];
        update_option('link', $link);

        ?>
        <div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
        <?php
    } else {
        $type = get_option('type');
        $username = get_option('link');
    }
?>
<div class="wrap">
<table width="100%">
<tr><td width="70%">
    <?php    echo "<h3>" . __( '404 to 301', 'oscimp_trdom' ) . " <a href='http://www.joelsays.com/' target='_blank'>Plugin Website</a></h3><h4>More features are coming soon !!</h4>"; ?>
    <hr/>
	<form name="oscimp_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
        <input type="hidden" name="js_hidden" value="Y">
        <?php    echo "<h4>" . __( 'Redirect Type Settings', 'oscimp_trdom' ) . "</h4>"; ?>
        <p><?php _e("Type of redirect : " ); ?><select name='type' id='type'>
		<option value='301' <?php if($type=='301'){echo 'selected';}?>>301 Permanent</option>
		<option value='302' <?php if($type=='302'){echo 'selected';}?>>302 Temporary</option>
		<option value='307' <?php if($type=='307'){echo 'selected';}?>>307 Temporary</option>
		</select></p>
		<hr />
		<?php    echo "<h4>" . __( 'Redirect Page Settings', 'oscimp_trdom' ) . "</h4>"; ?>
        <p><?php _e("Redirect to : " ); ?><input type="text" id="link" name="link" value="<?php echo $link; ?>">    
     
        <p class="submit">
        <input type="submit" name="Submit" id="submit" value="<?php _e('Update Options', 'oscimp_trdom' ) ?>" />
        </p>
    </form>
</td><td width="30%" align="center">
<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=XUVWY8HUBUXY4" target="_blank"><img src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif"></a><br/>
<h4>If you think my plugin is useful, please consider a small donation.</h4>
<h3>Feel free to use <a href="http://www.joelsays.com/members-area/support/plugin-support-404-to-301/" target="_blank">Support Forum </a>if you have any doubts or feedback</h4></td>
</tr></table></div>
<br/><br><hr/>
<div align='center'>
<h4>Main advantage of this plugin is that 404 errors in your website will not be considered as error pages.<br/>Automatically creates a 301 permanent redirect if a 404 link found to your website.</h4><br/><h3>Check <a href='https://support.google.com/webmasters/answer/93633?hl=en' target='_blank'>Official Google Page</a> to know more about 301 redirect</h3>
</div>