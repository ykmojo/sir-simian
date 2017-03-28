<?php
$search_this = "<p>";
$replace_with_this = "<p style=\"font-family: Verdana, Helvetica, Arial, sans-serif !important;font-size: 16px !important;line-height:20px !important;color: #767676 !important;margin: 10px 20px;\">";
$the_text = "<p><em>A NOTE FROM TOM BEFORE THIS WEEK'S</em> FOOD FOR THOUGHT:</p>

			<p>We're cooking up an exciting experiment, so I wanted to send you a quick update. Two weeks ago, we started our first-ever push to sign up monthly donors in a big way&#8212;setting a target of 2,000 generous readers giving $15 a month by the end of September.</p>

			<p><strong>So far, so good: It's not even September yet and we're already to 1,295 new monthly supporters</strong>&#8212;if we can keep the momentum going now, we might just be able to wrap up this experiment ahead of schedule without blanketing our site with ads or sending a lot of emails over the next four weeks. Please consider joining your fellow <em>MoJo</em> readers and support our hard-hitting, independent journalism <strong><a data-mp-url-id=\"_61b7f0df68d50f66340213f9930de0285190d26e\" href=\"https://secure.motherjones.com/fnp/?action=SUBSCRIPTION&list_source=7HEGNL00&extra_don=1&abver=B\" mp-encode=\"false\">by starting your tax-deductible monthly donation today</a></strong>.</p>

			<p>If you're not quite ready, read Monika Bauerlein and Clara Jeffery's latest piece, \"<strong><a data-mp-url-id=\"_6f7463f38f7b7812360ae768bef263ba7f1e6f63\" href=\"http://www.motherjones.com/media/2016/08/whats-missing-from-journalism\" mp-encode=\"false\">This Is What's Missing From Journalism Right Now</a></strong>.\" They go into more detail about how much investigative reporting costs, how it's paid for, and why we believe recurring monthly donations are our best shot at ensuring a stable foundation for the nonprofit, watchdog reporting you expect from us. It's a fascinating look under the hood, and I hope you'll find it convincing.</p>

			<p>Thanks for reading. Now here's the rest of your <em>Food for Thought</em>.</p>

			<p>&#8212;Tom</p>";

$processed_text = str_ireplace($search_this, $replace_with_this, $the_text);

print "Text with no addslashes: $processed_text";
print "Text with addslashes: " . addslashes($processed_text);
print "Text with removeslashes: " . stripslashes($processed_text);

?>