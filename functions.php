<?php
add_action('after_setup_theme', 'blankslate_setup');


/**
 * Tests if any of a post's assigned categories are descendants of target categories
 *
 * @param int|array $cats The target categories. Integer ID or array of integer IDs
 * @param int|object $_post The post. Omit to test the current post in the Loop or main query
 * @return bool True if at least 1 of the post's categories is a descendant of any of the target categories
 * @see get_term_by() You can get a category by name or slug, then pass ID to this function
 * @uses get_term_children() Passes $cats
 * @uses in_category() Passes $_post (can be empty)
 * @version 2.7
 * @link http://codex.wordpress.org/Function_Reference/in_category#Testing_if_a_post_is_in_a_descendant_category
 */
 
 if (class_exists('MultiPostThumbnails')) {
        new MultiPostThumbnails(
            array(
                'label' => 'Partner Logo',
                'id' => 'partner-logo',
                'post_type' => 'post'
            )
        );
    }
 
if ( ! function_exists( 'post_is_in_descendant_category' ) ) {
	function post_is_in_descendant_category( $cats, $_post = null ) {
		foreach ( (array) $cats as $cat ) {
			// get_term_children() accepts integer ID only
			$descendants = get_term_children( (int) $cat, 'category' );
			if ( $descendants && in_category( $descendants, $_post ) )
				return true;
		}
		return false;
	}
}

/* MM Forms */

function MM_marketo_form_function($atts) {
  extract(shortcode_atts(array(
      'label' => 1,
      'instance' => 1,
      'campaign' => 1,
      'download' => 1,
   ), $atts));

$return_url = home_url();
   
$code_string = '<form id="marketo-MM" class="lpeRegForm formNotEmpty" method="post" enctype="application/x-www-form-urlencoded" id="mktForm_'. $campaign . '" name="mktForm_'. $campaign . '"><ul class="form"><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormString mktFReq" name="FirstName" id="FirstName" type="text" value="" maxlength="255" tabindex="1" placeholder="First"><span class="mktFormMsg"></span></span></li><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormString mktFReq" name="LastName" id="LastName" type="text" value="" maxlength="255" tabindex="2" placeholder="Last"><span class="mktFormMsg"></span></span></li><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormString mktFReq" name="Company" id="Company" type="text" value="" maxlength="255" tabindex="3" placeholder="Company"><span class="mktFormMsg"></span></span></li><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormEmail mktFReq" name="Email" id="Email" type="text" value="" maxlength="255" tabindex="4" placeholder="Email"><span class="mktFormMsg"></span></span></li><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormPhone mktFReq" name="Phone" id="Phone" type="text" value="" maxlength="255" tabindex="5" placeholder="Phone"><span class="mktFormMsg"></span></span></li><li class="buttons "><div class="btn" color: #fff; background-color: #0089c9;"><button class="' . $instance . '" style="width: 238px; color: #fff; background-color: #0089c9;">' . $label . '</button><button class="' . $instance . ' btn-arrow-new" style="background-color: #0089c9;">&nbsp;</button></div></li></ul><span style="display:none;"><input type="text" name="_marketo_comments" value=""></span><input type="hidden" name="lpId" value="-1"><input type="hidden" name="subId" value="44"><input type="hidden" name="munchkinId" value="921-OYU-441"><input type="hidden" name="kw" value=""><input type="hidden" name="cr" value=""><input type="hidden" name="searchstr" value=""><input type="hidden" name="lpurl" value="http://pages.mokimobility.com/landing.html?cr={creative}&amp;kw={keyword}"><input type="hidden" name="formid" value="'. $campaign . '"><input type="hidden" name="returnURL" value="' . $return_url . $download . '"><input type="hidden" name="retURL" value="' . $return_url . $download . '"><input type="hidden" name="returnLPId" value="-1"><input type="hidden" name="_mkt_disp" value="return"><input type="hidden" name="_mkt_trk" value=""></form>';

  return $code_string;
}

function MM_marketo_form_nophone_function($atts) {
  extract(shortcode_atts(array(
      'label' => 1,
      'instance' => 1,
      'campaign' => 1,
      'download' => 1,
   ), $atts));

$return_url = home_url();
   
$code_string = '<form id="marketo-MM" class="lpeRegForm formNotEmpty" method="post" enctype="application/x-www-form-urlencoded" id="mktForm_'. $campaign . '" name="mktForm_'. $campaign . '"><ul class="form"><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormString mktFReq" name="FirstName" id="FirstName" type="text" value="" maxlength="255" tabindex="1" placeholder="First"><span class="mktFormMsg"></span></span></li><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormString mktFReq" name="LastName" id="LastName" type="text" value="" maxlength="255" tabindex="2" placeholder="Last"><span class="mktFormMsg"></span></span></li><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormString mktFReq" name="Company" id="Company" type="text" value="" maxlength="255" tabindex="3" placeholder="Company"><span class="mktFormMsg"></span></span></li><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormEmail mktFReq" name="Email" id="Email" type="text" value="" maxlength="255" tabindex="4" placeholder="Email"><span class="mktFormMsg"></span></span></li><li class="buttons "><div class="btn" color: #fff; background-color: #0089c9;"><button class="' . $instance . '" style="width: 238px; color: #fff; background-color: #0089c9;">' . $label . '</button><button class="' . $instance . ' btn-arrow-new" style="background-color: #0089c9;">&nbsp;</button></div></li></ul><span style="display:none;"><input type="text" name="_marketo_comments" value=""></span><input type="hidden" name="lpId" value="-1"><input type="hidden" name="subId" value="44"><input type="hidden" name="munchkinId" value="921-OYU-441"><input type="hidden" name="kw" value=""><input type="hidden" name="cr" value=""><input type="hidden" name="searchstr" value=""><input type="hidden" name="lpurl" value="http://pages.mokimobility.com/landing.html?cr={creative}&amp;kw={keyword}"><input type="hidden" name="formid" value="'. $campaign . '"><input type="hidden" name="returnURL" value="' . $return_url . $download . '"><input type="hidden" name="retURL" value="' . $return_url . $download . '"><input type="hidden" name="returnLPId" value="-1"><input type="hidden" name="_mkt_disp" value="return"><input type="hidden" name="_mkt_trk" value=""></form>';

  return $code_string;
}

