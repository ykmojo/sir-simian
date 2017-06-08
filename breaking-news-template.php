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

//saferbt
$saferbt = <<<SAFERBT
<table cellpadding="0" cellspacing="0" border="0" width="40" height="6"><tbody><tr><td><img src="http://li.motherjones.com/imp?s=124877300&sz=2x1&li=breaking-news&e={{contact.email}}&p={{campaign.id}}$timestamp" width="2" height="6" border="0" /></td><td><img src="http://li.motherjones.com/imp?s=124877301&sz=2x1&li=breaking-news&e={{contact.email}}&p={{campaign.id}}$timestamp" width="2" height="6" border="0" /></td><td><img src="http://li.motherjones.com/imp?s=124877302&sz=2x1&li=breaking-news&e={{contact.email}}&p={{campaign.id}}$timestamp" width="2" height="6" border="0" /></td><td><img src="http://li.motherjones.com/imp?s=124877303&sz=2x1&li=breaking-news&e={{contact.email}}&p={{campaign.id}}$timestamp" width="2" height="6" border="0" /></td><td><img src="http://li.motherjones.com/imp?s=124877304&sz=2x1&li=breaking-news&e={{contact.email}}&p={{campaign.id}}$timestamp" width="2" height="6" border="0" /></td><td><img src="http://li.motherjones.com/imp?s=124877305&sz=2x1&li=breaking-news&e={{contact.email}}&p={{campaign.id}}$timestamp" width="2" height="6" border="0" /></td><td><img src="http://li.motherjones.com/imp?s=124877306&sz=2x1&li=breaking-news&e={{contact.email}}&p={{campaign.id}}$timestamp" width="2" height="6" border="0" /></td><td><img src="http://li.motherjones.com/imp?s=124877307&sz=2x1&li=breaking-news&e={{contact.email}}&p={{campaign.id}}$timestamp" width="2" height="6" border="0" /></td><td><img src="http://li.motherjones.com/imp?s=124877308&sz=2x1&li=breaking-news&e={{contact.email}}&p={{campaign.id}}$timestamp" width="2" height="6" border="0" /></td><td><img src="http://li.motherjones.com/imp?s=124877309&sz=2x1&li=breaking-news&e={{contact.email}}&p={{campaign.id}}$timestamp" width="2" height="6" border="0" /></td><td><img src="http://li.motherjones.com/imp?s=124877310&sz=2x1&li=breaking-news&e={{contact.email}}&p={{campaign.id}}$timestamp" width="2" height="6" border="0" /></td><td><img src="http://li.motherjones.com/imp?s=124877311&sz=2x1&li=breaking-news&e={{contact.email}}&p={{campaign.id}}$timestamp" width="2" height="6" border="0" /></td><td><img src="http://li.motherjones.com/imp?s=124877312&sz=2x1&li=breaking-news&e={{contact.email}}&p={{campaign.id}}$timestamp" width="2" height="6" border="0" /></td><td><img src="http://li.motherjones.com/imp?s=124877313&sz=2x1&li=breaking-news&e={{contact.email}}&p={{campaign.id}}$timestamp" width="2" height="6" border="0" /></td><td><img src="http://li.motherjones.com/imp?s=124877314&sz=2x1&li=breaking-news&e={{contact.email}}&p={{campaign.id}}$timestamp" width="2" height="6" border="0" /></td><td><img src="http://li.motherjones.com/imp?s=124877315&sz=2x1&li=breaking-news&e={{contact.email}}&p={{campaign.id}}$timestamp" width="2" height="6" border="0" /></td><td><img src="http://li.motherjones.com/imp?s=124877316&sz=2x1&li=breaking-news&e={{contact.email}}&p={{campaign.id}}$timestamp" width="2" height="6" border="0" /></td><td><img src="http://li.motherjones.com/imp?s=124877317&sz=2x1&li=breaking-news&e={{contact.email}}&p={{campaign.id}}$timestamp" width="2" height="6" border="0" /></td><td><img src="http://li.motherjones.com/imp?s=124877318&sz=2x1&li=breaking-news&e={{contact.email}}&p={{campaign.id}}$timestamp" width="2" height="6" border="0" /></td><td><img src="http://li.motherjones.com/imp?s=124877319&sz=2x1&li=breaking-news&e={{contact.email}}&p={{campaign.id}}$timestamp" width="2" height="6" border="0" /></td></tr></tbody></table>
SAFERBT;

