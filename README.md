# Newsletter Curation Utility [NCU] (Previously known as Sir Simian)
## NCU: an online tool to make html newsletters
### Structure of NCU
* *index.php*: Main entry file. Contains input boxes for all newsletter elements
* *Individual newsletter template files*: Each contain newsletter specific code
	* econundrum-template.php
	* food-redesign-template.php (2016 redesigned version)
	* food-template.php (old version)
	* inthemix-template.php
	* politics-template.php
	* breaking-news-template.php
* *process_headlines.php*: Contains code common to all newsletters plus functions to write temp files & place finished newsletters into the archives directory
* *styles_includes.php*: CSS code for inline insertion into HTML code in PHP variables.
* *headlines_ajax_functions.php*: Code for writing out input boxes for each newsletter in the index.php page.
* *headlines_script.js*: Contains AJAX functions that fire off server side code in the *headlines_ajax_functions.php* file.
* *head_main.css*: NCU site CSS. Not for newsletter HTML code.
* *archives/index.php*: Code to control display & view of the archives section of Sir Simian.

### Directories and files not included in the repo that is necessary for Sir Simian function
* *temp*: This directory stores temporary files (snapshots) of newsletters in case of errors.
* *images*: NCU website images.
* *ckeditor*: CKEditor wysiwyg app directory.
* *credentials.inc*: Necessary for DB operations.