function MM_marketo_email_form_function($atts) {
  extract(shortcode_atts(array(
      'label' => 1,
      'instance' => 1,
      'campaign' => 1,
      'download' => 1,
   ), $atts));

$return_url = home_url();
   
$code_string = '<form id="marketo-sc-email-MM" class="lpeRegForm formNotEmpty" method="post" enctype="application/x-www-form-urlencoded" id="mktForm_'. $campaign . '" name="mktForm_'. $campaign . '"><ul class="form"><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormString mktFReq" name="FirstName" id="FirstName" type="text" value="" maxlength="255" tabindex="1" placeholder="First"><span class="mktFormMsg"></span></span></li><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormString mktFReq" name="LastName" id="LastName" type="text" value="" maxlength="255" tabindex="2" placeholder="Last"><span class="mktFormMsg"></span></span></li><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormEmail mktFReq" name="Email" id="Email" type="text" value="" maxlength="255" tabindex="4" placeholder="Email"><span class="mktFormMsg"></span></span></li><li class="buttons "><div class="btn" color: #fff; background-color: #0089c9;"><button class="' . $instance . '" style="width: 238px; color: #fff; background-color: #0089c9;">' . $label . '</button><button class="' . $instance . ' btn-arrow-new" style="background-color: #0089c9;">&nbsp;</button></div></li></ul><span style="display:none;"><input type="text" name="_marketo_comments" value=""></span><input type="hidden" name="lpId" value="-1"><input type="hidden" name="subId" value="44"><input type="hidden" name="munchkinId" value="921-OYU-441"><input type="hidden" name="kw" value=""><input type="hidden" name="cr" value=""><input type="hidden" name="searchstr" value=""><input type="hidden" name="lpurl" value="http://pages.mokimobility.com/landing.html?cr={creative}&amp;kw={keyword}"><input type="hidden" name="formid" value="'. $campaign . '"><input type="hidden" name="returnURL" value="' . $return_url . $download . '"><input type="hidden" name="retURL" value="' . $return_url . $download . '"><input type="hidden" name="returnLPId" value="-1"><input type="hidden" name="_mkt_disp" value="return"><input type="hidden" name="_mkt_trk" value=""></form>';

  return $code_string;
}

function MM_marketo_contact_form_function($atts) {
  extract(shortcode_atts(array(
      'label' => 1,
      'instance' => 1,
      'campaign' => 1,
      'download' => 1,
   ), $atts));

$return_url = home_url();
   
$code_string = '<form id="marketo-contact-MM" class="lpeRegForm formNotEmpty" method="post" enctype="application/x-www-form-urlencoded" id="mktForm_'. $campaign . '" name="mktForm_'. $campaign . '"><div class="column1"><ul class="form"><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormString mktFReq" name="FirstName" id="FirstName" type="text" value="" maxlength="255" tabindex="1" placeholder="First" style="width: 186px;"><span class="mktFormMsg"></span></span></li><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormString mktFReq" name="LastName" id="LastName" type="text" value="" maxlength="255" tabindex="2" placeholder="Last" style="width: 186px;"><span class="mktFormMsg"></span></span></li><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormString mktFReq" name="Company" id="Company" type="text" value="" maxlength="255" tabindex="3" placeholder="Company" style="width: 186px;"><span class="mktFormMsg"></span></span></li><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormEmail mktFReq" name="Email" id="Email" type="text" value="" maxlength="255" tabindex="4" placeholder="Email" style="width: 186px;"><span class="mktFormMsg"></span></span></li><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormPhone mktFReq" name="Phone" id="Phone" type="text" value="" maxlength="255" tabindex="5" placeholder="Phone" style="width: 186px;"><span class="mktFormMsg"></span></span></li></ul></div><div class="column1"><ul class="form"><li><textarea class="mktFormTextarea mktFormTextarea" name="What_can_we_do_for_you__c" id="What_can_we_do_for_you__c" cols="50" rows="10" tabindex="6" placeholder="Describe your needs..." style="width: 186px; height: 18.5em;"></textarea></li></ul></div><div class="row padding-bottom-three"><div class="column2 span1"><div class="btn" style="width: 460px; color: #fff; background-color: #0089C9;"><button class="' . $instance . '" style="width: 410px; color: #fff; background-color: #0089C9;">' . $label . '</button><button class="' . $instance . ' btn-arrow-new" style="background-color: #0089C9;">&nbsp;</button></div></div></div><input type="hidden" name="lpId" value="-1"><input type="hidden" name="subId" value="44"><input type="hidden" name="munchkinId" value="921-OYU-441"><input type="hidden" name="kw" value=""><input type="hidden" name="cr" value=""><input type="hidden" name="searchstr" value=""><input type="hidden" name="lpurl" value="http://pages.mokimobility.com/landing.html?cr={creative}&amp;kw={keyword}"><input type="hidden" name="formid" value="'. $campaign . '"><input type="hidden" name="returnURL" value="' . $return_url . $download . '"><input type="hidden" name="retURL" value="' . $return_url . $download . '"><input type="hidden" name="returnLPId" value="-1"><input type="hidden" name="_mkt_disp" value="return"><input type="hidden" name="_mkt_trk" value=""></form>';

  return $code_string;
}

