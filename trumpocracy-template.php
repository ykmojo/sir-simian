<?php
/* Trumpocracy template */
/* sections variables */
$allowed_html = "<a><br><b><i><em><strong><span><ol><ul><li><blockquote><sup><sub><img><table><td><tr><p>";

if(isset($_REQUEST['trump_main_hed']) && $_REQUEST['trump_main_hed'] != "") {
	$trump_main_hed= trim($_REQUEST['trump_main_hed']);
}
else {
	$trump_main_hed = "";
}

if(isset($_REQUEST['trum_main_url']) && $_REQUEST['trum_main_url'] != "") {
	$trum_main_url = trim($_REQUEST['trum_main_url']);
}
else {
	$trum_main_url = "";
}

if(isset($_REQUEST['trum_main_dek']) && $_REQUEST['trum_main_dek'] != "") {
	$trum_main_dek = trim($_REQUEST['trum_main_dek']);
}
else {
	$trum_main_dek = "";
}

if(isset($_REQUEST['trump_main_img']) && $_REQUEST['trump_main_img'] != "") {
	$trump_main_img = trim($_REQUEST['trump_main_img']);
}
else {
	$trump_main_img = "";
}

if(isset($_REQUEST["trump_main_source"]) && $_REQUEST["trump_main_source"] != "") {
	$trump_main_source = trim($_REQUEST["trump_main_source"]);
}
else {
	$trump_main_source = "";
}

if(isset($_REQUEST["trump_main_ital"]) && $_REQUEST["trump_main_ital"] !== "") {
	$trump_main_ital = ($_REQUEST["trump_main_ital"]);
}
else {
	$trump_main_ital = "";
}

if(isset($_REQUEST['trump_main2_hed']) && $_REQUEST['trump_main2_hed'] != "") {
	$trump_main2_hed = strip_tags(trim($_REQUEST['trump_main2_hed']),$allowed_html);
}
else {
	$trump_main2_hed = "";
}

if(isset($_REQUEST['trump_main2_url']) && $_REQUEST['trump_main2_url'] != "") {
	$trump_main2_url = strip_tags(trim($_REQUEST['trump_main2_url']),$allowed_html);
}
else {
	$trump_main2_url = "";
}

if(isset($_REQUEST['trump_main2_img']) && $_REQUEST['trump_main2_img'] != "") {
	$trump_main2_img = trim($_REQUEST['trump_main2_img']);
}
else {
	$trump_main2_img = "";
}

if(isset($_REQUEST['trump_main2_dek']) && $_REQUEST['trump_main2_dek'] != "") {
	$trump_main2_dek = trim($_REQUEST['trump_main2_dek']);
}
else {
	$trump_main2_dek = "";
}

if(isset($_REQUEST["trump_main2_source"]) && $_REQUEST["trump_main2_source"] != "") {
	$trump_main2_source = trim($_REQUEST["trump_main2_source"]);
}
else {
	$trump_main2_source = "";
}

if(isset($_REQUEST["trump_main2_ital"]) && $_REQUEST["trump_main2_ital"] != "") {
	$trump_main2_ital = trim($_REQUEST["trump_main2_ital"]);
}
else {
	$trump_main2_ital = "";
}

if(isset($_REQUEST['topnews_title']) && $_REQUEST['topnews_title'] != "") {
	$topnews_title = trim($_REQUEST['topnews_title']);
}
else {
	$topnews_title = "TOP NEWS";
}

if(isset($_REQUEST['topnews1_dek']) && $_REQUEST['topnews1_dek'] != "") {
	$topnews1_dek = trim($_REQUEST['topnews1_dek']);
}
else {
	$topnews1_dek = "";
}

if(isset($_REQUEST["topnews1_source"]) && $_REQUEST["topnews1_source"] != "") {
	$topnews1_source = trim($_REQUEST["topnews1_source"]);
}
else {
	$topnews1_source = "";
}

if(isset($_REQUEST["topnews1_ital"]) && $_REQUEST["topnews1_ital"] != "") {
	$topnews1_ital = trim($_REQUEST["topnews1_ital"]);
}
else {
	$topnews1_ital = "";
}

if(isset($_REQUEST["topnews1_url"]) && $_REQUEST["topnews1_url"] != "") {
	$topnews1_url = trim($_REQUEST["topnews1_url"]);
}
else {
	$topnews1_url = "";
}

