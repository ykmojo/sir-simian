<?php
include "credentials.inc";
$today = date("Y-m-d", time());
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sir Simian</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" type="text/css" href="head_main.css" />
  <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
  <script type="text/javascript" language="javascript" src="headlines_script.js"></script>
  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
  <script type="text/javascript">
  CKEDITOR.config.customConfig = 'custom-config.js';
    function makeEditor(numId) {
      var editor_height = 0;
      if(numId == "conundrum_dek" || numId == "maindish_dek" || numId == "twmustread_dek" || numId == "topstory_dek" || numId == "fft_hidden_kitchen" || numId == "fft_ioe_item1" || numId == "fft_ioe_item2" || numId == "fft_ioe_item3" || numId == "lift_note" || numId == "main_text") {
          CKEDITOR.replace(numId, {
              width: 470,
              height: 200
            });
          CKEDITOR.config.scayt_autoStartup = true;
        	CKEDITOR.config.scayt_sLang = 'en_US';
          CKEDITOR.config.extraPlugins = 'autogrow,justify';
          CKEDITOR.config.autoGrow_minHeight = 200;
          CKEDITOR.config.autoGrow_maxHeight = 400;
          CKEDITOR.config.resize_enabled = true;
          CKEDITOR.instances[numId].on('blur', function(e) {
             var temp_text = CKEDITOR.instances[numId].getData();
             var clean_text = cleanstring(temp_text);
             CKEDITOR.instances[numId].setData(clean_text);
             //console.log(clean_text);
          });
      }
      else if(numId == "fft_article_1" || numId == "fft_article_2" || numId == "fft_article_3" || numId == "fft_article_4" || numId == "fft_article_5" || numId == "fft_article_6" || numId == "fft_snack_box" || numId == "fft_sb_attr" || numId == "fft_hk_leadin" || numId == "fft_bite_add" || numId == "membership_slot") {
          CKEDITOR.replace(numId, {
              width: 470,
              height: 100
            });
          CKEDITOR.config.scayt_autoStartup = true;
        	CKEDITOR.config.scayt_sLang = 'en_US';
          CKEDITOR.config.extraPlugins = 'autogrow,justify';
          CKEDITOR.config.autoGrow_minHeight = 100;
          CKEDITOR.config.autoGrow_maxHeight = 200;
          CKEDITOR.config.resize_enabled = true;
          CKEDITOR.instances[numId].on('blur', function(e) {
             var temp_text = CKEDITOR.instances[numId].getData();
             var clean_text = cleanstring(temp_text);
             CKEDITOR.instances[numId].setData(clean_text);
             //console.log(clean_text);
          });
      }
      else {
        editor_height = "200";
      }
    }
    </script>