function MM_marketo_form_LP_function($atts) {
  extract(shortcode_atts(array(
      'label' => 1,
      'instance' => 1,
      'campaign' => 1,
      'download' => 1,
   ), $atts));

$return_url = home_url();
   
$code_string = '<form id="marketo-MM-LP" class="lpeRegForm formNotEmpty" method="post" enctype="application/x-www-form-urlencoded" id="mktForm_'. $campaign . '" name="mktForm_'. $campaign . '"><ul class="form"><li class="mktFormReq mktField"><input name="FirstName" id="LPFirstName" type="text" value="" maxlength="255" placeholder="First"><input name="LastName" id="LPLastName" type="text" value="" maxlength="255" placeholder="Last"></li><li><input name="Company" id="LPCompany" type="text" value="" maxlength="255" placeholder="Company"><input name="Phone" id="LPPhone" type="text" value="" maxlength="255" placeholder="Phone"></li><li><input name="Email" id="LPEmail" type="text" value="" maxlength="255" placeholder="Email"></li><li class="buttons "><div class="btn" color: #fff; background-color: #0089c9;"><button class="' . $instance . '" style="width: 85%; color: #fff; background-color: #0089c9;">' . $label . '</button><button class="' . $instance . ' btn-arrow-new" style="width: 15%; background-color: #0089c9;">&nbsp;</button></div></li></ul><span style="display:none;"><input type="text" name="_marketo_comments" value=""></span><input type="hidden" name="lpId" value="-1"><input type="hidden" name="subId" value="44"><input type="hidden" name="munchkinId" value="921-OYU-441"><input type="hidden" name="kw" value=""><input type="hidden" name="cr" value=""><input type="hidden" name="searchstr" value=""><input type="hidden" name="lpurl" value="http://pages.mokimobility.com/landing.html?cr={creative}&amp;kw={keyword}"><input type="hidden" name="formid" value="'. $campaign . '"><input type="hidden" name="returnURL" value="' . $return_url . $download . '"><input type="hidden" name="retURL" value="' . $return_url . $download . '"><input type="hidden" name="returnLPId" value="-1"><input type="hidden" name="_mkt_disp" value="return"><input type="hidden" name="_mkt_trk" value=""></form>';

  return $code_string;
}

function MM_marketo_form_LP_bottom_function($atts) {
  extract(shortcode_atts(array(
      'label' => 1,
      'instance' => 1,
      'campaign' => 1,
      'download' => 1,
   ), $atts));

$return_url = home_url();
   
$code_string = '<form id="marketo-MM-LP-bottom" class="lpeRegForm formNotEmpty" method="post" enctype="application/x-www-form-urlencoded" id="mktForm_'. $campaign . '" name="mktForm_'. $campaign . '"><ul class="form"><li class="mktFormReq mktField"><input name="FirstName" id="LPFirstName" type="text" value="" maxlength="255" placeholder="First"><input name="LastName" id="LPLastName" type="text" value="" maxlength="255" placeholder="Last"></li><li><input name="Company" id="LPCompany" type="text" value="" maxlength="255" placeholder="Company"><input name="Phone" id="LPPhone" type="text" value="" maxlength="255" placeholder="Phone"></li><li><input name="Email" id="LPEmail" type="text" value="" maxlength="255" placeholder="Email"></li><li class="buttons "><div class="btn" color: #fff; background-color: #0089c9;"><button class="' . $instance . '" style="width: 85%; color: #fff; background-color: #0089c9;">' . $label . '</button><button class="' . $instance . ' btn-arrow-new" style="width: 15%; background-color: #0089c9;">&nbsp;</button></div></li></ul><span style="display:none;"><input type="text" name="_marketo_comments" value=""></span><input type="hidden" name="lpId" value="-1"><input type="hidden" name="subId" value="44"><input type="hidden" name="munchkinId" value="921-OYU-441"><input type="hidden" name="kw" value=""><input type="hidden" name="cr" value=""><input type="hidden" name="searchstr" value=""><input type="hidden" name="lpurl" value="http://pages.mokimobility.com/landing.html?cr={creative}&amp;kw={keyword}"><input type="hidden" name="formid" value="'. $campaign . '"><input type="hidden" name="returnURL" value="' . $return_url . $download . '"><input type="hidden" name="retURL" value="' . $return_url . $download . '"><input type="hidden" name="returnLPId" value="-1"><input type="hidden" name="_mkt_disp" value="return"><input type="hidden" name="_mkt_trk" value=""></form>';

  return $code_string;
}

function MM_marketo_form_LP_nophone_function($atts) {
  extract(shortcode_atts(array(
      'label' => 1,
      'instance' => 1,
      'campaign' => 1,
      'download' => 1,
   ), $atts));

$return_url = home_url();
   
$code_string = '<form id="marketo-MM-LP" class="lpeRegForm formNotEmpty" method="post" enctype="application/x-www-form-urlencoded" id="mktForm_'. $campaign . '" name="mktForm_'. $campaign . '"><ul class="form"><li class="mktFormReq mktField"><input name="FirstName" id="LPFirstName" type="text" value="" maxlength="255" placeholder="First"><input name="LastName" id="LPLastName" type="text" value="" maxlength="255" placeholder="Last"></li><li><input name="Company" id="LPCompanyNoPhone" type="text" value="" maxlength="255" placeholder="Company"></li><li><input name="Email" id="LPEmail" type="text" value="" maxlength="255" placeholder="Email"></li><li class="buttons "><div class="btn" color: #fff; background-color: #0089c9;"><button class="' . $instance . '" style="width: 85%; color: #fff; background-color: #0089c9;">' . $label . '</button><button class="' . $instance . ' btn-arrow-new" style="width: 15%; background-color: #0089c9;">&nbsp;</button></div></li></ul><span style="display:none;"><input type="text" name="_marketo_comments" value=""></span><input type="hidden" name="lpId" value="-1"><input type="hidden" name="subId" value="44"><input type="hidden" name="munchkinId" value="921-OYU-441"><input type="hidden" name="kw" value=""><input type="hidden" name="cr" value=""><input type="hidden" name="searchstr" value=""><input type="hidden" name="lpurl" value="http://pages.mokimobility.com/landing.html?cr={creative}&amp;kw={keyword}"><input type="hidden" name="formid" value="'. $campaign . '"><input type="hidden" name="returnURL" value="' . $return_url . $download . '"><input type="hidden" name="retURL" value="' . $return_url . $download . '"><input type="hidden" name="returnLPId" value="-1"><input type="hidden" name="_mkt_disp" value="return"><input type="hidden" name="_mkt_trk" value=""></form>';

  return $code_string;
}