if(isset($_REQUEST['topnews2_dek']) && $_REQUEST['topnews2_dek'] != "") {
	$topnews2_dek = trim($_REQUEST['topnews2_dek']);
}
else {
	$topnews2_dek = "One Great Tidbit";
}

if(isset($_REQUEST["topnews2_source"]) && $_REQUEST["topnews2_source"] != "") {
	$topnews2_source = trim($_REQUEST["topnews2_source"]);
}
else {
	$topnews2_source = "";
}

if(isset($_REQUEST["topnews2_ital"]) && $_REQUEST["topnews2_ital"] != "") {
	$topnews2_ital = trim($_REQUEST["topnews2_ital"]);
}
else {
	$topnews2_ital = "";
}

if(isset($_REQUEST["topnews2_url"]) && $_REQUEST["topnews2_url"] != "") {
	$topnews2_url = trim($_REQUEST["topnews2_url"]);
}
else {
	$topnews2_url = "";
}

if(isset($_REQUEST['topnews3_dek']) && $_REQUEST['topnews3_dek'] != "") {
	$topnews3_dek = trim($_REQUEST['topnews3_dek']);
}
else {
	$topnews3_dek = "";
}

if(isset($_REQUEST["topnews3_source"]) && $_REQUEST["topnews3_source"] != "") {
	$topnews3_source = trim($_REQUEST["topnews3_source"]);
}
else {
	$topnews3_source = "";
}

if(isset($_REQUEST["topnews3_ital"]) && $_REQUEST["topnews3_ital"] != "") {
	$topnews3_ital = trim($_REQUEST["topnews3_ital"]);
}
else {
	$topnews3_ital = "";
}

if(isset($_REQUEST["topnews3_url"]) && $_REQUEST["topnews3_url"] != "") {
	$topnews3_url = trim($_REQUEST["topnews3_url"]);
}
else {
	$topnews3_url = "";
}

if(isset($_REQUEST['topnews4_dek']) && $_REQUEST['topnews4_dek'] != "") {
	$topnews4_dek = trim($_REQUEST['topnews4_dek']);
}
else {
	$topnews4_dek = "";
}

if(isset($_REQUEST["topnews4_source"]) && $_REQUEST["topnews4_source"] != "") {
	$topnews4_source = trim($_REQUEST["topnews4_source"]);
}
else {
	$topnews4_source = "";
}

if(isset($_REQUEST["topnews4_ital"]) && $_REQUEST["topnews4_ital"] != "") {
	$topnews4_ital = trim($_REQUEST["topnews4_ital"]);
}
else {
	$topnews4_ital = "";
}

if(isset($_REQUEST["topnews4_url"]) && $_REQUEST["topnews4_url"] != "") {
	$topnews4_url = trim($_REQUEST["topnews4_url"]);
}
else {
	$topnews4_url = "";
}

if(isset($_REQUEST['topnews5_dek']) && $_REQUEST['topnews5_dek'] != "") {
	$topnews5_dek = trim($_REQUEST['topnews5_dek']);
}
else {
	$topnews5_dek = "";
}

if(isset($_REQUEST["topnews5_source"]) && $_REQUEST["topnews5_source"] != "") {
	$topnews5_source = trim($_REQUEST["topnews5_source"]);
}
else {
	$topnews5_source = "";
}

if(isset($_REQUEST["topnews5_ital"]) && $_REQUEST["topnews5_ital"] != "") {
	$topnews5_ital = trim($_REQUEST["topnews5_ital"]);
}
else {
	$topnews5_ital = "";
}

if(isset($_REQUEST["topnews5_url"]) && $_REQUEST["topnews5_url"] != "") {
	$topnews5_url = trim($_REQUEST["topnews5_url"]);
}
else {
	$topnews5_url = "";
}

if(isset($_REQUEST['wors_title']) && $_REQUEST['wors_title'] != "") {
	$wors_title = trim($_REQUEST['wors_title']);
}
else {
	$wors_title = "WHAT OTHERS ARE SAYING";
}

if(isset($_REQUEST['wors1_dek']) && $_REQUEST['wors1_dek'] != "") {
	$wors1_dek = trim($_REQUEST['wors1_dek']);
}
else {
	$wors1_dek = "";
}

if(isset($_REQUEST["wors1_source"]) && $_REQUEST["wors1_source"] != "") {
	$wors1_source = trim($_REQUEST["wors1_source"]);
}
else {
	$wors1_source = "";
}

if(isset($_REQUEST["wors1_ital"]) && $_REQUEST["wors1_ital"] != "") {
	$wors1_ital = trim($_REQUEST["wors1_ital"]);
}
else {
	$wors1_ital = "";
}

