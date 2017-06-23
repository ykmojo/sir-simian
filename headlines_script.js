/* scripts for the new headlines app
  --7/6/2009
  --1/7/2010: rewrite AJAX call to wait for fckeditor fields to load before trying to insert data into them.
  --2/29/2012: update for new newsletters
  --2/10/2016: added functions to clean dirty characters, update newsletter flight 
  --3/15/2017: added refresh data functionality by modifying the getArchive() function.
*/

//function to print out the section drop down select
function getTypeImg(type_img) {
  var theImg = "";                                            //var to hold image path for headlines type
  var img_holder = document.getElementById('type_img');       //gets the image tag
  var img_link = document.getElementById('section_image');
  var ad_section = document.getElementById('ad_section');
  var wysiwig = document.getElementById('wysiwig_msg');
  var section = "";
  var the_link = "";
  var day_int;
  var today_date = document.getElementById("hed_date");
  var complete_date;
  
  document.getElementById("subject_line").value = "";
  $("#wysiwig_msg").removeClass("loading_done");
  $("#wysiwig_msg").addClass("loading_warning");
  document.getElementById("archives").disabled = true;
  wysiwig.innerHTML = "Please wait until the WYSIWIG loads completely.  Thank you.";
  
  //switch statement to get appropriate image for headlines type
  switch(type_img) {
    case "econundrums_new":
      theImg = "images/econundrums_header_news_tool.png";
      section = "econundrums_new";
      the_link = "http://motherjones.com/authors/kiera-butler";
      day_int = 1;
      break;
    case "food_for_thought_new":
      theImg = "images/fft_header_old_news_tool.png";
      section = "food_for_thought_new";
      the_link = "http://motherjones.com/tom-philpott";
      day_int = 3;
      break;
    case "food_for_thought_redesign":
      theImg = "images/fft_header_new_news_tool_update.png";
      section = "food_for_thought_redesign";
      the_link = "http://motherjones.com/tom-philpott";
      day_int = 3;
      break;
    case "in_the_mix_new":
      theImg = "images/inthemix_header_news_tool.png";
      section = "in_the_mix_new";
      the_link = "http://motherjones.com/mixed-media"
      day_int = 6;
      break;
    case "political_mojo_new":
      theImg = "images/politicalmojo_header_news_tool.png";
      section = "political_mojo_new";
      the_link = "http://motherjones.com/mojo";
      day_int = 5;
      break;
    case "breaking_news":
      theImg = "images/breakingnews_header_news_tool.png";
      section = "breaking_news";
      the_link = "http://www.motherjones.com";
      day_int = 1;
      break;
    case "trumpocracy":
      theImg = "images/trumpocracy-updated-052317.png";
      section = "trumpocracy";
      the_link = "http://www.motherjones.com";
      day_int = 0;
      break;
    default:
      theImg = "false";
      break;
  }

  if(theImg !== "false") {  
	//if theImg string does not equal false
    //show all hidden sections
    img_holder.className = "block_show";
    ad_section.className = "block_show";
    $("#wysiwig_msg").removeClass("block_hide");
    $("#wysiwig_msg").addClass("block_show");
    
    //wysiwig.className = "block_show";
    img_holder.src = theImg;
    img_link.href = the_link;
    createDivs(section);
    restoreValues(section);
    complete_date = getNextSchedule(day_int);
    today_date.value = complete_date;
    
    CKEDITOR.on( 'instanceReady', function( evt ) {
    	$("#wysiwig_msg").removeClass("loading_warning");
    	$("#wysiwig_msg").addClass("loading_done");
  	    document.getElementById("wysiwig_msg").innerHTML = "WYSIWYG ready!";
  	    document.getElementById("archives").disabled = false;
  	} );
    $(".message_check").css("display", "block");
    return true;
  }
  else {      //else give an alert and return false to abort processing
    alert("Nothing to show");
    return false;
  }
}

//adjust date for newsletter flight date
function getNextSchedule(date_int) {
  var year, month, day;
  var temp_return;

  for(i = 0; i < 7; i++) {
    var temp_d = new Date();
    temp_d.setDate(temp_d.getDate() + i);
    var temp_d_int = temp_d.getDay();
    var real_month = temp_d.getMonth() + 1;

    if (temp_d_int === date_int) {
      year = temp_d.getFullYear();

      if (real_month < 10) {
        month = "0"+ (real_month);
      }
      else {
        month = real_month;
      }

      if (temp_d.getDate() < 10) {
        day = "0"+ temp_d.getDate();
      }
      else {
        day = temp_d.getDate();
      }

      temp_return = year + "-" + month + "-" + day;

      return temp_return;
    }
  }
}

