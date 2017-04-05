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

if(isset($_REQUEST['bn_item1']) && $_REQUEST['bn_item1'] != "") {
	$bn_item1 = trim($_REQUEST['bn_item1']);
}
else {
	$bn_item1 = "";
}

if(isset($_REQUEST['bn_item1_url']) && $_REQUEST['bn_item1_url'] != "") {
	$bn_item1_url = trim($_REQUEST['bn_item1_url']);
}
else {
	$bn_item1_url = "";
}

if(isset($_REQUEST['bn_item2']) && $_REQUEST['bn_item2'] != "") {
	$bn_item2 = trim($_REQUEST['bn_item2']);
}
else {
	$bn_item2 = "";
}

if(isset($_REQUEST['bn_item2_url']) && $_REQUEST['bn_item2_url'] != "") {
	$bn_item2_url = trim($_REQUEST['bn_item2_url']);
}
else {
	$bn_item2_url = "";
}

if(isset($_REQUEST['bn_item3']) && $_REQUEST['bn_item3'] != "") {
	$bn_item3 = trim($_REQUEST['bn_item3']);
}
else {
	$bn_item3 = "";
}

if(isset($_REQUEST['bn_item3_url']) && $_REQUEST['bn_item3_url'] != "") {
	$bn_item3_url = trim($_REQUEST['bn_item3_url']);
}
else {
	$bn_item3_url = "";
}

if(isset($_REQUEST['bn_item4']) && $_REQUEST['bn_item4'] != "") {
	$bn_item4 = trim($_REQUEST['bn_item4']);
}
else {
	$bn_item4 = "";
}

if(isset($_REQUEST['bn_item4_url']) && $_REQUEST['bn_item4_url'] != "") {
	$bn_item4_url = trim($_REQUEST['bn_item4_url']);
}
else {
	$bn_item4_url = "";
}


if(isset($_REQUEST['bn_item5']) && $_REQUEST['bn_item5'] != "") {
	$bn_item5 = trim($_REQUEST['bn_item5']);
}
else {
	$bn_item5 = "";
}

if(isset($_REQUEST['bn_item5_url']) && $_REQUEST['bn_item5_url'] != "") {
	$bn_item5_url = trim($_REQUEST['bn_item5_url']);
}
else {
	$bn_item5_url = "";
}


//date portion
$temp_date = strtotime($headlines_date);
$get_date = date("F j, Y", $temp_date);

//lead in section
$breaking_lead_in = "";
$br_ld_url = "<a href=\"$breaking_lead_url\" style=\"color:#000;text-decoration:none;\"><strong>";
$breaking_lead_in = $br_ld_url . $breaking_lead_hed. "</strong></a>";

//main text section
$main_text_sec = "";
$main_text_p = "<p style=\"margin:0 2px 10px 2px; font-family:Verdana, Arial, Helvetica, sans-serif;\">";
$main_text_a = "<a style=\"color:#ff6940;\" ";
$main_text = str_replace("<p>", $main_text_p, $main_text);
$main_text = str_replace("<a", $main_text_a, $main_text);
$main_text_sec = $main_text;

//More section
$more_sec = "";

if($bn_item1 !== "" || $bn_item1 !== null) {
	if($bn_item1_url !== "" || $bn_item1_url !== null) {
		$br_i1_url = "<a href=\"$bn_item1_url\" style=\"text-decoration:none;color: #000;\">";
		$more_sec .= $main_text_p . $br_i1_url . $bn_item1 . "</a></p>";
	}
	else {
		$more_sec .= $main_text_p . $bn_item1 . "</p>";
	}
}

if($bn_item2!== "" || $bn_item2!== null) {
	if($bn_item2_url !== "" || $bn_item2_url !== null) {
		$br_i2_url = "<a href=\"$bn_item2_url\" style=\"text-decoration:none;color: #000;\">";
		$more_sec .= $main_text_p . $br_i2_url . $bn_item2. "</a></p>";
	}
	else {
		$more_sec .= $main_text_p . $bn_item2 . "</p>";
	}
}

if($bn_item3!== "" || $bn_item3 !== null) {
	if($bn_item3_url !== "" || $bn_item3_url !== null) {
		$br_i3_url = "<a href=\"$bn_item3_url\" style=\"text-decoration:none;color: #000;\">";
		$more_sec .= $main_text_p . $br_i3_url . $bn_item3 . "</a></p>";
	}
	else {
		$more_sec .= $main_text_p . $bn_item3. "</p>";
	}
}

