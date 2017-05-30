<?php
header("Content-Type: text/html;charset=UTF-8");
include "credentials.inc";
//ajax functions for headlines app

//get requests from either add section button or the form to submit
if($_REQUEST['section']) {
  $section = $_REQUEST['section'];
  createDivs($section);
}

if($_REQUEST['archive'] && $_REQUEST['date']) {
  $get_type = $_REQUEST['archive'];
  $get_date = $_REQUEST['date'];

  getArchives($get_type, $get_date);
}

if($_REQUEST['existing']) {
  $get_section = trim($_REQUEST['existing']);

  checkExisting($get_section);
}

if($_REQUEST['arch_type'] && $_REQUEST['date']) {
  $archive = $_REQUEST['arch_type'];
  $date_arch = $_REQUEST['date'];
  retrieveArchive($archive, $date_arch);
}

function retrieveArchive($arch_type, $arch_date) {
  include "credentials.inc";
  $db_con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbdb) or die("Can't connect to DB");
  $qry_string = sprintf("SELECT * FROM %s WHERE hed_date='%s'", $arch_type, $arch_date);
  $arch_qry = mysqli_query($db_con, $qry_string) or die("Can't run query" . mysqli_error($db_con));
  mysql_query("set names 'utf8'");
  $data_return = "";
  $result = mysqli_fetch_assoc($arch_qry);

  foreach($result as $key=>$value) {
    $value = stripslashes($value);
    $data_return .= $key . "~" . $value . "^";
  }

  print $data_return;
}

function checkExisting($section_type) {
  include "credentials.inc";
  $db_con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbdb);
  $date_array = "none";

  $check_qry = sprintf("SELECT id, hed_date FROM %s ORDER By hed_date DESC", $section_type);
  $run_qry = mysqli_query($db_con, $check_qry) or die("can't run query");

  if(mysqli_num_rows($run_qry) > 0) {
    $date_array = "";
    while($get_dates = mysqli_fetch_assoc($run_qry)) {
      $date_array .= $get_dates['id'];
      $date_array .= ":" . $get_dates['hed_date'];
      $date_array .= "?";
    }
  }
  print $date_array;
  mysqli_free_result($run_qry);
  mysqli_close($db_con);
}

//add more divs to section (left or right side)
function createDivs($section) {
  $get_divs = ""; //var to hold html code for each section separated by divs

  switch($section) {
    case "econundrums_new":
      	$get_divs = econundrum();
      	break;
    case "food_for_thought_redesign":
    	$get_divs = fft_redesign();
    	break;
    case "in_the_mix_new":
  		$get_divs = inthemix();
  		break;
	case "political_mojo_new":
		$get_divs = politics();
		break;
	case "breaking_news":
		$get_divs = breaking_news();
		break;
	case "trumpocracy":
		$get_divs = trumpocracy();
    default:
  }

  print $get_divs;
}

//Breaking News
function breaking_news() {
$breaking_news = <<<BREAKING
<div class="head_types">
  <div class="columns">
	<div id="items_left">
	  <h3>Breaking News</h3>
	  <div class="sections">
	    <p>Breaking News Lead: <input type="text" id="breaking" name="breaking" value="" size="45" maxlength="255" spellcheck="true" /></p>
	    <p>Breaking News Lead URL: <input type="text" id="breaking_url" name="breaking_url" value="" size="45" onblur="this.value=fixURL(this.value)" />
	    <p>Breaking News Main Text:</p>
	    <textarea rows="15" cols="45" id="main_text" name="main_text"></textarea>
      </div>
	</div>
  </div>
  <div class="columns">
	<div id="items_right">
	  <h3>More Section</h3>
      <div class="sections">
		<p>Item 1 text: <input type="text" id="bn_item1" name="bn_item1" value="" size="45" maxlength="255" spellcheck="true" /></p>
	    <p>Item 1 URL: <input type="text" id="bn_item1_url" name="bn_item1_url" value="" size="45" onblur="this.value=fixURL(this.value)" />
      </div>
      <div class="sections">
		<p>Item 2 text: <input type="text" id="bn_item2" name="bn_item2" value="" size="45" maxlength="255" spellcheck="true" /></p>
	    <p>Item 2 URL: <input type="text" id="bn_item2_url" name="bn_item2_url" value="" size="45" onblur="this.value=fixURL(this.value)" />
      </div>
      <div class="sections">
		<p>Item 3 text: <input type="text" id="bn_item3" name="bn_item3" value="" size="45" maxlength="255" spellcheck="true" /></p>
	    <p>Item 3 URL: <input type="text" id="bn_item3_url" name="bn_item3_url" value="" size="45" onblur="this.value=fixURL(this.value)" />
      </div>
      <div class="sections">
		<p>Item 4 text: <input type="text" id="bn_item4" name="bn_item4" value="" size="45" maxlength="255" spellcheck="true" /></p>
	    <p>Item 4 URL: <input type="text" id="bn_item4_url" name="bn_item4_url" value="" size="45" onblur="this.value=fixURL(this.value)" />
      </div>
      <div class="sections">
		<p>Item 5 text: <input type="text" id="bn_item5" name="bn_item5" value="" size="45" maxlength="255" spellcheck="true" /></p>
	    <p>Item 5 URL: <input type="text" id="bn_item5_url" name="bn_item5_url" value="" size="45" onblur="this.value=fixURL(this.value)" />
      </div>
	</div>
  </div>
</div>
BREAKING;

return $breaking_news;
}