//retrieve specific archive item
var data_text = "";

//get archives
function getArchive() {
  var httpxml = new getHTTP();
  var archive_type = document.getElementById('hed_type').value;
  var date_value = document.getElementById('archives').value;
  var date_field = document.getElementById('date_label');
  var rand_num = getRandom();

  httpxml.onreadystatechange = function() {
		if(httpxml.readyState == 4) {
			data_text = JSON.parse(httpxml.responseText);
			if(data_text == "" || data_text == null){
				document.getElementById("refresh_data").value = "No data to refresh";
			}
			else {
				delayedInsert(data_text);
				document.getElementById("refresh_data").value = "Refresh data";
			}
		}
  }

  httpxml.open("POST", "headlines_ajax_functions.php?arch_type=" + archive_type + "&date=" + date_value + "&r=" + rand_num, true);
  httpxml.send("null");
  
  if($("#archives").val() !== "none") {
	  $(".message_check").css("display", "none");
  }
  else {
	  $(".message_check").css("display", "block");
  }
}

function delayedInsert(json_obj) {
	var index_name;
	
	for(index_name in json_obj) {
		if(document.getElementById(index_name)) {
			if(index_name.search(/dek/i) != -1 || index_name.search(/lead/i) != -1 || index_name.search(/lift_note/i) != -1 || index_name.search(/article/i) != -1 || index_name.search(/ioe_item/i) != -1 || index_name.search(/bite_add/i) != -1 || index_name.search(/fft_hk_leadin/i) != -1 || index_name.search(/fft_hidden_kitchen/i) != -1 || index_name.search(/fft_snack_box/i) != -1 || index_name.search(/fft_sb_attr/i) != -1 || index_name.search(/membership_slot/i) != -1 || index_name.search(/main_text/i) != -1) {
				CKEDITOR.instances[index_name].setData(json_obj[index_name]);
			}
			else {
				if(index_name.search(/ital/i) != -1) {
					  if(json_obj[index_name] == 1) {
					    document.getElementById(index_name).checked = true;
					  }
					  else {
						document.getElementById(index_name).checked = false;
					  }
				}
				else {
					document.getElementById(index_name).value = json_obj[index_name];
				}
			}
		}
	}
}


function restoreValues(the_section) {
  var httpxml = new getHTTP();
  var drop_html = "";
  var the_div = document.getElementById('archives');
  var rand_num = getRandom();

  httpxml.onreadystatechange = function() {
    if(httpxml.readyState == 4) {
	  var response_text = httpxml.responseText;
	  var control = response_text.replace(/^\s\s*/, '').replace(/\s\s*$/, '');
      if(response_text !== "not" && response_text !== "" && response_text !== "none") {
        var date_array = new Array();
        date_array = response_text.split("?");

        for(i = 0; i < date_array.length; i++) {
          if(date_array[i] != "") {
            var each_date = new Array();
            var temp = "";
            temp = date_array[i];
            each_date = temp.split(":");
            drop_html += "<option id='" + each_date[0] + "' name='" + each_date[1] + "' value='" + each_date[1] + "'>" + each_date[1] + "</option>\n";
          }
        }
		drop_html = "<option value='none' selected>Choose from below</option>" + drop_html;
        the_div.innerHTML = drop_html;
      }
      else {
    	drop_html = "<option value='none' selected>No Archive</option>";
    	the_div.innerHTML = drop_html;
      }
    }
  }

  httpxml.open("POST", "headlines_ajax_functions.php?existing="+the_section + "&r=" + rand_num, true);
  httpxml.send("null");
}

//show/hide Bite section
function display_bite(show_status) {
  var the_item = document.getElementById("bite_section");
  switch(show_status) {
    case "1":
      the_item.style.display = "block";
      break;
    case "2":
      the_item.style.display = "none";
      break;
    default:
  }
}

//print out the add sections buttons
function getDropDowns() {
  var httpxml = new getHTTP();
  var httpxml2 = new getHTTP();
  var getDrop1 = document.getElementById('dropdowns1');
  var getDrop2 = document.getElementById('dropdowns2');

  //button on the left side
  httpxml.onreadystatechange = function() {
    if(httpxml.readyState == 4)
    {
      //getDrop1.innerHTML = httpxml.responseText;
    }
  }
  //button on the right side
  httpxml2.onreadystatechange = function() {
    if(httpxml2.readyState == 4)
    {
      //getDrop2.innerHTML = httpxml2.responseText;
    }
  }

  httpxml.open("POST", "headlines_ajax_functions.php?drops=yes&nums=1",true);
  httpxml2.open("POST", "headlines_ajax_functions.php?drops=yes&nums=2",true);
  httpxml.send("null");
  httpxml2.send("null");
}