</head>
<body>
  <div id="header">
    <h2 id="head_text">Sir Simian</h2>
    <a href="" id="section_image" target="_blank"><img src="logo_inside.gif" border="0" id="type_img" width="600" style="max-width:600px;margin: 0 auto;" /></a>
    <br style="clear:both;margin-bottom:5px;" />
  </div>
  <form id="headlinesForm" action="" method="post">
    <div id="head_row">
    	<div id="top_section">
    		<p style="float:left;width:300px;">To get started, choose a newsletter under Headline Category.<br /><br /><span style="color:#c33;font-weight:bold;">IMPORTANT: Before adding stories, click on View Headlines Archives to see if there is already a newsletter created for the date that you want. If so, use that one. If not, go ahead and create the newsletter as usual.</span></p>
    		<div style="width:300px;float:left;">
    		<p>Headlines's date (format:2012-02-29): <input type="text" id="hed_date" name="date_today" size="10" value="" /></p>
        	<p>Headlines category:
      		<select id="hed_type" name="hed_type" onchange="javascript:getTypeImg(this.value);">
        		<option value="not">Make a choice...</option>
        		<option value="breaking_news" disabled>Breaking News</option>
        		<option value="econundrums_new">Econundrum</option>
        		<option value="food_for_thought_redesign">Food for Thought Redesign</option>
        		<option value="food_for_thought_new">Food for Thought</option>
        		<option value="in_the_mix_new">In The Mix</option>
        		<option value="political_mojo_new">Political Mojo</option>
      		</select>
      		</p>
        	<p>Headlines archives:
        		<select id="archives" onchange="javascript:getArchive();">
        		</select>
        	</p>
        	<br />
        	<input type="button" value="Refresh data" onclick="javascript:getArchive();" style="margin-top:10px;float:left;background-color:#c21;color:#fff;font-weight:bold;" id="refresh_data" />
        	<br />
        	<input type="button" value="View Headlines Archives" onclick="location.href='archives/'" style="margin:5px 0;padding:0 0;float:left;font-size:.75em;color:#ffffff;background-color:#000000;clear:both;" />
        	<input type="button" value="Newsletter Stats" onclick="window.open('news-stats.html', 'Newsletter Stats', 'toolbar=no,width=1200,scrollbars=yes');" style="margin-left: 0;padding: 10px;color:#fff;background-color:#000;" />
        	</div>
      </div>
    </div>
		<div style="text-align:center;clear:both;width:555px;margin:0 auto;padding: 20px 0;">
     	<p id="subject_line_label">Email subject line: <input type="text" id="subject_line" name="subject_line" value="" size="80" spellcheck="true" /></p>
    </div>
    <br style="clear:both;" />
    <p id="wysiwig_msg" class="block_hidden">Please wait until the WYSIWIG loads completely.  Thank you.</p>
    <br style="clear:both;" />
  <div id="main_container">
  </div>
  <br style="clear:both;" />
  <div id="ad_section" class="block_hidden">
    <p class="ad_label">Advertiser: &nbsp;<input id="ad_name" name="advertiser_name" type="text" value="" size="40" /></p>
    <p class="ad_label">Billboard Url: &nbsp;<input id="ad_link_bill" name="billboard_url" type="text" value="" size="40" onblur="this.value=fixURL(this.value)" /></p>
    <p class="ad_label">Billboard Image: &nbsp;<input id="ad_billboard" name="billboard_img" type="text" value="" size="40" /></p>
    <br /><br />
    <p class="ad_label">Advertiser 2: &nbsp;<input id="ad_name2" name="advertiser_name2" type="text" value="" size="40" /></p>
    <p class="ad_label">Billboard Url 2: &nbsp;<input id="ad_link_banner" name="billboard_url2" type="text" value="" size="40" onblur="this.value=fixURL(this.value)" /></p>
    <p class="ad_label">Billboard Image 2: &nbsp;<input id="ad_banner" name="billboard_img2" type="text" value="" size="40" /></p>
    <p style="text-align:center;font-size:16px;font-weight:bold;border-top:1px dashed #000;">Membership ad slot override:</p>
    <p class="ad_label">Membership text section for redesigned newsletter:<br />
    <textarea id="membership_slot" name="membership_slot" rows="5" cols="60"></textarea></p>
    <p class="ad_label">Code field for old newsletter format (for complex HTML ad: This field overrides the Sub url & Sub image fields):<br />
    <textarea rows="5" cols="60" id="sub_code" name="sub_code"></textarea></p>
    <p class="ad_label">Sub url: &nbsp;<input id="sub_url" name="sub_url" type="text" value="" size="40" onblur="this.value=fixURL(this.value)" /></p>
    <p class="ad_label">Sub image: &nbsp;<input type="text" value="" id="sub_image" name="sub_image" size="40" /></p>
    <p class="ad_label">Sub alt text: &nbsp;<input type="text" value="" id="sub_text" name="sub_text" size="40" /></p>
    
    <p style="text-align:center;font-size:16px;font-weight:bold;border-top:1px dashed #000;">Lift-Note Section</p>
    <p class="ad_label"><textarea rows="10" cols="60" id="lift_note" name="lift_note"></textarea></p>
    
    <!-- <p style="float:left;margin:5px 10px 0 0;">Text Ad:</p> &nbsp;<textarea id="text_ad_dek" name="text_ad_dek" type="text" rows="5" cols="10"></textarea>-->
  </div>
    <hr style="width:900px;clear:both;" />
    <div id="footer_row" class="block_hidden">
      <input type="button" value="Preview" onclick="checkForm('preview');" />
      <input type="button" value="Submit Headlines" onclick="checkForm('not');" />
    </div>
  </form>
</body>
</html>