//Econundrums
function econundrum() {
$econundrum = <<<ECONUNDRUM
<div class="head_types">
  <div class="columns">
    <div id="items_left">
	  <h3>Main Article</h3>
      <h4><input class="section_titles" id="this_week" name="this_week" type="text" value="This Week's Econundrum" onfocus="checkHedDate()" /></h4>
      <div class="sections">
        <p>Headline: <input type="text" id="conundrum_hed" name="conundrum_hed" size="50" maxlength="255" onblur="this.value=cleanstring(this.value)" spellcheck="true" onfocus="checkHedDate()" /></p>
        <p>Url: <input type='text' id='conundrum_url' name='conundrum_url' size='50' onblur="this.value=fixURL(this.value)" onfocus="checkHedDate()" /></p>
        <p class='dek_sect'>Body Text:</p>
        <textarea rows='15' cols='45' id='conundrum_dek' name='conundrum_dek' onfocus="checkHedDate()"></textarea>
      </div>
    </div>
  </div>
  <div class="columns">
		<div id="items_right">
			<h3>Section 2</h3>
			<h4><input type="text" class="section_titles" id="envirohealth_title" name="envirohealth_title" value="More Environment &amp; Health Coverage" onfocus="checkHedDate()" /></h4>
    	<div class="sections">
      	<p>Headline 1: <input type="text" id="envirohealth1_hed" name="envirohealth1_hed" size="50" maxlength="255" onblur="this.value=cleanstring(this.value)" spellcheck="true" onfocus="checkHedDate()" /></p>
      <p>Url 1: <input type='text' id='envirohealth1_url' name='envirohealth1_url' size='50' onblur="this.value=fixURL(this.value)" onfocus="checkHedDate()" /></p>
		</div>
		<div class="sections">
			<p>Headline 2: <input type="text" id="envirohealth2_hed" name="envirohealth2_hed" size="50" maxlength="255" onblur="this.value=cleanstring(this.value)" spellcheck="true" onfocus="checkHedDate()" /></p>
		    <p>Url 2: <input type='text' id='envirohealth2_url' name='envirohealth2_url' size='50' onblur="this.value=fixURL(this.value)" onfocus="checkHedDate()" /></p>
    </div>
		<div class="sections">
			<p>Headline 3: <input type="text" id="envirohealth3_hed" name="envirohealth3_hed" size="50" maxlength="255" onblur="this.value=cleanstring(this.value)" spellcheck="true" onfocus="checkHedDate()" /></p>
		    <p>Url 3: <input type='text' id='envirohealth3_url' name='envirohealth3_url' size='50' onblur="this.value=fixURL(this.value)" onfocus="checkHedDate()" /></p>
    </div>

		<h3>Bottom section</h3>
    <h4><input type="text" class="section_titles" id="moremojo_title" name="moremojo_title" value="More from MoJo" onfocus="checkHedDate()" /></h4>
    <div class="sections">
			<p>Headline 1: <input type="text" id="moremojo_hed" name="moremojo_hed" size="50" maxlength="255" onblur="this.value=cleanstring(this.value)" spellcheck="true" onfocus="checkHedDate()" /></p>
     	<p>Url 1: <input type="text" id="moremojo_url" name="moremojo_url" size="50" onblur="this.value=fixURL(this.value)" onfocus="checkHedDate()" /></p>
    </div>
    <div class="sections">
			<p>Headline 2: <input type="text" id="moremojo2_hed" name="moremojo2_hed" size="50" maxlength="255" onblur="this.value=cleanstring(this.value)" spellcheck="true" onfocus="checkHedDate()" /></p>
     	<p>Url 2: <input type="text" id="moremojo2_url" name="moremojo2_url" size="50" onblur="this.value=fixURL(this.value)" onfocus="checkHedDate()" /></p>
    </div>
	</div>
</div>
ECONUNDRUM;

return $econundrum;
}

