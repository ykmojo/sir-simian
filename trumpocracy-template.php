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

if(isset($_REQUEST['topnews2_dek']) && $_REQUEST['topnews2_dek'] != "") {
	$topnews2_dek = trim($_REQUEST['topnews2_dek']);
}
else {
	$topnews2_dek = "One Great Tidbit";
}

if(isset($_REQUEST['topnews3_dek']) && $_REQUEST['topnews3_dek'] != "") {
	$topnews3_dek = trim($_REQUEST['topnews3_dek']);
}
else {
	$topnews3_dek = "";
}

if(isset($_REQUEST['topnews4_dek']) && $_REQUEST['topnews4_dek'] != "") {
	$topnews4_dek = trim($_REQUEST['topnews4_dek']);
}
else {
	$topnews4_dek = "";
}

if(isset($_REQUEST['topnews5_dek']) && $_REQUEST['topnews5_dek'] != "") {
	$topnews5_dek = trim($_REQUEST['topnews5_dek']);
}
else {
	$topnews5_dek = "";
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

if(isset($_REQUEST['wors2_dek']) && $_REQUEST['wors2_dek'] != "") {
	$wors2_dek = trim($_REQUEST['wors2_dek']);
}
else {
	$wors2_dek = "";
}

if(isset($_REQUEST['wors3_dek']) && $_REQUEST['wors3_dek'] != "") {
	$wors3_dek = trim($_REQUEST['wors3_dek']);
}
else {
	$wors3_dek = "";
}

if(isset($_REQUEST['wors4_dek']) && $_REQUEST['wors4_dek'] != "") {
	$wors4_dek = trim($_REQUEST['wors4_dek']);
}
else {
	$wors4_dek = "";
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
}
else {
	$main_hed = "<h3 style=\"Margin-bottom: 10px;font-weight: bold; color: #000;font-family:Georgia, serif;font-size: 33px; line-height: 38px;\">$trump_main_hed</h3>";
}

$main_dek_p = "<p style=\"color: #767676;font-family:Georgia, serif;font-size: 16px; line-height: 21px;\">";
$trum_main_dek = str_replace("<p>", $main_dek_p, $trum_main_dek);
$trum_main_dek = str_replace("<a", $url_style, $trum_main_dek);

$main_section = $main_hed . "\n" . $trum_main_dek . "\n";
?>