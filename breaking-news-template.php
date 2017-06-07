<?php
$allowed_html = "<a><br><b><i><em><strong><span><ol><ul><li><blockquote><sup><sub><img><table><td><tr><p>";

if(isset($_REQUEST['breaking']) && $_REQUEST['breaking'] != "") {
	$breaking_lead_hed = trim($_REQUEST['breaking']);
}
else {
	$breaking_lead_hed = "";
}

if(isset($_REQUEST['breaking_url']) && $_REQUEST['breaking_url'] != "") {
	$breaking_lead_url = trim($_REQUEST['breaking_url']);
}
else {
	$breaking_lead_url = "";
}

if(isset($_REQUEST['main_text']) && $_REQUEST['main_text'] != "") {
	$main_text = trim($_REQUEST['main_text']);
}
else {
	$main_text = "";
}

if(isset($_REQUEST['lift_note']) && $_REQUEST['lift_note'] != "") {
	$lift_note = trim($_REQUEST['lift_note']);
}
else {
	$lift_note = "";
}

//date portion
$temp_date = strtotime($headlines_date);
$get_date = date("F j, Y", $temp_date);

//lead in section
$breaking_lead_in = "";
$br_ld_url = "<a href=\"$breaking_lead_url\" style=\"text-decoration:none;color:#000;\"><strong>";
$breaking_lead_in = "<h3 style=\"$hed_styles_brn\">" . $br_ld_url . $breaking_lead_hed. "</strong></a></h3>";

//main text section
$main_text_sec = "";
$main_text_p = "<p class=\"main_dek\" style=\"margin:0 2px 10px 2px; font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:18px;color:#767676;\">";
$main_text_a = "<a style=\"color:#ff6900;text-decoration:none;\" ";
$main_text = str_replace("<p>", $main_text_p, $main_text);
$main_text = str_replace("<a", $main_text_a, $main_text);
//read more
$read_more = "<p style=\"margin:0 2px 10px 2px; font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:18px;\"><a href=\"$breaking_lead_url\" style=\"color: #ff6900;\">Read More</a></p>";

$main_text_sec = $main_text . $read_more;

$breaking_news = <<<BREAKINGNEWS
<div>
<style>
	@media screen and (max-device-width: 480px) {
		#main_content .main_dek {font-size: 28px;
			line-height: 32px;
		#main_content .mobile_text_brn {font-size: 42px;
			line-height: 48px;
		}
	}
</style>
</div>
<table id="main_content" align="center" cellpadding="10" cellspacing="0" style="width:620px;max-width: 620px;" width="620">
	<tr>
		<td align="center" valign="top">
			<a href="http://www.motherjones.com"><img alt="Mother Jones" src="http://assets.motherjones.com/newsletters/images/breaking-news-header-201704.jpg" width="600" border="0" style="width:600px;max-width:600px;margin: 0 0 10px 0;" /></a>
		</td>
	</tr>
	<tr>
		<td valign="bottom" align="center">
			<table align="center" cellpadding="5" cellspacing="0" style="width:540px;max-width:540px;" width="540">
				<tr>
					<td valign="top">
						<p style="$section_title_bn"><strong>BREAKING NEWS</strong></p>
						$breaking_lead_in
						$main_text_sec
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td valign="bottom">
			<hr style="$separator_border_br" />
		</td>
	</tr>
	<tr>
		<td align="center" valign="bottom">
			<table align="center" cellpadding="5" cellpadding="0" style="width:540px;max-width:540px;" width="540">
				<tr>
					<td valign="top">
						<p style="$section_title_bn"><strong>MORE NEWS</strong></p>
						$more_sec
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td valign="bottom">
			<hr style="$separator_border_br" />
		</td>
	</tr>
	<tr>
		<td align="center" style="margin: 30px 10px;" valign="bottom">
			<span style="$ad_style">&#8212;Advertisement&#8212;</span>
			$billboard_ad
		</td>
	</tr>
	<tr>
		<td valign="bottom">
			<hr style="$separator_border_br" />
		</td>
	</tr>
	<tr>
		<td valign="top">
			$global_footer
		</td>
	</tr>
</table>
BREAKINGNEWS;

print $breaking_news;

//db section
$db_connect = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbdb) or die("Can't connect to database");

$breaking_lead_hed = strip_tags(addslashes($breaking_lead_hed), $allowed_html);
$breaking_lead_url = addslashes($breaking_lead_url);
$main_text = strip_tags(addslashes($main_text), $allowed_html);

$check_existing = "SELECT id, hed_date FROM breaking_news WHERE hed_date='$headlines_date'";
$existing_qry = mysqli_query($db_connect, $check_existing) or die("Can't run query now");
if(mysqli_num_rows($existing_qry) > 0) {
	$exists = true;
}
else {
	$exists = false;
}

if($exists) {
	$run_qry = "UPDATE breaking_news
	SET hed_date = '$headlines_date',
	breaking = '$breaking_lead_hed',
	breaking_url = '$breaking_lead_url',
	main_text = '$main_text',
	subject_line = '$subject_line',
	WHERE hed_date='$headlines_date'";
}
else {
	$run_qry = "INSERT INTO breaking_news(hed_date,subject_line, breaking, breaking_url, main_text)
	VALUES('$headlines_date',
	'$subject_line',
	'$breaking_lead_hed',
	'$breaking_lead_url',
	'$main_text')";
}
//flush query and close db connections
mysqli_query($db_connect, $run_qry) or die("Query did not run correctly". mysqli_error($db_connect));
mysqli_close($db_connect);
/* end db section */
?>