if(isset($_REQUEST["wors1_url"]) && $_REQUEST["wors1_url"] != "") {
	$wors1_url = trim($_REQUEST["wors1_url"]);
}
else {
	$wors1_url = "";
}

if(isset($_REQUEST['wors2_dek']) && $_REQUEST['wors2_dek'] != "") {
	$wors2_dek = trim($_REQUEST['wors2_dek']);
}
else {
	$wors2_dek = "";
}

if(isset($_REQUEST["wors2_source"]) && $_REQUEST["wors2_source"] != "") {
	$wors2_source = trim($_REQUEST["wors2_source"]);
}
else {
	$wors2_source = "";
}

if(isset($_REQUEST["wors2_ital"]) && $_REQUEST["wors2_ital"] != "") {
	$wors2_ital = trim($_REQUEST["wors2_ital"]);
}
else {
	$wors2_ital = "";
}

if(isset($_REQUEST["wors2_url"]) && $_REQUEST["wors2_url"] != "") {
	$wors2_url = trim($_REQUEST["wors2_url"]);
}
else {
	$wors2_url = "";
}

if(isset($_REQUEST['wors3_dek']) && $_REQUEST['wors3_dek'] != "") {
	$wors3_dek = trim($_REQUEST['wors3_dek']);
}
else {
	$wors3_dek = "";
}

if(isset($_REQUEST["wors3_source"]) && $_REQUEST["wors3_source"] != "") {
	$wors3_source = trim($_REQUEST["wors3_source"]);
}
else {
	$wors3_source = "";
}

if(isset($_REQUEST["wors3_ital"]) && $_REQUEST["wors3_ital"] != "") {
	$wors3_ital = trim($_REQUEST["wors3_ital"]);
}
else {
	$wors3_ital = "";
}

if(isset($_REQUEST["wors3_url"]) && $_REQUEST["wors3_url"] != "") {
	$wors3_url = trim($_REQUEST["wors3_url"]);
}
else {
	$wors3_url = "";
}

if(isset($_REQUEST['wors4_dek']) && $_REQUEST['wors4_dek'] != "") {
	$wors4_dek = trim($_REQUEST['wors4_dek']);
}
else {
	$wors4_dek = "";
}

if(isset($_REQUEST["wors4_source"]) && $_REQUEST["wors4_source"] != "") {
	$wors4_source = trim($_REQUEST["wors4_source"]);
}
else {
	$wors4_source = "";
}

if(isset($_REQUEST["wors4_ital"]) && $_REQUEST["wors4_ital"] != "") {
	$wors4_ital = trim($_REQUEST["wors4_ital"]);
}
else {
	$wors4_ital = "";
}

if(isset($_REQUEST["wors4_url"]) && $_REQUEST["wors4_url"] != "") {
	$wors4_url = trim($_REQUEST["wors4_url"]);
}
else {
	$wors4_url = "";
}

//Trumpocracy template section
//date formatting
$temp_date = strtotime($headlines_date);
$get_date = date("F j, Y", $temp_date);

//Main article section
$main_section = "";
$url_style = "<a style=\"color: #ff6900;\"";

if($trum_main_url !== "" || $trum_main_url !== null) {
	$main_hed = "<h3 style=\"Margin-bottom: 10px;font-weight: bold; color: #000;font-family:Georgia, serif;font-size: 33px; line-height: 38px;\"><a href=\"$trum_main_url\" style=\"text-decoration: none;color: #000;\">$trump_main_hed</a></h3>";
	$trump_main_source_format = "<a href=\"$trum_main_url\" style=\"color:#ff6900;\">$trump_main_source</a>";
}
else {
	$main_hed = "<h3 style=\"Margin-bottom: 10px;font-weight: bold; color: #000;font-family:Georgia, serif;font-size: 33px; line-height: 38px;\">$trump_main_hed</h3>";
	$trump_main_source_format = $trump_main_source;
}

if($trump_main_img !== "" || $trump_main_img !== null) {
	$main_img_sec = "<tr>\n\t<td align=\"center\" style=\"line-height:0;\">\n\t<img src=\"http://assets.motherjones.com/newsletters/newsletter_test/trump-main-test.jpg\" style=\"Margin: 0 auto;width:100%;max-width: 100%; height: auto;\" width=\"540\" alt=\"Trumpocracy\" />\n\t</td>\n\t</tr>\n";
}
else {
	$main_img_sec = "";
}