//Food for Thought Redesign
function fft_redesign() {
$fft_redesign = <<<FFTRED
<div class="head_types">
  <div class="columns">
    <div id="items_left">
	  <h3>Main Section</h3>
	  <div class="sections">
		<p>Main hed: <input type="text" id="fft_main_hed" name="fft_main_hed" size="50" maxlength="255" onblur="this.value=cleanstring(this.value)" onfocus="checkHedDate()" /></p>
		<p>Main url: <input type="text" id="fft_main_hed_url" name="fft_main_hed_url" size="50" maxlength="512" onblur="this.value=fixURL(this.value)" /></p>
		<p>Main image (url to image): <input type="text" id="fft_main_img" name="fft_main_img" size="50" onfocus="checkHedDate()" />
		<p>Article 1:</p>
		<textarea id="fft_article_1" name="fft_article_1" rows="4" cols="45" onfocus="checkHedDate()"></textarea>
		<p>Article 2:</p>
		<textarea id="fft_article_2" name="fft_article_2" rows="4" cols="45" onfocus="checkHedDate()"></textarea>
		<p>Article 3:</p>
		<textarea id="fft_article_3" name="fft_article_3" rows="4" cols="45" onfocus="checkHedDate()"></textarea>
		<p>Article 4:</p>
		<textarea id="fft_article_4" name="fft_article_4" rows="4" cols="45" onfocus="checkHedDate()"></textarea>
		<p>Article 5:</p>
		<textarea id="fft_article_5" name="fft_article_5" rows="4" cols="45" onfocus="checkHedDate()"></textarea>
		<p>Article 6:</p>
		<textarea id="fft_article_6" name="fft_article_6" rows="4" cols="45" onfocus="checkHedDate()"></textarea>
	  </div>
	  <h4><input type="text" class="section_titles" id="snack_box" name="snack_box" value="One Great Tidbit" onblur="this.value=cleanstring(this.value)" onfocus="checkHedDate()" /></h4>
	  <div class="sections">
		<p>Body text:</p>
		<textarea id="fft_snack_box" name="fft_snack_box"></textarea>
		<p>Image source: <input type="text" id="fft_sb_image" name="fft_sb_image" size="50" maxlength="512" onfocus="checkHedDate()" /></p>
		<p>Attribution/Caption:</p>
		<textarea id="fft_sb_attr" name="fft_sb_attr" onfocus="checkHedDate()"></textarea>
	  </div>
	</div>
  </div>
  <div class="columns">
	<div id="items_right">
	  <h4><input type="text" class="section_titles" id="in_our_ears" name="in_our_ears" value="This Week in Podcasts" onblur="this.value=cleanstring(this.value)" onfocus="checkHedDate()" /></h4>
	  <div class="sections">
		<p>First Item: </p>
		<textarea id="fft_ioe_item1" name="fft_ioe_item1" onfocus="checkHedDate()"></textarea>
		<p>If this item is not a Bite plug, please leave blank.</p>
		<div class="sections">
		<p>Bite episode link: <input type="text" id="fft_bite_link" name="fft_bite_link" size="50" maxlength="512" onfocus="checkHedDate()" /></p>
		<p>Bite episode description:</p>
		<textarea id="fft_bite_add" name="fft_bite_add" onfocus="checkHedDate()"></textarea>
		</div>
		<p>Second Item:</p>
		<textarea id="fft_ioe_item2" name="fft_ioe_item2" onfocus="checkHedDate()"></textarea>
		<p>Third Item:</p>
		<textarea id="fft_ioe_item3" name="fft_ioe_item3" onfocus="checkHedDate()"></textarea>
	  </div>
	  <h4><input type="text" class="section_titles" id="hidden_kitchen" name="hidden_kitchen" value="Exclusive to Newsletter Subscribers" onblur="this.value=cleanstring(this.value)" onfocus="checkHedDate()" /></h4>
	  <div class="sections">
		<p>Lead in:</p>
		<textarea id="fft_hk_leadin" name="fft_hk_leadin" onfocus="checkHedDate()"></textarea>
		<p>Body text:</p>
		<textarea id="fft_hidden_kitchen" name="fft_hidden_kitchen" onfocus="checkHedDate()"></textarea>
	  </div>
	</div>
  </di>
</div>
FFTRED;

return $fft_redesign;
}

