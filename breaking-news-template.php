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

//date portion
$temp_date = strtotime($headlines_date);
$get_date = date("F j, Y", $temp_date);

//lead in section
$breaking_lead_in = "";
$br_ld_url = "<a href=\"$breaking_lead_url\" style=\"color:#ff6940;\">";
$breaking_lead_in = $br_ld_url . $breaking_lead_hed . "</a>";

//main text section
$main_text_sec = "";
$main_text_p = "<p style=\"margin:0 2px 10px 2px; font-family:Verdana, Arial, Helvetica, sans-serif;\">";
$main_text_a = "<a style=\"color:#ff6940;\" ";
$main_text = str_replace("<p>", $main_text_p, $main_text);
$main_text = str_replace("<a", $main_text_a, $main_text);
$main_text_sec = $main_text;

$breaking_news = <<<BREAKINGNEWS
<table align="center" cellspacing="5" style="max-width: 640px;" width="640">
	<tbody>
		<tr>
			<td><a href="http://www.motherjones.com"><img alt="Mother Jones" src="http://ei.motherjones.com/images/ads/2016/06/mojo_logo_cca.jpg" width="640" border="0" /></a></td>
		</tr>
		<tr>
			<td style="margin:0 2px 10px 2px; font-family:Verdana, Arial, Helvetica, sans-serif;" valign="top">
			<h3><strong>News Alert: $breaking_lead_in</strong></h3>
			</td>
		</tr>
		<tr>
			<td valign="bottom">
        $main_text_sec
			</td>
		</tr>
	</tbody>
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
  	subject_line = '$subject_line'
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