function MM_marketo_form_LP_nophone_bottom_function($atts) {
  extract(shortcode_atts(array(
      'label' => 1,
      'instance' => 1,
      'campaign' => 1,
      'download' => 1,
   ), $atts));

$return_url = home_url();
   
$code_string = '<form id="marketo-MM-LP-nophone-bottom" class="lpeRegForm formNotEmpty" method="post" enctype="application/x-www-form-urlencoded" id="mktForm_'. $campaign . '" name="mktForm_'. $campaign . '"><ul class="form"><li class="mktFormReq mktField"><input name="FirstName" id="LPFirstName" type="text" value="" maxlength="255" placeholder="First"><input name="LastName" id="LPLastName" type="text" value="" maxlength="255" placeholder="Last"></li><li><input name="Company" id="LPCompanyNoPhone" type="text" value="" maxlength="255" placeholder="Company"></li><li><input name="Email" id="LPEmail" type="text" value="" maxlength="255" placeholder="Email"></li><li class="buttons "><div class="btn" color: #fff; background-color: #0089c9;"><button class="' . $instance . '" style="width: 85%; color: #fff; background-color: #0089c9;">' . $label . '</button><button class="' . $instance . ' btn-arrow-new" style="width: 15%; background-color: #0089c9;">&nbsp;</button></div></li></ul><span style="display:none;"><input type="text" name="_marketo_comments" value=""></span><input type="hidden" name="lpId" value="-1"><input type="hidden" name="subId" value="44"><input type="hidden" name="munchkinId" value="921-OYU-441"><input type="hidden" name="kw" value=""><input type="hidden" name="cr" value=""><input type="hidden" name="searchstr" value=""><input type="hidden" name="lpurl" value="http://pages.mokimobility.com/landing.html?cr={creative}&amp;kw={keyword}"><input type="hidden" name="formid" value="'. $campaign . '"><input type="hidden" name="returnURL" value="' . $return_url . $download . '"><input type="hidden" name="retURL" value="' . $return_url . $download . '"><input type="hidden" name="returnLPId" value="-1"><input type="hidden" name="_mkt_disp" value="return"><input type="hidden" name="_mkt_trk" value=""></form>';

  return $code_string;
}

/* MT Forms */

function MT_marketo_form_function($atts) {
  extract(shortcode_atts(array(
      'label' => 1,
      'instance' => 1,
      'campaign' => 1,
      'download' => 1,
   ), $atts));

$return_url = home_url();
   
$code_string = '<form id="marketo-MT" class="lpeRegForm formNotEmpty" method="post" enctype="application/x-www-form-urlencoded" id="mktForm_'. $campaign . '" name="mktForm_'. $campaign . '"><ul class="form"><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormString mktFReq" name="FirstName" id="FirstName" type="text" value="" maxlength="255" tabindex="1" placeholder="First"><span class="mktFormMsg"></span></span></li><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormString mktFReq" name="LastName" id="LastName" type="text" value="" maxlength="255" tabindex="2" placeholder="Last"><span class="mktFormMsg"></span></span></li><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormString mktFReq" name="Company" id="Company" type="text" value="" maxlength="255" tabindex="3" placeholder="Company"><span class="mktFormMsg"></span></span></li><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormEmail mktFReq" name="Email" id="Email" type="text" value="" maxlength="255" tabindex="4" placeholder="Email"><span class="mktFormMsg"></span></span></li><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormPhone mktFReq" name="Phone" id="Phone" type="text" value="" maxlength="255" tabindex="5" placeholder="Phone"><span class="mktFormMsg"></span></span></li><li class="buttons "><div class="btn" color: #fff; background-color: #0089c9;"><button class="' . $instance . '" style="width: 238px; color: #fff; background-color: #0089c9;">' . $label . '</button><button class="' . $instance . ' btn-arrow-new" style="background-color: #0089c9;">&nbsp;</button></div></li></ul><span style="display:none;"><input type="text" name="_marketo_comments" value=""></span><input type="hidden" name="lpId" value="-1"><input type="hidden" name="subId" value="44"><input type="hidden" name="munchkinId" value="921-OYU-441"><input type="hidden" name="kw" value=""><input type="hidden" name="cr" value=""><input type="hidden" name="searchstr" value=""><input type="hidden" name="lpurl" value="http://pages.mokimobility.com/landing.html?cr={creative}&amp;kw={keyword}"><input type="hidden" name="formid" value="'. $campaign . '"><input type="hidden" name="returnURL" value="' . $return_url . $download . '"><input type="hidden" name="retURL" value="' . $return_url . $download . '"><input type="hidden" name="returnLPId" value="-1"><input type="hidden" name="_mkt_disp" value="return"><input type="hidden" name="_mkt_trk" value=""></form>';

  return $code_string;
}