$main_dek_p = "<p style=\"color: #767676;font-family:Georgia, serif;font-size: 16px; line-height: 21px;\">";
$trum_main_dek = str_replace("<p>", $main_dek_p, $trum_main_dek);
$trum_main_dek = str_replace("<a", $url_style, $trum_main_dek);
//add source name & url
$get_last_p = strripos($trum_main_dek, "</p>");
$get_substr = substr($trum_main_dek, 0, $get_last_p);

if($trump_main_source !== "" || $trump_main_source !== null) {
	if($trump_main_ital) {
		$trum_main_dek_cat = $get_substr . " (<em>$trump_main_source_format</em>)</p>\n";
	}
	else {
		$trum_main_dek_cat = $get_substr . " ($trump_main_source_format)</p>\n";
	}
}

$main_section = $main_img_sec . "<tr>\n\t<td style=\"border-bottom: 1px solid #767676;\">\n\t" . $main_hed . "\n\t" . $trum_main_dek_cat . "\n\t</td>\n\t</tr>\n";
//end main article section

//Secondary main article section
$main2_section = "";
$main2_opener = "<tr>\n\t<td style=\"display:inline-block;border-bottom: 1px solid #767676;\">\n\t<!--[if (gte mso 9)|(IE)]>\n\t<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\">\n\t<tr>\n\t<td width=\"200\">\n\t<![endif]-->\n";
$main2_closer = "<!--[if (gte mso 9)|(IE)]>\n\t</td>\n\t</tr>\n\t</table>\n\t<![endif]-->\n\t</td>\n\t</tr>";

$main2_img_sec = "";

if($trump_main2_img !== "" || $trump_main2_img!== null) {
	$main2_img_sec = "<table class=\"narrow\" align=\"left\" style=\"width:33%;max-width:100%;margin-bottom: 20px;margin-top:10px;vertical-align:top;\">\n\t<tr><td valign=\"top\">\n\t<img src=\"$trump_main2_img\" width=\"270\" style=\"max-width:100%;width:100%;\" />\n\t</td>\n\t</tr>\n\t</table>";
}
else {
	$main2_img_sec = "";
}

$main2_text_sec = "";
$main2_hed = "";

if($trump_main2_url !== "" || $trump_main2_url !== null) {
	$main2_hed = "<p style=\"text-align:left;Margin: 0 0 10px 0; padding: 0; color: #000;font-family:Georgia, serif;font-size: 16px; line-height: 21px; font-weight:bold;\"><a href=\"$trump_main2_url\" style=\"color:#000;text-decoration:none;\">" . $trump_main2_hed . "</a></p>";
}
else {
	$main2_hed = "<p style=\"text-align:left;Margin: 0 0 10px 0; padding: 0; color: #000;font-family:Georgia, serif;font-size: 16px; line-height: 21px; font-weight:bold;\">" . $trump_main2_hed . "</p>";
}

$main2_p = "<p style=\"text-align:left;Margin: 0 0 10px 0; padding: 0; color: #000;font-family:Georgia, serif;font-size: 16px; line-height: 21px; font-weight:bold;\">";
$trump_main2_dek = str_replace("<p>", $main2_p, $trump_main2_dek);
$trump_main2_dek = str_replace("<a", $url_style, $trump_main2_dek);
//add source name & url
$get_last_p = strripos($trump_main2_dek, "</p>");
$get_substr = substr($trump_main2_dek, 0, $get_last_p);

if($trump_main2_source !== "" || $trump_main2_source !== null) {
	if($trump_main2_ital) {
		$trump_main2_dek_cat = $get_substr . " (<em>$trump_main2_source</em>)</p>\n";
	}
	else {
		$trump_main2_dek_cat = $get_substr . " ($trump_main2_source)</p>\n";
	}
}

$main2_text_sec = "<!--[if (gte mso 9)|(IE)]>\n\t</td>\n\t<td>\n\t<![endif]-->\n\t<table class=\"wide\" align=\"left\" style=\"max-width:65%;margin-bottom: 20px;margin-top: 10px;vertical-align:top;\">\n\t<tr>\n\t<td valign=\"top\">" . $main2_hed . $trump_main2_dek_cat . "</td>\n\t</tr>\n\t</table>\n\t<!--[if (gte mso 9)|(IE)]>\n\t</td>\n\t</tr>\n\t</table>";

$main2_section = $main2_opener . $main2_img_sec . $main2_text_sec . $main2_closer;
//end secondary main article section


?>