//In the Mix
function inthemix() {
$inthemix = <<<INTHEMIX
<div class="head_types">
  <div class="columns">
    <div id="items_left">
			<h3>Main Article</h3>
			<h4><input type="text" class="section_titles" id="twmustread_title" name="twmustread_title" value="Must-Read" onfocus="checkHedDate()" /></h4>
      <div class="sections">
        <p>Headline: <input type="text" id="twmustread_hed" name="twmustread_hed" size="50" maxlength="255" onblur="this.value=cleanstring(this.value)" spellcheck="true" onfocus="checkHedDate()" /></p>
        <p>Url: <input type="text" id="twmustread_url" name="twmustread_url" size="50" onblur="this.value=fixURL(this.value)" onfocus="checkHedDate()" /></p>
				<p class="dek_sect">Body Text:</p>
        <textarea rows="8" cols="45" id="twmustread_dek" name="twmustread_dek" onfocus="checkHedDate()"></textarea>
      </div>
    </div>
	</div>
	<div class="columns">
		<div id="items_right">
			<h3>Section 2</h3>
      <h4><input type="text" class="section_titles" id="morefrommix_title" name="morefrommix_title" value="More News" onfocus="checkHedDate()" /></h4>
      <div class="sections">
        <p>Headline 1: <input type="text" id="morefrommix1_hed" name="morefrommix1_hed" size="50" maxlength="255" onblur="this.value=cleanstring(this.value)" spellcheck="true" onfocus="checkHedDate()" /></p>
        <p>Url 1: <input type="text" id="morefrommix1_url" name="morefrommix1_url" size="50" onblur="this.value=fixURL(this.value)" onfocus="checkHedDate()" /></p>
      </div>
      <div class="sections">
        <p>Headline 2: <input type="text" id="morefrommix2_hed" name="morefrommix2_hed" size="50" maxlength="255" onblur="this.value=cleanstring(this.value)" spellcheck="true" onfocus="checkHedDate()" /></p>
        <p>Url 2: <input type="text" id="morefrommix2_url" name="morefrommix2_url" size="50" onblur="this.value=fixURL(this.value)" onfocus="checkHedDate()" /></p>
      </div>
      <div class="sections">
        <p>Headline 3: <input type="text" id="morefrommix3_hed" name="morefrommix3_hed" size="50" maxlength="255" onblur="this.value=cleanstring(this.value)" spellcheck="true" onfocus="checkHedDate()" /></p>
        <p>Url 3: <input type="text" id="morefrommix3_url" name="morefrommix3_url" size="50" onblur="this.value=fixURL(this.value)" onfocus="checkHedDate()" /></p>
      </div>
			
			<h3>Bottom Section</h3>
      <h4><input type="text" class="section_titles" id="fromarchive_title" name="fromarchive_title" value="Don't Miss" onfocus="checkHedDate()" /></h4>
			<div class="sections">
				<p>Headline 1: <input type="text" id="fromarchive1_hed" name="fromarchive1_hed" size="50" maxlength="255" onblur="this.value=cleanstring(this.value)" spellcheck="true" onfocus="checkHedDate()" /></p>
				<p>Url 1: <input type="text" id="fromarchive1_url" name="fromarchive1_url" size="50" onblur="this.value=fixURL(this.value)" onfocus="checkHedDate()" /></p>
			</div>
			<div class="sections">
				<p>Headline 2: <input type="text" id="fromarchive2_hed" name="fromarchive2_hed" size="50" maxlength="255" onblur="this.value=cleanstring(this.value)" spellcheck="true" onfocus="checkHedDate()" /></p>
				<p>Url 2: <input type="text" id="fromarchive2_url" name="fromarchive2_url" size="50" onblur="this.value=fixURL(this.value)" onfocus="checkHedDate()" /></p>
			</div>
		</div>
	</div>
</div>
INTHEMIX;

return $inthemix;
}