function MT_marketo_inline_form_function($atts) {
  extract(shortcode_atts(array(
      'label' => 1,
      'instance' => 1,
      'campaign' => 1,
      'download' => 1,
   ), $atts));

$return_url = home_url();
   
$code_string = '<form id="marketo-inline-MT" class="lpeRegForm formNotEmpty" method="post" enctype="application/x-www-form-urlencoded" id="mktForm_'. $campaign . '" name="mktForm_'. $campaign . '"><ul class="form"><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormString mktFReq" name="FirstName" id="FirstName" type="text" value="" maxlength="255" tabindex="1" placeholder="First"><span class="mktFormMsg"></span></span></li><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormString mktFReq" name="LastName" id="LastName" type="text" value="" maxlength="255" tabindex="2" placeholder="Last"><span class="mktFormMsg"></span></span></li><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormString mktFReq" name="Company" id="Company" type="text" value="" maxlength="255" tabindex="3" placeholder="Company"><span class="mktFormMsg"></span></span></li><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormEmail mktFReq" name="Email" id="Email" type="text" value="" maxlength="255" tabindex="4" placeholder="Email"><span class="mktFormMsg"></span></span></li><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormPhone mktFReq" name="Phone" id="Phone" type="text" value="" maxlength="255" tabindex="5" placeholder="Phone"><span class="mktFormMsg"></span></span></li><li class="buttons "><div class="btn" color: #fff; background-color: #0089c9;"><button class="' . $instance . '" style="width: 238px; color: #fff; background-color: #0089c9;">' . $label . '</button><button class="' . $instance . ' btn-arrow-new" style="background-color: #0089c9;">&nbsp;</button></div></li></ul><span style="display:none;"><input type="text" name="_marketo_comments" value=""></span><input type="hidden" name="lpId" value="-1"><input type="hidden" name="subId" value="44"><input type="hidden" name="munchkinId" value="921-OYU-441"><input type="hidden" name="kw" value=""><input type="hidden" name="cr" value=""><input type="hidden" name="searchstr" value=""><input type="hidden" name="lpurl" value="http://pages.mokimobility.com/landing.html?cr={creative}&amp;kw={keyword}"><input type="hidden" name="formid" value="'. $campaign . '"><input type="hidden" name="returnURL" value="' . $return_url . $download . '"><input type="hidden" name="retURL" value="' . $return_url . $download . '"><input type="hidden" name="returnLPId" value="-1"><input type="hidden" name="_mkt_disp" value="return"><input type="hidden" name="_mkt_trk" value=""></form>';

  return $code_string;
}

/*
function MT_marketo_email_form_function($atts) {
  extract(shortcode_atts(array(
      'label' => 1,
      'instance' => 1,
      'campaign' => 1,
      'download' => 1,
   ), $atts));

$return_url = home_url();
   
$code_string = '<form id="marketo-sc-email-MM" class="lpeRegForm formNotEmpty" method="post" enctype="application/x-www-form-urlencoded" id="mktForm_'. $campaign . '" name="mktForm_'. $campaign . '"><ul class="form"><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormString mktFReq" name="FirstName" id="FirstName" type="text" value="" maxlength="255" tabindex="1" placeholder="First"><span class="mktFormMsg"></span></span></li><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormString mktFReq" name="LastName" id="LastName" type="text" value="" maxlength="255" tabindex="2" placeholder="Last"><span class="mktFormMsg"></span></span></li><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormEmail mktFReq" name="Email" id="Email" type="text" value="" maxlength="255" tabindex="4" placeholder="Email"><span class="mktFormMsg"></span></span></li><li class="buttons "><div class="btn" color: #fff; background-color: #0089c9;"><button class="' . $instance . '" style="width: 238px; color: #fff; background-color: #0089c9;">' . $label . '</button><button class="' . $instance . ' btn-arrow-new" style="background-color: #0089c9;">&nbsp;</button></div></li></ul><span style="display:none;"><input type="text" name="_marketo_comments" value=""></span><input type="hidden" name="lpId" value="-1"><input type="hidden" name="subId" value="44"><input type="hidden" name="munchkinId" value="921-OYU-441"><input type="hidden" name="kw" value=""><input type="hidden" name="cr" value=""><input type="hidden" name="searchstr" value=""><input type="hidden" name="lpurl" value="http://pages.mokimobility.com/landing.html?cr={creative}&amp;kw={keyword}"><input type="hidden" name="formid" value="'. $campaign . '"><input type="hidden" name="returnURL" value="' . $return_url . $download . '"><input type="hidden" name="retURL" value="' . $return_url . $download . '"><input type="hidden" name="returnLPId" value="-1"><input type="hidden" name="_mkt_disp" value="return"><input type="hidden" name="_mkt_trk" value=""></form>';

  return $code_string;
}
*/
function MT_marketo_contact_form_function($atts) {
  extract(shortcode_atts(array(
      'label' => 1,
      'instance' => 1,
      'campaign' => 1,
      'download' => 1,
   ), $atts));

$return_url = home_url();
   
$code_string = '<form id="marketo-contact-MT" class="lpeRegForm formNotEmpty" method="post" enctype="application/x-www-form-urlencoded" id="mktForm_'. $campaign . '" name="mktForm_'. $campaign . '"><div class="column1"><ul class="form"><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormString mktFReq" name="FirstName" id="FirstName" type="text" value="" maxlength="255" tabindex="1" placeholder="First" style="width: 186px;"><span class="mktFormMsg"></span></span></li><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormString mktFReq" name="LastName" id="LastName" type="text" value="" maxlength="255" tabindex="2" placeholder="Last" style="width: 186px;"><span class="mktFormMsg"></span></span></li><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormString mktFReq" name="Company" id="Company" type="text" value="" maxlength="255" tabindex="3" placeholder="Company" style="width: 186px;"><span class="mktFormMsg"></span></span></li><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormEmail mktFReq" name="Email" id="Email" type="text" value="" maxlength="255" tabindex="4" placeholder="Email" style="width: 186px;"><span class="mktFormMsg"></span></span></li><li class="mktFormReq mktField"><span class="mktInput"><input class="mktFormText mktFormPhone mktFReq" name="Phone" id="Phone" type="text" value="" maxlength="255" tabindex="5" placeholder="Phone" style="width: 186px;"><span class="mktFormMsg"></span></span></li></ul></div><div class="column1"><ul class="form"><li><textarea class="mktFormTextarea mktFormTextarea" name="What_can_we_do_for_you__c" id="What_can_we_do_for_you__c" cols="50" rows="10" tabindex="6" placeholder="Describe your needs..." style="width: 186px; height: 18.5em;"></textarea></li></ul></div><div class="row padding-bottom-three"><div class="column2 span1"><div class="btn" style="width: 460px; color: #fff; background-color: #0089C9;"><button class="' . $instance . '" style="width: 410px; color: #fff; background-color: #0089C9;">' . $label . '</button><button class="' . $instance . ' btn-arrow-new" style="background-color: #0089C9;">&nbsp;</button></div></div></div><input type="hidden" name="lpId" value="-1"><input type="hidden" name="subId" value="44"><input type="hidden" name="munchkinId" value="921-OYU-441"><input type="hidden" name="kw" value=""><input type="hidden" name="cr" value=""><input type="hidden" name="searchstr" value=""><input type="hidden" name="lpurl" value="http://pages.mokimobility.com/landing.html?cr={creative}&amp;kw={keyword}"><input type="hidden" name="formid" value="'. $campaign . '"><input type="hidden" name="returnURL" value="' . $return_url . $download . '"><input type="hidden" name="retURL" value="' . $return_url . $download . '"><input type="hidden" name="returnLPId" value="-1"><input type="hidden" name="_mkt_disp" value="return"><input type="hidden" name="_mkt_trk" value=""></form>';

  return $code_string;
}