//ajax call to dynamically create sections while not wiping out info in existing sections
function createDivs(section) {
  var xmlhttp = new getHTTP();  //create new AJAX object
  var get_divs = document.getElementById('main_container');
  var the_foot = document.getElementById('footer_row');
  var rand_num = getRandom();

  xmlhttp.onreadystatechange = function() {
    if(xmlhttp.readyState == 4) {
      //var inputs_array = getInputs();               //call to function to preserve data in existing sections
      get_divs.innerHTML = xmlhttp.responseText;
      //restoreInputs(inputs_array);                  //call to replace data to existing sections

      var textareas_array = document.getElementsByTagName('textarea');
      var count_text = textareas_array.length;

      for(i = 0; i < count_text; i++) {
    	  //alert(textareas_array[i].id.toString()); //checking for errors
        makeEditor(textareas_array[i].id);
      }
    }
  }
  xmlhttp.open("POST", "headlines_ajax_functions.php?section=" + section + "&r=" + rand_num,true);
  xmlhttp.send("null");
  if(the_foot.className == "block_hidden") {
    the_foot.className = "block_show";
  }
}

//function to get all data in all existing sections to preserve data
function getInputs() {
  var input_values = new Array();                 //declare array for retrieving data
  var form_head =  document.forms[0].elements.length;   //get sum of all sections

  //store all data into the temp array;
  for(var i = 0; i < form_head; i++){
    var temp = new Array();

    if(document.forms[0].elements[i].id) {
      temp[0] = document.forms[0].elements[i].id;
      temp[1] = document.forms[0].elements[i].value;
      input_values[i] = temp;
    }
    if(document.forms[0].elements[i].name) {
      temp[0] = document.forms[0].elements[i].name;
      temp[1] = document.forms[0].elements[i].value;
      input_values[i] = temp;
    }
  }

  //return the temp array with all preserved data
  return input_values;
}

//function top restore all data to pre-existing sections
function restoreInputs(the_array) {
  var limit = document.forms[0].elements.length;
 
  //get element ids and restore all pre-existing data
  for(x = 0; x < limit ; x++) {
    var get_new = document.forms[0].elements[x];
    for(i = 0; i < the_array.length; i++) {
      var next_array = the_array[i];
      if(document.forms[0].elements[x].id == next_array[0]) {
        document.forms[0].elements[x].value = next_array[1];
      }
      if(document.forms[0].elements[x].name == next_array[0]) {
        document.forms[0].elements[x].name = next_array[1];
      }
    }
  }
}

//check the form for any mistakes before submission
function checkForm(type_submit) {
  //process_headlines.php
  var get_form = document.getElementById('headlinesForm');
  var prefix = "process_";
  var middlefix = "headlines";
  var suffix = ".php";
  var preview_mode = "?preview=true";
  var full_access = "";
  full_access = prefix + middlefix + suffix;

  if(type_submit == "preview") {
	var hedlines = document.getElementById('hed_type').value;
	var get_date = document.getElementById('hed_date').value;
	var sub_line = document.getElementById('subject_line').value;
	full_access = full_access + preview_mode;

	if (!window.focus)return true;
	get_form.action = full_access;
	window.open('Preview', hedlines, "toolbar=no,width=1000,scrollbars=yes");
	get_form.target = hedlines;
	get_form.submit();
	return true;
  }
  else {
	get_form.action = full_access;
    get_form.target = "_self";
    if(!confirm("You'll now be redirected to the archives page\nwhere you can review your entry.\nClick 'OK' to proceed.")) {
      return false;
    }
	get_form.submit();
	return true;
  }
}