//Political Mojo
function politics() {
$political = <<<POLITICAL
<div class="head_types">
  <div class="columns">
    <div id="items_left">
			<h3>Main Article</h3>
      <h4><input class="section_titles" id="topstory_title" name="topstory_title" type="text" value="This Week's Top Story" onfocus="checkHedDate()" /></h4>
      <div class="sections">
        <p>Headline: <input type="text" id="topstory_hed" name="topstory_hed" size="50" value="" maxlength="255" onblur="this.value=cleanstring(this.value)" spellcheck="true" onfocus="checkHedDate()" /></p>
        <p>Url: <input type="text" id="topstory_url" name="topstory_url" size="50" onblur="this.value=fixURL(this.value)" onfocus="checkHedDate()" /></p>
				<p class="dek_sect">Body Text</p>
        <textarea rows="5" cols="45" id="topstory_dek" name="topstory_dek" onfocus="checkHedDate()"></textarea>
      </div>
    </div>
  </div>
  <div class="columns">
		<div id="items_right">
			<h3>Section 2</h3>
      <h4><input class="section_titles" id="inothernews_title" name="inothernews_title" type="text" value="In Other News" onfocus="checkHedDate()" /></h4>
      <div class="sections">
        <p>Headline 1: <input type="text" id="inothernews_hed" name="inothernews_hed" size="50" maxlength="255" onblur="this.value=cleanstring(this.value)" spellcheck="true" onfocus="checkHedDate()" /></p>
        <p>Url 1: <input type="text" id="inothernews_url" name="inothernews_url" size="50" onblur="this.value=fixURL(this.value)" onfocus="checkHedDate()" /></p>
      </div>
      <div class="sections">
        <p>Headline 2: <input type="text" id="inothernews2_hed" name="inothernews2_hed" size="50" maxlength="255" onblur="this.value=cleanstring(this.value)" spellcheck="true" onfocus="checkHedDate()" /></p>
        <p>Url 2: <input type="text" id="inothernews2_url" name="inothernews2_url" size="50" onblur="this.value=fixURL(this.value)" onfocus="checkHedDate()" /></p>
      </div>
      <div class="sections">
        <p>Headline 3: <input type="text" id="inothernews3_hed" name="inothernews3_hed" size="50" maxlength="255" onblur="this.value=cleanstring(this.value)" spellcheck="true" onfocus="checkHedDate()" /></p>
        <p>Url 3: <input type="text" id="inothernews3_url" name="inothernews3_url" size="50" onblur="this.value=fixURL(this.value)" onfocus="checkHedDate()" /></p>
      </div>

			<h3>Bottom Section</h3>
			<h4><input class="section_titles" id="mostread_title" name="mostread_title" type="text" value="Most Read" onfocus="checkHedDate()" /></h4>
			<div class="sections">
				<p>Headline 1: <input type="text" id="mostread1_hed" name="mostread1_hed" size="50" maxlength="255" onblur="this.value=cleanstring(this.value)" spellcheck="true" onfocus="checkHedDate()" /></p>
				<p>Url 1: <input type="text" id="mostread1_url" name="mostread1_url" size="50" onblur="this.value=fixURL(this.value)" onfocus="checkHedDate()" /></p>
			</div>
			<div class="sections">
				<p>Headline 2: <input type="text" id="mostread2_hed" name="mostread2_hed" size="50" maxlength="255" onblur="this.value=cleanstring(this.value)" spellcheck="true" onfocus="checkHedDate()" /></p>
				<p>Url 2: <input type="text" id="mostread2_url" name="mostread2_url" size="50" onblur="this.value=fixURL(this.value)" onfocus="checkHedDate()" /></p>
			</div>
		</div>
	</div>
</div>
POLITICAL;

return $political;
}