/*

function display_email_form_function($atts) {
	extract(shortcode_atts(array(
      'tracker' => 1,
      'label' => 1,
      'instance' => 1,
      'width' => 1,
      'type' => 1,
      'bkgd' => 1,
   ), $atts));
   
   $labelWidth = $width - 50;
   $fieldWidth = $width - 34;

	$code_string = '<form id="form22" name="form22" class="wufoo topLabel page" autocomplete="off" enctype="multipart/form-data" method="post" novalidate action="https://mokimobility.wufoo.com/forms/m7p6q5/#public"><ul class="form"><li id="foli3" class="notranslate"><input id="Field3" name="Field3" type="text" class="field text medium" value="" maxlength="255" tabindex="1" onkeyup="" required placeholder="Full name" style="width: '. $fieldWidth . 'px;"/></li><li id="foli4" class="notranslate"><input id="Field4" name="Field4" type="email" spellcheck="false" class="field text medium" value="" maxlength="255" tabindex="2" required placeholder="Email address" style="width: '. $fieldWidth . 'px; margin-bottom: 1em;"/> </li><li class="buttons"><div class="btn" style="width: '. $width . 'px; color: ' . $type . '; background-color: ' . $bkgd . ';"><button class="' . $instance . '" style="width: '. $labelWidth . 'px; color: ' . $type . '; background-color: ' . $bkgd . ';">' . $label . '</button><button class="' . $instance . ' btn-arrow-new" style="background-color: ' . $bkgd . ';">&nbsp;</button></div></li><li class="hide"><input type="hidden" id="idstamp" name="idstamp" value="ASq4CCEsuk8elDl7e4Vm/2GanbnTtzxQFE1DVR33X68=" /></li></ul></form>';
	
	return $code_string;
}

// MM and MT contact forms

function MM_contact_form_function() {
	
	$code_string = '<form id="contact-MM" name="form11" autocomplete="off" enctype="multipart/form-data" method="post"><div class="column1"><ul class="form"><li><input id="Field1" name="Field1" type="text" value="" size="8" tabindex="1" placeholder="Firstname" style="width: 186px;"/></li><li><input id="Field2" name="Field2" type="text" value="" size="14" tabindex="2" required placeholder="Lastname" style="width: 186px;"/></li><li><input id="Field7" name="Field7" type="text" value="" maxlength="255" tabindex="3" onkeyup="" required placeholder="Company" style="width: 186px;"/></li><li><input id="Field3" name="Field3" type="email" spellcheck="false" value="" maxlength="255" tabindex="4" required placeholder="Email" style="width: 186px;"/> </li><li><input id="Field5" name="Field5" tabindex="5" required  type="tel" maxlength="255" value="" placeholder="Phone" style="width: 186px;"/></li></ul></div><div class="column1"><ul class="form"><li><textarea id="Field4" name="Field4" spellcheck="true" rows="10" cols="50" tabindex="13" onkeyup="" placeholder="Describe your needs..." style="width: 186px; height: 18.5em;"></textarea></li><li><input type="hidden" id="idstamp" name="idstamp" value="I2DQVFnc91/4G68IGIuuLRSShfX1NN8P7mca5kLP3RM=" /></li></ul></div></div><div class="row padding-bottom-three"><div class="column2 span1"><div class="btn" style="width: 460px; color: #fff; background-color: #0089C9;"><button class="btn-contact-form" style="width: 410px; color: #fff; background-color: #0089C9;">Submit</button><button class="btn-contact-form btn-arrow-new" style="background-color: #0089C9;">&nbsp;</button></div></div></div></form>';
	
	return $code_string;
}

function MT_contact_form_function() {
	
	$code_string = '<form id="contact-MT" name="form26" autocomplete="off" enctype="multipart/form-data" method="post"><div class="column1"><ul class="form"><li><input id="Field1" name="Field1" type="text" value="" size="8" tabindex="1" placeholder="Firstname" style="width: 186px;"/></li><li><input id="Field2" name="Field2" type="text" value="" size="14" tabindex="2" required placeholder="Lastname" style="width: 186px;"/></li><li><input id="Field7" name="Field7" type="text" value="" maxlength="255" tabindex="3" onkeyup="" required placeholder="Company" style="width: 186px;"/></li><li><input id="Field3" name="Field3" type="email" spellcheck="false" value="" maxlength="255" tabindex="4" required placeholder="Email" style="width: 186px;"/> </li><li><input id="Field5" name="Field5" tabindex="5" required  type="tel" maxlength="255" value="" placeholder="Phone" style="width: 186px;"/></li></ul></div><div class="column1"><ul class="form"><li><textarea id="Field4" name="Field4" spellcheck="true" rows="10" cols="50" tabindex="13" onkeyup="" placeholder="Describe your needs..." style="width: 186px; height: 18.5em;"></textarea></li><li><input type="hidden" id="idstamp" name="idstamp" value="ar/vI3+n4gM8ER3GGQlxj8Q3WZMdqkpvzv83L32YHwc=" /></li></ul></div></div><div class="row padding-bottom-three"><div class="column2 span1"><div class="btn" style="width: 460px; color: #fff; background-color: #0089C9;"><button class="btn-contact-form" style="width: 410px; color: #fff; background-color: #0089C9;">Submit</button><button class="btn-contact-form btn-arrow-new" style="background-color: #0089C9;">&nbsp;</button></div></div></div></form>';
	
	return $code_string;
}
*/
/* Button Functions */