//replace problematic characters with utf-8 compliant code
function cleanstring(dirty){
	var smartchr = [ "’","‘","“","”","–","—","…", '„', '‚' , '«','»', '‹', '›', '--', '&quot;', '¡', '¿', '·', '§', '¶', '´', '¯', '¨', '¸', '°', '©', '®', '±', '÷', '×', '¯', '¦', '¤', '¢', '£', '¥', '¹', '²', '³', 'ª', 'Á', 'á', 'À', 'à', 'Â', 'â', 'Å', 'å', 'Ä', 'ä', 'Ã', 'ã', 'Æ', 'æ', 'Ç', 'ç', 'Ð', 'ð', 'É', 'é', 'È', 'è', 'ê', 'Ê', 'Ë', 'ë', 'Í', 'í', 'Ì', 'ì', 'Î', 'î', 'Ï', 'ï', 'Ñ', 'ñ', 'º', 'Ó', 'ó', 'Ò', 'ò', 'Ô', 'ô', 'Ö', 'ö', 'Õ', 'õ', 'Ø', 'ø', 'ß', 'Ú', 'ú', 'Ù', 'ù', 'Û', 'û', 'Ü', 'ü', 'Ý', 'ý', 'ÿ', 'þ', 'Þ', 'µ', '™', '€', '†', '‡', 'Š', 'š', 'Œ', 'œ', 'ƒ' ];
	var correctchr = ["'", "'", '"', '"', '&#8212;', '&#8212;', '...', '"', "'", '"', '"', "'", "'", '&#8212;', '"', '&#161;', '&#191;', '&#183;', '&#167;', '&#182;', '&#180;', '&#175;', '&#168;', '&#184;', '&#176;', '&#169;', '&#174;', '&#177;', '&#247;', '&#215;', '&#172;', '&#166;', '&#164;', '&#162;', '&#163;', '&#165;', '&#185;', '&#178;', '&#179;', '&#170;', '&#193;', '&#225;', '&#192;', '&#224;', '&#194;', '&#226;', '&#197;', '&#229;', '&#196;', '&#228;', '&#195;', '&#227;', '&#198;', '&#230;', '&#199;', '&#231;', '&#208;', '&#240;', '&#201;', '&#233;', '&#200;', '&#232;', '&#234;', '&#202;', '&#203;', '&#235;', '&#205;', '&#237;', '&#204;', '&#236;', '&#206;', '&#238;', '&#207;', '&#239;', '&#209;', '&#241;', '&#186;', '&#211;', '&#243;', '&#210;', '&#242;', '&#212;', '&#244;', '&#214;', '&#246;', '&#213;', '&#245;', '&#216;', '&#248;', '&#223;', '&#218;', '&#250;', '&#217;', '&#249;', '&#219;', '&#251;', '&#220;', '&#252;', '&#221;', '&#253;', '&#255;', '&#254;', '&#222;', '&#181;', '&#8482;', '&#8364;', '&#8224;', '&#8225;', '&#352;', '&#353;', '&#338;', '&#339;', '&#402;' ];
	var thestring = dirty;
	var regex; 

	for (var i = 0; i < smartchr.length; i++) {
    	regex = new RegExp(smartchr[i], "g");
    	thestring = thestring.replace(regex, correctchr[i]);
	}	

	return thestring;
}

function fixURL(url_fix) {
	var header = "http://";
	var exists = "";
	url_fix = url_fix.trim();
	
	if(url_fix) {
		if(!/^https?:\/\//i.test(url_fix)) {
			return header + url_fix;
		}
		else {
			return url_fix;
		}
	}
	else {
		return "";
	}
}

function preview(the_type) {
  var type_hed = the_type;
  var the_form = document.getElementById('headlinesForm');
  var the_date = document.getElementById('hed_date');

  if(type_hed != "not") {
    switch(type_hed) {
    case "econundrum":
	  //var open_html = "archives/" + the_date + "econundrum.html";
      the_form.target = "_blank";
      the_form.action = "process_headlines.php?preview='true'";
      the_form.submit();
	  //window.open(open_html, "Econundrum", "toolbar=no,width=1000,scrollbars=yes");
      break;
    case "decoder":
	  //var open_html = "archives/" + the_date + "dcdecoder.html";
      the_form.target = "_blank";
      the_form.action = "process_headlines.php?preview='true'";
      the_form.submit();
      //window.open(open_html, "DC Decoder", "toolbar=no,width=1000,scrollbars=yes");
      break;
    case "drumbeat":
	  //var open_html = "archives/" + the_date + "drumbeat.html";
      the_form.target = "_blank";
      the_form.action = "process_headlines.php?preview='true'";
      the_form.submit();
      //window.open("drumbeat-template.php", "Drumbeat", "toolbar=no,width=1000,scrollbars=yes");
      break;
    case "wiretap":
        the_form.target = "_blank";
        the_form.action = "process_headlines.php?preview='true'";
        the_form.submit();
        break;
    case "politics":
        the_form.target = "_blank";
        the_form.action = "process_headlines.php?preview='true'";
        the_form.submit();
        break;
    }
  }
  else {
    alert("You must choose a type of headlines");
  }
}

//generate random number for cache busting (IE and derivatives only)
function getRandom() {
  var rand_num = Math.floor(Math.random()*18);
  return rand_num;
}

//set up httpxml call for ajax
function getHTTP() {
var xmlhttp;
if (window.XMLHttpRequest)  {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else if (window.ActiveXObject)  {
  // code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
else  {
  alert("Your browser does not support XMLHTTP!");
  return false;
  }
  return xmlhttp;
}