function trumpocracy() {
$trumpocracy = <<<TRUMP
<div class="head_types">
	<div class="columns">
		<div id="items_left">
			<fieldset>
			<legend>Main Article</legend>
			<div class="sections">
				<p>Headline: <input type="text" id="trump_main_hed" name="trump_main_hed" size="50" maxlength="255" onblur="this.value=cleanstring(this.value)" spellcheck="true" onfocus="checkHedDate()" /></p>
				<p>Url: <input type="text" id="trum_main_url" name="trum_main_url" size="50" onblur="this.value=fixURL(this.value)" /></p>
				<p>Image url: <input type="text" id="trump_main_img" size="50" onblur="this.value=fixURL(this.value)" /></p>
				<p class="dek_sect">Dek:</p>
				<textarea rows="15" cols="45" id="trum_main_dek" name="trum_main_dek" onfocus="checkHedDate()"></textarea>
				<p class="sources"><fieldset style="float:left;width:50%;clear:both;"><legend>Source name</legend> <input type="text" id="trump_main_source" name="trump_main_source" style="width:95%;" onblur="this.value=fixURL(this.value)"></fieldset> <fieldset style="float:left;width:25%;"><legend>Italicize source?</legend> <input type="checkbox" id="trump_main_ital" name="trump_main_ital" style="float:left;"></fieldset></p>
			</div>
			</fieldset>

			<fieldset>
			<legend><input type="text" class="section_titles" id="topnews_title" name="topnews_title" value="TOP NEWS" onfocus="checkHedDate()" /></legend>
			<div class="sections">
				<p>Headline 1:</p>
				<textarea id="topnews1_dek" name="topnews1_dek" rows="15" cols="45" onfocus="checkHedDate()"></textarea>
			</div>
			<div class="sections">
				<p>Headline 2:</p>
				<textarea id="topnews2_dek" name="topnews2_dek" rows="15" cols="45" onfocus="checkHedDate()"></textarea>
			</div>
			<div class="sections">
				<p>Headline 3:</p>
				<textarea id="topnews3_dek" name="topnews3_dek" rows="15" cols="45" onfocus="checkHedDate()"></textarea>
			</div>
			<div class="sections">
				<p>Headline 4:</p>
				<textarea id="topnews4_dek" name="topnews4_dek" rows="15" cols="45" onfocus="checkHedDate()"></textarea>
			</div>
			<div class="sections">
				<p>Headline 5:</p>
				<textarea id="topnews5_dek" name="topnews5_dek" rows="15" cols="45" onfocus="checkHedDate()"></textarea>
			</div>
			</fieldset>
		</div>
	</div>
	<div class="columns">
		<div id="items_right">
			<fieldset>
			<legend>Second Main Article</legend>
			<div class="sections">
				<p>Headline: <input type="text" id="trump_main2_hed" name="trump_main2_hed" size="50" maxlength="255" onblur="this.value=cleanstring(this.value)" spellcheck="true" onfocus="checkHedDate()" /></p>
				<p>Url: <input type="text" id="trump_main2_url" name="trump_main2_url" size="50" onblur="this.value=fixURL(this.value)" onfocus="checkHedDate()" /></p>
				<p>Image: <input type="text" id="trump_main2_img" name="trump_main2_img" size="50" onblur="this.value=fixURL(this.value)" /></p>
				<p class="dek_sect">Dek:</p>
				<textarea rows="15" cols="45" id="trump_main2_dek" name="trump_main2_dek" onfocus="checkHedDate()"></textarea>
			</div>
			</fieldset>
			
			<fieldset>
			<legend><input type="text" class="section_titles" id="wors_title" name="wors_title" value="What Others are Saying" onfocus="checkHedDate()" /></legend>
			<div class="sections">
				<p>Headline 1:</p>
				<textarea id="wors1_dek" name="wors1_dek" rows="15" cols="45" onfocus="checkHedDate()"></textarea>
			</div>
			<div class="sections">
				<p>Headline 2:</p>
				<textarea id="wors2_dek" name="wors2_dek" rows="15" cols="45" onfocus="checkHedDate()"></textarea>
			</div>
			<div class="sections">
				<p>Headline 3:</p>
				<textarea id="wors3_dek" name="wors3_dek" rows="15" cols="45" onfocus="checkHedDate()"></textarea>
			</div>
			<div class="sections">
				<p>Headline 4:</p>
				<textarea id="wors4_dek" name="wors4_dek" rows="15" cols="45" onfocus="checkHedDate()"></textarea>
			</div>
			</fieldset>
		</div>
	</div>
</div>
TRUMP;

return $trumpocracy;
}

function getArchives($type, $date) {
  switch($type) {
    case "econundrum":
      break;
    case "dcdecoder":
      break;
    case "drumbeat":
      break;
    case "wiretap":
    	break;
  }
}

?>