function display_button_mobility_function($atts) {
	extract(shortcode_atts(array(
      'tracker' => 1,
      'label' => 1,
      'instance' => 1,
      'width' => 1,
      'type' => 1,
      'bkgd' => 1,
   ), $atts));
   
   //$totalWidth = $width;
   $labelWidth = $width - 50;

	$code_string = '<div class="btn" style="width: '. $width . 'px; color: ' . $type . '; background-color: ' . $bkgd . ';"><button name="'. $tracker .'" class="' . $instance . '" style="width: '. $labelWidth . 'px; color: ' . $type . '; background-color: ' . $bkgd . ';">' . $label . '</button><button class="' . $instance . ' btn-arrow-new" style="background-color: ' . $bkgd . ';">&nbsp;</button></div>';
	return $code_string;
}

function display_button_function($atts) {
	extract(shortcode_atts(array(
      'label' => 1,
      'instance' => 1,
      'width' => 1,
      'type' => 1,
      'bkgd' => 1,
   ), $atts));
   
   //$totalWidth = $width;
   $labelWidth = $width - 50;

	$code_string = '<div class="btn" style="width: '. $width . 'px; color: ' . $type . '; background-color: ' . $bkgd . ';"><button class="' . $instance . '" style="width: '. $labelWidth . 'px; color: ' . $type . '; background-color: ' . $bkgd . ';">' . $label . '</button><button class="' . $instance . ' btn-arrow-new" style="background-color: ' . $bkgd . ';">&nbsp;</button></div>';
	return $code_string;
}

function display_gray_button_function($atts) {
	extract(shortcode_atts(array(
      'label' => 1,
      'instance' => 1,
      'width' => 1,
      'type' => 1,
      'bkgd' => 1,
   ), $atts));
   
   //$totalWidth = $width;
   $labelWidth = $width - 50;

	$code_string = '<div class="btn" style="width: '. $width . 'px; color: ' . $type . '; background-color: ' . $bkgd . ';"><button class="' . $instance . '" style="width: '. $labelWidth . 'px; color: ' . $type . '; background-color: ' . $bkgd . ';">' . $label . '</button><button class="' . $instance . ' btn-arrow-gray-new" style="background-color: ' . $bkgd . ';">&nbsp;</button></div>';
	return $code_string;
}

function display_orange_button_function($atts) {
	extract(shortcode_atts(array(
      'label' => 1,
      'instance' => 1,
      'width' => 1,
      'type' => 1,
      'bkgd' => 1,
   ), $atts));
   
   //$totalWidth = $width;
   $labelWidth = $width - 50;

	$code_string = '<div class="btn" style="width: '. $width . 'px; color: ' . $type . '; background-color: ' . $bkgd . ';"><button class="' . $instance . '" style="width: '. $labelWidth . 'px; color: ' . $type . '; background-color: ' . $bkgd . ';">' . $label . '</button><button class="' . $instance . ' btn-arrow-orange" style="background-color: ' . $bkgd . ';">&nbsp;</button></div>';
	return $code_string;
}

function theme_url_function() {
	$code_string = get_stylesheet_directory_uri();
	return $code_string;
}

function home_url_function() {
	$code_string = home_url('/');
	return $code_string;
}

function display_author_function() {
  $code_string = get_the_author();
  return $code_string;
}

function register_shortcodes(){
	// shotcode to echo home URL
	add_shortcode('home_url', 'home_url_function');
	
	// shotcode to echo theme URL
	add_shortcode('theme_url', 'theme_url_function');

  // ??
  add_shortcode('display_author', 'display_author_function');
	
  /* MM/MT Button Forms */
  add_shortcode('display_button', 'display_button_function');
	add_shortcode('display_button_mobility', 'display_button_mobility_function');
	add_shortcode('display_gray_button', 'display_gray_button_function');
	add_shortcode('display_orange_button', 'display_orange_button_function');

  /* MM Marketo Forms */
  add_shortcode('MM_marketo_form', 'MM_marketo_form_function');
  add_shortcode('MM_marketo_form_LP', 'MM_marketo_form_LP_function');
  add_shortcode('MM_marketo_form_LP_bottom', 'MM_marketo_form_LP_bottom_function');
  
  // No phone number versions
  add_shortcode('MM_marketo_form_nophone', 'MM_marketo_form_nophone_function');
  add_shortcode('MM_marketo_form_LP_nophone', 'MM_marketo_form_LP_nophone_function');
  add_shortcode('MM_marketo_form_LP_nophone_bottom', 'MM_marketo_form_LP_nophone_bottom_function');

  add_shortcode('MM_marketo_email_form', 'MM_marketo_email_form_function');
  add_shortcode('MM_marketo_contact_form', 'MM_marketo_contact_form_function');


  /* MT Marketo Forms */
  add_shortcode('MT_marketo_form', 'MT_marketo_form_function');
  add_shortcode('MT_marketo_inline_form', 'MT_marketo_inline_form_function');
  //add_shortcode('MT_marketo_email_form', 'MT_marketo_email_form_function');
  add_shortcode('MT_marketo_contact_form', 'MT_marketo_contact_form_function');
}

add_action( 'init', 'register_shortcodes');

function blankslate_setup(){
load_theme_textdomain('blankslate', get_template_directory() . '/languages');
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );

 if (class_exists('MultiPostThumbnails')) {
        new MultiPostThumbnails(
            array(
                'label' => 'Secondary Image',
                'id' => 'secondary-image',
                'post_type' => 'page'
            )
        );
    }