if($bn_item4 !== "" || $bn_item4 !== null) {
	if($bn_item4_url !== "" || $bn_item4_url !== null) {
		$br_i4_url = "<a href=\"$bn_item4_url\" style=\"text-decoration:none;color: #000;\">";
		$more_sec .= $main_text_p . $br_i4_url . $bn_item4 . "</a></p>";
	}
	else {
		$more_sec .= $main_text_p . $bn_item4 . "</p>";
	}
}

if($bn_item5 !== "" || $bn_item5 !== null) {
	if($bn_item5_url !== "" || $bn_item5_url !== null) {
		$br_i5_url = "<a href=\"$bn_item5_url\" style=\"text-decoration:none;color: #000;\">";
		$more_sec .= $main_text_p . $br_i5_url . $bn_item5 . "</a></p>";
	}
	else {
		$more_sec .= $main_text_p . $bn_item5 . "</p>";
	}
}

$breaking_news = <<<BREAKINGNEWS
<table align="center" cellspacing="5" style="max-width: 640px;" width="640">
	<tbody>
		<tr>
			<td><a href="http://www.motherjones.com"><img alt="Mother Jones" src="http://ei.motherjones.com/images/ads/2016/06/mojo_logo_cca.jpg" width="640" border="0" /></a></td>
		</tr>
		<tr>
			<td style="margin:0 2px 10px 2px; font-family:Verdana, Arial, Helvetica, sans-serif;" valign="top">
				<h2 style="color: #FF6900;"><strong>NEWS ALERT</strong></h2>
			</td>
		</tr>
		<tr>
			<td style="margin:0 2px 10px 2px; font-family:Verdana, Arial, Helvetica, sans-serif;" valign="top">
				<h2 style="margin-top:0;padding-top:0;">$breaking_lead_in</h2>
				$main_text_sec
			</td>
		</tr>
		<tr>
			<td valign="bottom">
				<h2 style="color: #FF6900;"><strong>MORE</strong></h2>
				$more_sec
			</td>
		</tr>
		<tr>
			<td>
				$global_footer
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
$bn_item1 = strip_tags(addslashes($bn_item1), $allowed_html);
$bn_item1_url = addslashes($bn_item1_url);
$bn_item2 = strip_tags(addslashes($bn_item2), $allowed_html);
$bn_item2_url = addslashes($bn_item2_url);
$bn_item3 = strip_tags(addslashes($bn_item3), $allowed_html);
$bn_item3_url = addslashes($bn_item3_url);
$bn_item4 = strip_tags(addslashes($bn_item4), $allowed_html);
$bn_item4_url = addslashes($bn_item4_url);
$bn_item5 = strip_tags(addslashes($bn_item5), $allowed_html);
$bn_item5_url = addslashes($bn_item5_url);

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
  	bn_item1 = '$bn_item1',
  	bn_item1_url = '$bn_item1_url',
  	bn_item2 = '$bn_item2',
  	bn_item2_url = '$bn_item2_url',
  	bn_item3 = '$bn_item3',
  	bn_item3_url = '$bn_item3_url',
  	bn_item4 = '$bn_item4',
  	bn_item4_url = '$bn_item4_url',
  	bn_item5 = '$bn_item5',
  	bn_item5_url = '$bn_item5_url'
  	WHERE hed_date='$headlines_date'";
}
else {
$run_qry = "INSERT INTO breaking_news(hed_date,subject_line, breaking, breaking_url, main_text, bn_item1, bn_item1_url, bn_item2, bn_item2_url, bn_item3, bn_item3_url, bn_item4, bn_item4_url, bn_item5, bn_item5_url)
VALUES('$headlines_date',
	'$subject_line',
	'$breaking_lead_hed',
	'$breaking_lead_url',
	'$main_text',
	'$bn_item1',
	'$bn_item1_url',
	'$bn_item2',
	'$bn_item2_url',
	'$bn_item3',
	'$bn_item3_url',
	'$bn_item4',
	'$bn_item4_url',
	'$bn_item5',
	'$bn_item5_url')";
}
//flush query and close db connections
mysqli_query($db_connect, $run_qry) or die("Query did not run correctly". mysqli_error($db_connect));
mysqli_close($db_connect);
/* end db section */
?>