$breaking_news = <<<BREAKINGNEWS
<div>
	<style>
		@media screen and (max-width: 480px) {
			p {
			font-size: 22px !important;
			line-height: 26px !important;
			}
			.headers_text {
			font-size: 16px !important;
			line-height: 20px !important;
			}
			h3 {
				font-size: 36px !important;
				line-height: 40px !important;
			}
		}
	</style>
	
	<table align="center" width="100%" cellpadding="0" cellspacing="0" style="margin: 0;padding:0;background-color: #ccc;">
		<tr>
			<td>
				<table align="center" cellpadding="0" cellspacing="0" style="margin:0 auto;padding:0;max-width: 100%;background-color:#fff;border-collapse: collapse;" border="0" width="600">
					<tbody>
						<tr>
							<td><a href="http://www.motherjones.com"><img alt="Mother Jones" src="http://assets.motherjones.com/newsletters/images/breaking-news-header.png" width="600" border="0" style="max-width:600px;width:100%;" /></a></td>
						</tr>
						<tr>
							<td>
								<table align="center" cellpadding="15" cellspacing="0" style="margin:0 auto;max-width:100%;" width="540">
									<tr>
										<td style="margin:0 2px 10px 2px; font-family:Verdana, Arial, Helvetica, sans-serif;border-bottom: 1px solid #ccc;" valign="top">
											<p class="headers_text" style="margin-top: 0;font-family: Verdana, sans-serif; color: #ff6900;font-size: 12px; line-height: 16px;font-weight: bold;text-transform: uppercase;text-align:left;"><strong>BREAKING NEWS</strong></p>
											$breaking_lead_in
											$main_text_sec
										</td>
									</tr>
									<tr>
										<td align="center" style="border-bottom: 1px solid #ccc;">
											<span style="text-align: center;color: #767676;font-size: 12px;font-style:italic;">&#8212;Advertisement&#8212;</span>
											$billboard_ad
										</td>
									</tr>
									<tr>
										<td align="center">
											<!--[if (gte mso 9)|(IE)]><br /><![endif]-->
												<p class="ad_text" style="margin: 10px auto !important; font-family: Verdana, sans-serif; font-size: 14px; color: #000;">This news alert comes to you from <em>Mother Jones</em>, an award-winning, nonprofit investigative journalism organization.</p>
										</td>
									</tr>
									<tr>
										<td align="center">
											<table align="center" style="margin:0 auto;width:450px;max-width:450px;">
												<tr>
													<td style="padding: 0;text-align:center;" align="center">
														<a href="https://secure.motherjones.com/fnp/?action=SUBSCRIPTION&list_source=7GNWSF&extra_don=1&abver=A&a_first_name={{contact.first_name}}&a_last_name={{contact.last_name}}&a_address_1={{contact.street_1}}&a_city={{contact.city}}&a_state={{contact.state_province}}&a_zip={{contact.zip_code}}&a_email={{contact.email}}&account_no={{contact.icn_account_number}}&rel_rec_no={{contact.wk_sub_rel}}"><img class="news_donate" src="http://assets.motherjones.com/newsletters/images/donate_btn_orange_240.png" alt="Donate" style="width:150px;min-width:100px;"  width="150" hspace="15" vspace="0" /></a>
													</td>
													<td style="padding: 0;text-align:center;" align="center">
														<a href="http://store.motherjones.com/?utm_source=motherjones&utm_campaign=october_launch&utm_medium=newsletter&utm_content=footerbutton"><img class="news_donate" src="http://assets.motherjones.com/newsletters/images/mojo-store_btn_newsletter.png" alt="Mother Jones Store" style="width:150px;min-width:100px;margin-top: 10px;margin-bottom:10px;" width="150" hspace="15" vspace="0" /></a>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td align="center" style="margin: 0 auto;text-align:center;">
											<img src="http://assets.motherjones.com/newsletters/newsletter_test/mojo_logo_btm_bw.png" style="width:300px;max-width: 300px;margin: 10px auto;" width="300" />
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								$saferbt
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</table>
</div>
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