global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'blankslate' ) )
);
}
add_action('comment_form_before', 'blankslate_enqueue_comment_reply_script');
function blankslate_enqueue_comment_reply_script()
{
if(get_option('thread_comments')) { wp_enqueue_script('comment-reply'); }
}
add_filter('the_title', 'blankslate_title');
function blankslate_title($title) {
if ($title == '') {
return 'Untitled';
} else {
return $title;
}
}
add_filter('wp_title', 'blankslate_filter_wp_title');
function blankslate_filter_wp_title($title)
{
return $title . esc_attr(get_bloginfo('name'));
}
add_filter('comment_form_defaults', 'blankslate_comment_form_defaults');
function blankslate_comment_form_defaults( $args )
{
$req = get_option( 'require_name_email' );
$required_text = sprintf( ' ' . __('Required fields are marked %s', 'blankslate'), '<span class="required">*</span>' );
$args['comment_notes_before'] = '<p class="comment-notes">' . __('Your email is kept private.', 'blankslate') . ( $req ? $required_text : '' ) . '</p>';
$args['title_reply'] = __('Post a Comment', 'blankslate');
$args['title_reply_to'] = __('Post a Reply to %s', 'blankslate');
return $args;
}
add_action( 'init', 'blankslate_set_default_widgets' );
function blankslate_set_default_widgets() {
if ( is_admin() && isset( $_GET['activated'] ) ) {
update_option( 'sidebars_widgets', $preset_widgets );
}
}
add_action( 'init', 'blankslate_add_shortcodes' );
function blankslate_add_shortcodes() {
add_filter('widget_text', 'do_shortcode');
add_shortcode('wp_caption', 'fixed_img_caption_shortcode');
add_shortcode('caption', 'fixed_img_caption_shortcode');
}
function fixed_img_caption_shortcode($attr, $content = null) {
$output = apply_filters('img_caption_shortcode', '', $attr, $content);
if ( $output != '' ) return $output;
extract(shortcode_atts(array(
'id'=> '',
'align'	=> 'alignnone',
'width'	=> '',
'caption' => ''), $attr));
if ( 1 > (int) $width || empty($caption) )
return $content;
if ( $id ) $id = 'id="' . esc_attr($id) . '" ';
return '<div ' . $id . 'class="wp-caption ' . esc_attr($align)
. '">'
. do_shortcode( $content ) . '<p class="wp-caption-text">'
. $caption . '</p></div>';
}
add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init() {
register_sidebar( array (
'name' => __('Sidebar Widget Area', 'blankslate'),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
$preset_widgets = array (
'primary-aside'  => array( 'search', 'pages', 'categories', 'archives' ),
);
function blankslate_get_page_number() {
if (get_query_var('paged')) {
print ' | ' . __( 'Page ' , 'blankslate') . get_query_var('paged');
}
}
function blankslate_catz($glue) {
$current_cat = single_cat_title( '', false );
$separator = "\n";
$cats = explode( $separator, get_the_category_list($separator) );
foreach ( $cats as $i => $str ) {
if ( strstr( $str, ">$current_cat<" ) ) {
unset($cats[$i]);
break;
}
}
if ( empty($cats) )
return false;
return trim(join( $glue, $cats ));
}
function blankslate_tag_it($glue) {
$current_tag = single_tag_title( '', '',  false );
$separator = "\n";
$tags = explode( $separator, get_the_tag_list( "", "$separator", "" ) );
foreach ( $tags as $i => $str ) {
if ( strstr( $str, ">$current_tag<" ) ) {
unset($tags[$i]);
break;
}
}
if ( empty($tags) )
return false;
return trim(join( $glue, $tags ));
}
function blankslate_commenter_link() {
$commenter = get_comment_author_link();
if ( ereg( '<a[^>]* class=[^>]+>', $commenter ) ) {
$commenter = preg_replace( '/(<a[^>]* class=[\'"]?)/', '\\1url ' , $commenter );
} else {
$commenter = preg_replace( '/(<a )/', '\\1class="url "' , $commenter );
}
$avatar_email = get_comment_author_email();
$avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, 80 ) );
echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
}
function blankslate_custom_comments($comment, $args, $depth) {
$GLOBALS['comment'] = $comment;
$GLOBALS['comment_depth'] = $depth;
?>
<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
<div class="comment-author vcard"><?php blankslate_commenter_link() ?></div>
<div class="comment-meta"><?php printf(__('Posted %1$s at %2$s', 'blankslate' ), get_comment_date(), get_comment_time() ); ?><span class="meta-sep"> | </span> <a href="#comment-<?php echo get_comment_ID(); ?>" title="<?php _e('Permalink to this comment', 'blankslate' ); ?>"><?php _e('Permalink', 'blankslate' ); ?></a>
<?php edit_comment_link(__('Edit', 'blankslate'), ' <span class="meta-sep"> | </span> <span class="edit-link">', '</span>'); ?></div>
<?php if ($comment->comment_approved == '0') { echo '\t\t\t\t\t<span class="unapproved">'; _e('Your comment is awaiting moderation.', 'blankslate'); echo '</span>\n'; } ?>
<div class="comment-content">
<?php comment_text() ?>
</div>
<?php
if($args['type'] == 'all' || get_comment_type() == 'comment') :
comment_reply_link(array_merge($args, array(
'reply_text' => __('Reply','blankslate'),
'login_text' => __('Login to reply.', 'blankslate'),
'depth' => $depth,
'before' => '<div class="comment-reply-link">',
'after' => '</div>'
)));
endif;
?>
<?php }
function blankslate_custom_pings($comment, $args, $depth) {
$GLOBALS['comment'] = $comment;
?>
<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
<div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'blankslate'),
get_comment_author_link(),
get_comment_date(),
get_comment_time() );
edit_comment_link(__('Edit', 'blankslate'), ' <span class="meta-sep"> | </span> <span class="edit-link">', '</span>'); ?></div>
<?php if ($comment->comment_approved == '0') { echo '\t\t\t\t\t<span class="unapproved">'; _e('Your trackback is awaiting moderation.', 'blankslate'); echo '</span>\n'; } ?>
<div class="comment-content">
<?php comment_text() ?>
</div>
<?php }