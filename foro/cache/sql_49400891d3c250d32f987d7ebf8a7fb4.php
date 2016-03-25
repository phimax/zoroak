<?php exit; ?>
1458912171
SELECT s.style_id, c.theme_id, c.theme_data, c.theme_path, c.theme_name, c.theme_mtime, i.*, t.template_path FROM phpbb_styles s, phpbb_styles_template t, phpbb_styles_theme c, phpbb_styles_imageset i WHERE s.style_id = 4 AND t.template_id = s.template_id AND c.theme_id = s.theme_id AND i.imageset_id = s.imageset_id
61936
a:1:{i:0;a:11:{s:8:"style_id";s:1:"4";s:8:"theme_id";s:1:"4";s:10:"theme_data";s:61529:"/*  phpBB3 Style Sheet
	--------------------------------------------------------------
	Style name:			Artodia: Helion
	Based on style:		prosilver (the default phpBB 3.0.x style)
	Original author:	Tom Beddard ( http://www.subblue.com/ )
	Modified by:		Vjacheslav Trushkin ( http://www.artodia.com/ )
	--------------------------------------------------------------
*/
/*
	Global CSS definitions, overall layout
*/


/*
	CSS Reset
*/
html, body.phpbb, .phpbb div, .phpbb span, .phpbb applet, .phpbb object, .phpbb iframe, .phpbb
h1, .phpbb h2, .phpbb h3, .phpbb h4, .phpbb h5, .phpbb h6, .phpbb p, .phpbb blockquote, .phpbb pre, .phpbb
a, .phpbb abbr, .phpbb acronym, .phpbb address, .phpbb big, .phpbb cite, .phpbb code, .phpbb
del, .phpbb dfn, .phpbb em, .phpbb img, .phpbb ins, .phpbb kbd, .phpbb q, .phpbb s, .phpbb samp, .phpbb
small, .phpbb strike, .phpbb strong, .phpbb sub, .phpbb sup, .phpbb tt, .phpbb var, .phpbb
b, .phpbb u, .phpbb i, .phpbb center, .phpbb
dl, .phpbb dt, .phpbb dd, .phpbb ol, .phpbb ul, .phpbb li, .phpbb
fieldset, .phpbb form, .phpbb label, .phpbb legend, .phpbb
table, .phpbb caption, .phpbb tbody, .phpbb tfoot, .phpbb thead, .phpbb tr, .phpbb th, .phpbb td, .phpbb
article, .phpbb aside, .phpbb canvas, .phpbb details, .phpbb embed, .phpbb 
figure, .phpbb figcaption, .phpbb footer, .phpbb header, .phpbb hgroup, .phpbb 
menu, .phpbb nav, .phpbb output, .phpbb ruby, .phpbb section, .phpbb summary, .phpbb
time, .phpbb mark, .phpbb audio, .phpbb video, .phpbb meter {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
}
/* HTML5 display-role reset for older browsers */
.phpbb article, .phpbb aside, .phpbb details, .phpbb figcaption, .phpbb figure, .phpbb 
footer, .phpbb header, .phpbb hgroup, .phpbb menu, .phpbb nav, .phpbb section {
	display: block;
}
body.phpbb {
	line-height: 1em;
}
.phpbb ol, .phpbb ul {
	list-style: none;
}
.phpbb blockquote, .phpbb q {
	quotes: none;
}
.phpbb blockquote:before, .phpbb blockquote:after, .phpbb
q:before, .phpbb q:after {
	content: '';
	content: none;
}
.phpbb table {
	border-collapse: collapse;
	border-spacing: 0;
}

/*
	Font
*/
body.phpbb {
	font-family: Verdana;
	font-size: 12px;
	background-position: 0 0;
	background-repeat: repeat-x;
	min-width: 720px;
}
body.simple {
	padding: 8px;
	min-width: 320px;
}

/*
	Common stuff
*/
.phpbb .clear, .phpbb span.corners-bottom {
	display: block;
	clear: both;
	height: 0;
	overflow: hidden;
}
.phpbb .right {
	text-align: right;
}
.phpbb .nowrap {
	white-space: nowrap;
}

.phpbb p {
	padding: 6px 0;
	line-height: 1.5em;
}

.phpbb .rightside {
	float: right;
	text-align: right;
}
.phpbb .leftside {
	float: left;
	text-align: left;
}
.phpbb .left-box {
	display: block;
	float: left;
	margin-right: 5px;
}
.phpbb .right-box {
	display: block;
	float: right;
	margin-left: 5px;
}

.phpbb hr {
	border-width: 0;
	border-top: 1px solid transparent;
	margin-left: 20px;
	margin-right: 20px;
}



/*
	Header
*/
.phpbb .logo {
	text-align: center;
	padding: 0 0 4px;
}
.phpbb .logo h1 {
	display: none; /* remove this line to show forum name in header */
	font-size: 24px;
	font-weight: normal;
	padding: 10px;
}

/*
	Layout
*/
.phpbb .body-wrapper {
	padding: 0 8px;
	background: transparent none 0 0 repeat-x;
}
.phpbb .forum-wrapper {
	min-height: 400px;
	border: 1px solid transparent;
	border-bottom-width: 0;
	-webkit-border-top-left-radius: 6px;
	-webkit-border-top-right-radius: 6px;
	-moz-border-radius-topleft: 6px;
	-moz-border-radius-topright: 6px;
	border-top-left-radius: 6px;
	border-top-right-radius: 6px;
}
.phpbb .layout-outer {
	padding: 0;
	border: 1px solid transparent;
	border-bottom-width: 0;
	-webkit-border-top-left-radius: 5px;
	-webkit-border-top-right-radius: 5px;
	-moz-border-radius-topleft: 5px;
	-moz-border-radius-topright: 5px;
	border-top-left-radius: 5px;
	border-top-right-radius: 5px;
}
.phpbb div.layout-wrapper {
	display: table;
}
.phpbb .layout-wrapper {
	width: 100%;
}
.phpbb div.layout-wrapper > div {
	display: table-cell;
}
.phpbb table.layout-wrapper {
	border-collapse: separate;
}
.phpbb .layout-wrapper > div, .phpbb table.layout-wrapper > tbody > tr > td {
	vertical-align: top;
	padding: 6px;
	border: 0px solid transparent;
	border-width: 0 1px;
}
.phpbb .layout-wrapper > div:first-child, .phpbb .layout-wrapper > tbody > tr > td:first-child {
	border-left-width: 0;
}
.phpbb .layout-wrapper > div:last-child, .phpbb .layout-wrapper > tbody > tr > td:last-child {
	border-right-width: 0 !important;
}
.phpbb .layout-left, .phpbb .layout-right {
	width: 200px;
	max-width: 200px;
}

.phpbb .page-content {
	padding: 8px;
}
.phpbb .page-content > h3 {
	clear: both;
}

/*
	Footer
*/
.phpbb p.time {
	margin-bottom: 6px;
	padding: 0;
}
.phpbb p.time.first {
	float: right;
	text-align: right;
}
.phpbb .footer {
	padding: 10px 8px 4px;
	background: transparent none 0 0 repeat-x;
}

.phpbb .footer .left { 
	float: left; 
	padding: 0;
}
.phpbb .footer .copyright { 
	margin: 0;
	float: right;
	text-align: right;
	padding: 0;
}
.oldie .phpbb .footer .copyright {
	float: none;
}
.phpbb .footer .arty, .phpbb .footer .phpbb-group {
	display: block;
	float: right;
	width: 0;
	height: 0;
	overflow: hidden;
	margin: 0;
	padding: 0;
	padding-top: 28px;
	padding-left: 60px;
	background: transparent none 0 0 no-repeat;
	opacity: 0.5;
}
.phpbb .footer .arty { 
	background-position: -60px 0;
}
.phpbb .footer .arty:hover, .phpbb .footer .phpbb-group:hover {
	opacity: 1;
}

/*
	Menu
*/
.phpbb ul.menu {
	padding-bottom: 4px;
	margin: -1px 0 0;
}
.phpbb ul.menu-nopadding {
	padding-bottom: 0;
}
.phpbb ul.menu-nopadding + ul.menu {
	margin-top: 0;
}
.phpbb .menu > li {
	width: 200px;
}
.phpbb .menu li.menu-form {
	padding: 2px;
	width: 196px;
}
.phpbb .menu li.menu-item, .phpbb .menu li.menu-section {
	display: block;
	background: transparent none 0 -30px no-repeat;
	width: 190px;
	margin: 0 0 2px;
	padding: 0 0 0 10px;
}

.phpbb .menu li.menu-item a, .phpbb .menu li.menu-section a, .phpbb .menu li.menu-section p {
	display: block;
	background: transparent none 100% 0 no-repeat;
	text-decoration: none;
	margin: 0;
	padding: 7px 10px 0 0;
	height: 22px;
	text-align: left;
	line-height: 1.2em;
	white-space: nowrap;
	max-width: 180px;
	overflow: hidden;
	text-overflow: ellipsis;
	outline-style: none;
}
.phpbb .menu li.menu-section.expandable a {
	max-width: 160px;
	padding-left: 10px;
	padding-right: 20px;
}
.phpbb .menu li.menu-section {
	background-position: 0 0;
}

.phpbb .menu li.menu-section a, .phpbb .menu li.menu-section p {
	font-family: 'Open Sans', sans-serif;
	font-size: 13px;
	background-position: 100% -30px;
	text-align: center;
	padding-top: 6px;
	height: 23px;
}
.phpbb .menu li.menu-section a:hover {
	text-decoration: underline;
}

.phpbb .menu li.menu-home {
	background-position: 0 -60px;
	padding-left: 27px;
	width: 173px;
}
.phpbb .menu li.menu-forum {
	background-position: 0 -90px;
	padding-left: 27px;
	width: 173px;
}
.phpbb .menu li.menu-pm {
	background-position: 0 -120px;
	padding-left: 28px;
	width: 172px;
}
.phpbb .menu li.menu-ucp {
	background-position: 0 -150px;
	padding-left: 29px;
	width: 171px;
}
.phpbb .menu li.menu-down {
	background-position: 0 -180px;
	padding-left: 27px;
	width: 173px;
}
.phpbb .menu li.menu-login {
	background-position: 0 -210px;
	padding-left: 30px;
	width: 170px;
}
.phpbb .menu li.menu-search {
	background-position: 0 -240px;
	padding-left: 30px;
	width: 170px;
}
.phpbb .menu li.menu-users {
	background-position: 0 -270px;
	padding-left: 28px;
	width: 172px;
}
.phpbb .menu li.menu-faq {
	background-position: 0 -300px;
	padding-left: 25px;
	width: 175px;
}
.phpbb .menu li.menu-link {
	background-position: 0 -330px;
	padding-left: 25px;
	width: 175px;
}

/*
	Menu forms, expandable menu sections
*/
.phpbb li.menu-form input, .phpbb li.menu-form a {
	margin-bottom: 6px;
}

.phpbb .menu li.expandable {
	position: relative;
}
.phpbb .menu li.expandable:after {
	display: block;
	position: absolute;
	content: '';
	top: 0;
	bottom: 4px;
	right: 8px;
	z-index: 2;
	width: 13px;
	background: transparent none 0 8px no-repeat;
	opacity: 0.5;
}
.phpbb .menu li.expandable:hover:after {
	opacity: 1;
}
.phpbb .menu li.expandable.collapsed:after {
	background-position: -15px 8px;
	opacity: 1;
}


/*
	Navbar
*/
.phpbb .navbar, .phpbb .linkmcp {
	margin: 6px 0;
	padding: 6px;
	border: 1px solid transparent;
	border-radius: 5px;
	clear: both;
	background: transparent none 0 50% repeat-x;
	line-height: 1em;
}
.phpbb .panel .navbar, .phpbb .panel .linkmcp {
	margin: 0;
	padding: 0;
	border-width: 0;
	border-radius: 0;
}
.phpbb .panel.navbar .inner {
	padding: 0;
}
.phpbb .panel.navbar .panel-inner {
	padding: 2px;
}
.phpbb .navbar:first-child {
	margin-top: 0;
}
.phpbb .navbar:last-child {
	margin-bottom: 0;
}
.ie7 .phpbb .linkmcp {
	height: 12px;
}
.ie7 .phpbb div.navbar {
	height: 20px;
}
.phpbb .navbar:after, .phpbb .linklist:after, .phpbb .topic-actions:after, .phpbb #tabs ul:after, .phpbb #minitabs ul:after, .phpbb dl.details:after {
	content: '';
	display: block;
	clear: both;
}
.phpbb .navbar .left {
	float: left;
}
.phpbb .navbar .right {
	float: right;
}
.phpbb .navbar a {
	text-decoration: none;
}
.phpbb .navbar a:hover {
	text-decoration: underline;
}
.phpbb .linkmcp {
	text-align: right;
}

/*
	Header login
*/
.phpbb .header-login {
	background: transparent none 0 0 repeat-x;
	margin: 0 -8px;
	padding: 6px 0 0;
	text-align: center;
	height: 27px;
	font-size: 15px;
	font-family: 'Open Sans', sans-serif;
	font-weight: 400;
	line-height: 1em;
	white-space: nowrap;
	text-align: center;
}
.ie7 .phpbb .header-login {
	padding-top: 4px;
	height: 29px;
}
.phpbb .header-login > div.popup-trigger {
	display: inline-block;
}
.ie7 .phpbb .header-login > div.popup-trigger {
	display: inline;
	z-index: 2;
	zoom: 1;
}

.phpbb a.header-menu {
	display: inline-block;
	padding: 0 4px;
	text-decoration: none;
	text-align: center;
	min-width: 150px;
}
.phpbb a.header-menu:hover {
	text-decoration: underline;
}

.phpbb a.header-menu.menu-login { 
	text-align: right;
}
.phpbb a.header-menu.menu-register { 
	text-align: left;
}
.phpbb a.header-menu.menu-login > span, .phpbb a.header-menu.menu-register > span {
	padding-left: 20px;
	background: transparent none 0 2px no-repeat;
}
.phpbb a.header-menu.menu-register > span {
	background-position: 0 -28px;
}

/*
	Top links
*/
.phpbb .top-links {
	text-align: center;
	margin: 6px 0;
}
.phpbb .top-links .top-link {
	display: inline-block;
	background: transparent none 0 -30px no-repeat;
	white-space: nowrap;
	text-decoration: none !important;
	line-height: 1em;
	padding: 0;
	padding-left: 12px;
	vertical-align: top;
}
.phpbb .top-links .popup-trigger .top-link {
	padding-left: 29px;
	background-position: 0 -60px;
}
.phpbb .top-links .top-link > span {
	display: inline-block;
	margin: 0;
	padding: 8px 12px 0 0;
	height: 21px;
	background: transparent none 100% 0 no-repeat;
}
.ie7 .phpbb .top-links .popup-trigger {
	display: inline;
	margin-right: 4px;
	z-index: 2;
}
/*
	Page specific code
*/

/*
	Header boxes
*/
.phpbb .topiclist .header, .phpbb h2.header-outer {
	clear: both;
	display: block;
	margin: 6px 0 0;
	padding: 0;
	background: transparent none 0 0 repeat-x;
	border-radius: 0;
	border-width: 0;
	height: 32px;
	overflow: hidden;
}
.phpbb .topiclist .header {
	background: none 50% 0 no-repeat, transparent none 0 0 no-repeat;
	position: relative;
}
.oldie .phpbb .topiclist .header {
	background: transparent none 0 0 no-repeat;
}
.phpbb h2.header.header-outer {
	background-position: 50% 0;
	background-repeat: no-repeat;
}
.phpbb .topiclist .header {
	background-repeat: no-repeat;
}
.phpbb .topiclist .header dl, .phpbb h2.header-outer .header-right, .phpbb h2.header-outer .header-left {
	display: block;
	background: transparent none 100% 0 no-repeat;
	padding: 0;
}
.phpbb h2.header-outer .header-left {
	background-position: 0 0;
}

.phpbb .topiclist .header dd {
	display: none !important;
}
.phpbb .topiclist .header dt, .phpbb h2.header-outer .header-inner {
	clear: both;
	display: block;
	font-size: 15px;
	font-family: 'Open Sans', sans-serif;
	font-weight: 400;
	line-height: 1em;
	white-space: nowrap;
	text-align: center;
	height: 26px !important;
	margin: 0 10px;
	padding: 6px 20px 0 !important;
	overflow: hidden;
	background: transparent none 0 0 repeat-x;
}

.phpbb .topiclist .header a, .phpbb h2.header-outer a, .phpbb .post h3 a {
	text-decoration: none;
}
.phpbb .topiclist .header a:hover, .phpbb h2.header-outer a:hover, .phpbb .post h3 a:hover {
	text-decoration: underline;
}

.ie7 .phpbb .topiclist .header dt, .ie7 .phpbb h2.header-outer .header-inner {
	font-family: Arial;
}

.phpbb .expandable .header:after {
	display: block;
	position: absolute;
	content: '';
	top: 0;
	bottom: 4px;
	right: 8px;
	z-index: 2;
	width: 13px;
	background: transparent none 0 50% no-repeat;
	opacity: 0.5;
}
.phpbb .expandable .header:hover:after {
	opacity: 1;
}
.phpbb .expandable .header.inactive:after {
	background-position: -15px 50%;
	opacity: 1;
}

/*
	Forums list
*/
.phpbb .topiclist {
	clear: both;
	zoom: 1;
}

.phpbb .topiclist {
	display: block;
}
.phpbb .topiclist:after, .phpbb .post:after {
	content: '';
	display: block;
	clear: both;
}

.phpbb .topiclist > li {
	margin: 2px 0;
	padding: 4px 0;
	border: 1px solid transparent;
	border-radius: 6px;
}
.phpbb .topiclist > li.row-outer {
	padding: 0;
}

.phpbb .topiclist dl {
	display: table;
	width: 100%;
}
.phpbb .topiclist dt, .phpbb .topiclist dd {
	display: table-cell;
	vertical-align: middle;
	line-height: 1.5em;
	height: 33px;
	padding: 0 6px;
}
.phpbb .topiclist .icon dt {
	padding-left: 40px;
	height: 39px;
}

.phpbb .topiclist dd {
	border-left: 1px solid transparent;
	text-align: center;
	line-height: 1.3em;
	width: 50px;
}

.phpbb .topiclist dd.info, .phpbb .topiclist dd.time {
	min-width: 220px;
	font-size: 11px;
	line-height: 1.5em;
}
.phpbb .topiclist dd.lastpost, .phpbb .topiclist dd.redirect {
	min-width: 220px;
	text-align: left;
	font-size: 11px;
	line-height: 1.5em;
}
.phpbb .topiclist dd.moderation {
	width: 40%;
	text-align: left;
}
.phpbb .topiclist dd.empty {
	display: none;
}

.phpbb .topiclist .topics dfn, .phpbb .topiclist .posts dfn, .phpbb .topiclist .views dfn {
	text-transform: lowercase;
	display: block;
	font-size: 11px;
}
.phpbb span.forum-image {
	float: left;
	padding-right: 6px;
}
.phpbb dl.icon {
	background: transparent none 3px 50% no-repeat;
}
.phpbb dl.icon dt {
	background: transparent none 3px 50% no-repeat;
}

.phpbb a.forumtitle, .phpbb a.topictitle {
	display: inline-block;
	font-family: Arial;
	font-size: 16px;
	font-weight: normal;
	text-decoration: none;
	line-height: 1em;
}
.phpbb a.topictitle {
	padding-top: 1px;
}
.phpbb a.forumtitle:hover, .phpbb a.topictitle:hover {
	text-decoration: underline;
}

.phpbb p.subforums, .phpbb p.moderators {
	padding: 2px 0 0;
}
.phpbb p.subforums strong, .phpbb p.moderators strong {
	font-weight: normal;
}

/*
	IE7 topics list
*/
.ie7 .phpbb .topiclist dl {
	display: block;
	height: 1%;
}
.ie7 .phpbb .topiclist dl.icon {
	min-height: 39px;
}
.ie7 .phpbb .topiclist dt, .ie7 .phpbb .topiclist dd {
	display: block;
	float: left;
}
.ie7 .phpbb .topiclist dt {
	width: 50%;
	height: 1%;
}
.ie7 .phpbb .topiclist .header dt {
	width: auto;
	float: none;
}
.ie7 .phpbb .topiclist dd {
	width: 8%;
}
.ie7 .phpbb .topiclist dd.lastpost {
	width: 25%;
}	 

.ie7 .phpbb .topiclist .header dl.icon, .ie7 .phpbb .topiclist .header dt {
	min-height: 32px;
	max-height: 32px;
	height: 32px !important;
	padding-top: 0;
	zoom: 1;
}


/*
	Small arrows
*/
.phpbb a.subforum {
	padding-left: 14px;
	background: transparent none 0 50% no-repeat;
}

/*
	Content blocks
*/
.phpbb h2, .phpbb h3 {
	margin: 12px 0 4px;
	font-size: 16px;
	font-family: Helvetica, Arial;
	font-weight: 400;
	line-height: 1.2em;
}

.ie7 .phpbb .panel, .ue7 .phpbb div.rules {
	clear: both;
}
.phpbb .panel, .phpbb div.rules, .phpbb .cp-mini {
	margin: 6px 0;
	padding: 0;
	border: 1px solid transparent;
	border-radius: 6px;
	background: transparent none 0 0 repeat-x;
}
.phpbb .pm-panel-message {
	margin: 0;
	padding: 0;
	border-width: 0;
}
.phpbb .panel .inner, .phpbb .panel .content {
	padding: 4px;
}
.phpbb .panel-outer .panel-inner {
	padding: 0;
}
.phpbb div.rules .inner {
	padding: 10px;
	line-height: 1.5em;
}
.phpbb #information.rules .inner {
	text-align: center;
	padding: 20px;
}
.phpbb .postbody p.rules {
	padding: 10px;
	text-align: center;
	border-radius: 5px;
}

.phpbb .panel-wrapper, .phpbb .panel-wrapper > .panel-inner {
	border-width: 0 !important;
	box-shadow: none !important;
}
.phpbb .panel-wrapper .inner-first {
	padding: 4px 0;
}

.phpbb .panel h2, .phpbb .panel h3 {
	margin: 0;
	padding: 6px 0 0;
}
.phpbb .panel h2:first-child, .phpbb .panel h3:first-child,
.phpbb .panel .corners-top + h2, .phpbb .panel .corners-top + h3 {
	padding-top: 0;
}
.phpbb .panel p {
	padding: 3px 0;
}
.phpbb .panel.stats .inner {
	background: transparent none 5px 50% no-repeat;
	padding-left: 40px;
}
.phpbb div.rules span+strong {
	font-family: Helvetica, Arial;
	font-size: 16px;
	display: inline-block;
	padding-bottom: 4px;
}
.phpbb .rules {
	background-position: 50% 0;
	background-repeat: no-repeat;
}
.phpbb .postbody .rules strong {
	font-weight: normal;
}

.phpbb #message.panel .panel-inner, .phpbb #confirm .panel .panel-inner {
	padding: 10px;
	line-height: 1.5em;
	font-size: 13px;
}

.phpbb h2.header + div.rules, .phpbb h2.header + .navbar, .phpbb h2.header + .topic-actions {
	margin-top: 4px;
}

.phpbb .panel-inner .inner:after {
	display: block;
	content: '';
	clear: both;
}


/*
	Tables
*/
.phpbb table.table1 {
	margin: 6px 0;
	width: 100%;
	border-collapse: separate;
	border-spacing: 2px;
}
.phpbb table.table1 td, .phpbb table.table1 th {
	border: 1px solid transparent;
	border-radius: 5px;
	padding: 4px;
	vertical-align: middle;
}
.phpbb table.table1 th {
	background: transparent none 0 0 repeat-x;
}
.phpbb td.posts, .phpbb td.info {
	text-align: center;
}

/*
	Arrows
*/
.phpbb a.left, .phpbb a.right, .phpbb a.up, .phpbb a.down {
	background: none transparent 0 50% no-repeat;
	padding-left: 10px;
	text-decoration: none;
	line-height: 1em;
	font-size: 12px;
	font-family: Arial;
	-moz-transition: background-position 0.25s ease;
	-webkit-transition: background-position 0.25s ease;
	-o-transition: background-position 0.25s ease;
	-ms-transition: background-position 0.25s ease;
	transition: background-position 0.25s ease;
}
.phpbb a.left:hover, .phpbb a.up:hover, .phpbb a.down:hover {
	background-position: 2px 50%;
}
.phpbb a.right, .phpbb a.right-box.up, .phpbb a.right-box.down {
	background-position: 100% 50%;
	padding-left: 0;
	padding-right: 10px;
}
.phpbb a.right:hover, .phpbb a.right-box.up:hover, .phpbb a.right-box.down:hover {
	background-position: -moz-calc(100% - 2px) 50%;
	background-position: calc(100% - 2px) 50%;
}
.phpbb .submit-buttons a.up {
	margin-top: 6px;
}


/*
	Pagination, topic actions, reported/unapproved posts
*/
.phpbb .display-options {
	text-align: center;
	clear: both;
}
.phpbb .display-options a {
	margin-top: 6px;
}
.phpbb .pagination {
	margin: 0;
	padding: 0;
	line-height: 1em;
}
.ie7 .phpbb .topic-actions {
	min-height: 28px;
}
.phpbb .topic-actions .pagination {
	float: right;
	padding-left: 6px;
	padding-top: 4px;
}
.phpbb .row .pagination {
	float: right;
}
.phpbb .pagination span.page-sep, .phpbb .pagination span.page-dots { display: none; }
.phpbb .pagination span a, .phpbb .pagination span strong {
	display: inline-block;
	margin: 0 1px;
	text-align: center;
	min-width: 10px;
	padding: 2px 3px 3px;
	border-radius: 5px;
	text-decoration: none;
	font-weight: normal;
	background-position: 0 50%;
	background-repeat: repeat-x;
}
.phpbb .pagination span strong { pointer-events: none; }

.phpbb a.unapproved, .phpbb a.reported {
	float: right;
	display: block;
	margin-top: -2px;
	padding-left: 6px;
	opacity: 0.8;
}
.phpbb a.unapproved img, .phpbb a.reported img {
	display: block;
}
.phpbb a.unapproved:hover, .phpbb a.reported:hover {
	opacity: 1;
}
.phpbb div.buttons {
	float: left;
}
.phpbb .inner > div.buttons {
	float: none;
}
.phpbb div.buttons > div {
	margin-right: 5px;
	float: left;
}
.phpbb .topic-actions .search-box {
	float: left;
	padding-top: 3px;
}

.phpbb #jumpbox, .phpbb .jumpbox, .phpbb #jumpbox + form, .phpbb .js-jumpbox {
	display: block;
	float: right;
	text-align: right;
	clear: right;
	margin: 4px 0;
}
.phpbb .jumpbox-js label {
	float: left;
	display: block;
	padding-top: 11px;
	padding-right: 4px;
}

/*
	Posting form
*/
.phpbb #format-buttons {
	padding: 2px 0;
}
.phpbb #smiley-box {
	float: right;
	width: 200px;
}
.phpbb #message-box {
	margin-right: 210px;
}
.phpbb #qr_editor_div #message-box {
	margin-right: 0;
}
.phpbb #message-box textarea {
	width: 98%;
	width: -moz-calc(100% - 6px);
	width: calc(100% - 6px);
}

.phpbb p.error, .phpbb dd.error {
	padding: 6px;
}

/*
	Poll
*/
.phpbb .polls {
	margin: 4px 0 0;
}
.phpbb .polls dl {
	display: table;
	width: 100%;
	border-top: 1px solid transparent;
}
.phpbb .polls dl.votes {
	border-top-width: 0;
}
.phpbb .polls dt, .phpbb .polls dd {
	display: table-cell;
	margin: 0;
	padding: 4px 0 4px 4px;
}
.phpbb .polls dt {
	width: 95%;
	clear: left;
	padding-left: 0;
}
.phpbb .polls dd {
	width: 20%;
}
.phpbb .polls dd.resultbar {
	width: 50%;
	padding-left: 10px;
	padding-right: 10px;
}

.ie7 .phpbb .polls dl, .ie7 .phpbb .polls dt, .ie7 .phpbb .polls dd {
	display: block;
}
.ie7 .phpbb .polls dt, .ie7 .phpbb .polls dd {
	float: left;
}
.ie7 .phpbb .polls dt {
	width: 30%;
}
.ie7 .phpbb .polls dd {
	width: 10%;
}
.ie7 .phpbb .polls dd.resultbar {
	width: 45%;
}

.phpbb .polls dd.resultbar > div {
	min-width: 10px;
	padding: 3px 4px 2px;
	border: 0px solid transparent;
	border-radius: 6px;
	text-align: right;
	line-height: 1em;
	font-size: 12px;
	font-family: Arial;
	background: transparent none 0 50% repeat-x;
}

.phpbb .polls dl.votes dt { 
	display: none; 
}
.phpbb .polls dl.votes dd { 
	text-align: center;
	width: 100%;
	padding-top: 0;
}
.phpbb .content p.author {
	color: #808080;
}


/*
	Posts
*/
.phpbb .post+hr.divider {
	display: none;
}

.phpbb p.author {
	font-size: 12px;
	line-height: 1.5em;
	padding: 0;
}

.phpbb .post {
	margin: 6px 0;
	clear: both;
	position: relative;
}
.phpbb .post-content-wrap {
	display: table;
	width: 100%;
	max-width: 100%;
}
.phpbb .post-content-wrap > span {
	display: none;
}
.phpbb .post-content-wrap > .postbody {
	display: table-cell;
	vertical-align: top;
	width: 100%;
	padding-bottom: 10px;
}
.phpbb .profile + .postbody {
	border-left: 1px solid transparent;
	padding-left: 10px;
	padding-right: 6px;
}
.phpbb .post {
	border: 1px solid transparent;
	border-radius: 6px;
	padding: 0;
	word-wrap: break-word;
}
.phpbb .post-content-wrap > .postprofile, .phpbb .post-content-wrap > .profile {
	display: table-cell;
	vertical-align: top;
	min-width: 190px;
	vertical-align: top;
	padding-bottom: 10px;
}
.phpbb .post .postprofile {
	padding: 0 4px 4px 0;
	word-wrap: break-word;
}

.ie7 .phpbb .post-content-wrap {
	display: block;
}
.ie7 .phpbb .post-content-wrap > .profile {
	display: block;
	float: left;
	width: 190px;
}
.ie7 .phpbb .post-content-wrap > .postbody {
	display: block;
	margin-left: 200px;
	clear: none;
	width: auto;
}
.ie7 .phpbb #topicreview .post .postbody, .ie7 .phpbb #preview.post .postbody {
	margin-left: 0;
}

.phpbb .post .back2top {
	display: block;
	position: absolute;
	z-index: 2;
	right: 8px;
	bottom: 6px;
}
.phpbb .post .back2top a {
	display: inline-block;
	text-decoration: none;
	padding-right: 14px;
	font-size: 11px;
	white-space: nowrap;
	background: transparent none 100% 50% no-repeat;
}

.phpbb .post .content {
	padding-bottom: 4px;
	word-wrap: break-word;
	overflow: hidden;
}

.phpbb .postprofile dt {
	text-align: center;
	font-size: 16px;
	font-family: Arial;
	line-height: 1.2em;
	padding-top: 1px;
	white-space: nowrap;
}
.phpbb .postprofile dt a, .phpbb .postprofile dt a:visited {
	text-decoration: none;
}
.phpbb .postprofile dt a:hover {
	text-decoration: underline;
}
.phpbb .postprofile dt .popup {
	top: 20px;
}
.phpbb .postprofile dt .popup a {
	min-width: 162px;
}
.phpbb .postprofile dd {
	font-size: 11px;
	line-height: 1.1em;
	padding: 4px 6px 0;
}
.phpbb .postprofile dd.poster-rank {
	text-align: center;
	padding-top: 0;
	white-space: nowrap;
}
.phpbb .poster-avatar {
	text-align: center;
	margin: 4px 10px 4px 6px;
	padding: 4px 0 0;
}
.phpbb .poster-avatar.empty span {
	display: block;
	min-height: 90px;
	min-width: 90px;
	background: transparent none 50% 0 no-repeat;
	opacity: 0.8;
	-moz-transition: opacity 0.25s ease;
	-webkit-transition: opacity 0.25s ease;
	-o-transition: opacity 0.25s ease;
	-ms-transition: opacity 0.25s ease;
	transition: opacity 0.25s ease;
}
.phpbb .post:hover .poster-avatar.empty span {
	opacity: 1;
}

.phpbb .online .poster-avatar {
	padding-top: 16px;
	min-width: 90px;
	background: transparent none 50% 0 no-repeat;
}

.phpbb .postbody h3, .phpbb .content h2:first-child {
	clear: none;
	margin: 0;
	padding: 3px 0 1px;
}
.phpbb .postbody .author {
	font-size: 11px;
	margin: 0 0 6px;
}
.phpbb .postbody .author img {
	margin-right: 2px;
}

.phpbb .postbody .searchresults {
	float: right;
	text-align: right;
}

/*
	Post buttons
*/
.phpbb .postbody .profile-icons {
	float: right;
}
.phpbb .postbody .profile-icons li {
	float: left;
	width: auto !important;
	background: none !important;
}

.phpbb .profile-icons a {
	display: block;
	float: left;
	margin: 0 0 0 4px;
	padding: 0;
	text-decoration: none !important;
	width: 21px;
	height: 21px;
	overflow: hidden;
	background: transparent none 0 0 no-repeat;
	outline-style: none;
}
.phpbb .profile-icons a:hover, .phpbb .profile-icons a:active {
	outline-style: none;
}
.phpbb .profile-icons span {
	display: none;
}

.phpbb .profile-icons .edit-icon a {
	width: 58px;
	background-position: 0 -21px;
}
.phpbb .profile-icons .quote-icon a {
	width: 69px;
}
.phpbb .profile-icons .delete-icon a {
	background-position: 0 -42px;
}
.phpbb .profile-icons .info-icon a {
	background-position: -21px -42px;
}
.phpbb .profile-icons .report-icon a {
	background-position: -42px -42px;
}
.phpbb .profile-icons .warn-icon a {
	background-position: -63px -42px;
}

/*
	Other icons
*/
.phpbb .profile-icons > li.pm-icon, .phpbb .profile-icons > li.email-icon, .phpbb .profile-icons > li.web-icon, .phpbb .profile-icons > li.msnm-icon, .phpbb .profile-icons > li.icq-icon, .phpbb .profile-icons > li.yahoo-icon, .phpbb .profile-icons > li.aim-icon, .phpbb .profile-icons > li.jabber-icon {
	display: none;
}

.phpbb .profile-icons > li.pm-icon a, .phpbb .profile-icons > li.email-icon a, .phpbb .profile-icons > li.web-icon a, .phpbb .profile-icons > li.msnm-icon a, .phpbb .profile-icons > li.icq-icon a, .phpbb .profile-icons > li.yahoo-icon a, .phpbb .profile-icons > li.aim-icon a, .phpbb .profile-icons > li.jabber-icon a {
	display: inline;
	width: auto;
	height: auto;
	background-color: transparent !important;
	background-image: none !important;
	text-decoration: underline !important;
}
.phpbb .profile-icons > li.pm-icon span, .phpbb .profile-icons > li.email-icon span, .phpbb .profile-icons > li.web-icon span, .phpbb .profile-icons > li.msnm-icon span, .phpbb .profile-icons > li.icq-icon span, .phpbb .profile-icons > li.yahoo-icon span, .phpbb .profile-icons > li.aim-icon span, .phpbb .profile-icons > li.jabber-icon span {
	display: inline;
}

/*
	Post content
*/
.phpbb .postbody .content {
	font-size: 13px;
	line-height: 1.5em;
}

.phpbb .postbody img, .phpbb .postbody .attach-image {
	max-width: 640px;
	overflow: auto;
}
.phpbb .postbody .attach-image img {
	max-width: none;
}
.phpbb .postbody .rules {
	border: 1px solid transparent;
	margin: 5px 20px;
	padding: 0;
	font-size: 12px;
}
.phpbb .postbody .rules img {
	vertical-align: top;
}
.phpbb .postbody .rules a {
	display: inline-block;
	padding-top: 2px;
	font-weight: bold;
	text-decoration: none;
}
.phpbb .postbody .rules a:hover {
	text-decoration: underline;
}

.phpbb .signature {
	font-size: 12px;
	border-top: 1px solid transparent;
	padding-top: 4px;
	margin-top: 10px;
	line-height: 1.5em;
}
.phpbb .postbody .notice {
	font-size: 12px;
	border: 1px solid transparent;
	margin: 10px 0 0;
	border-radius: 6px;
	padding: 4px;
	line-height: 1.5em;
}
.phpbb .postbody .notice:last-child {
	margin-bottom: 8px;
}

/*
	BBCode
*/
.phpbb blockquote, .phpbb .attachbox, .phpbb .codebox, .phpbb .inline-attachment {
	border: 1px solid transparent;
	margin: 5px 20px;
	padding: 4px;
}
.phpbb blockquote {
	font-size: 12px;
}
.phpbb blockquote cite, .phpbb .attachbox dt, .phpbb .codebox dt {
	display: block;
	line-height: 1em;
	border-bottom: 1px solid transparent;
	margin-bottom: 4px;
	padding: 2px 0 6px;
}
.phpbb .file dt {
	border-bottom-width: 0;
	margin: 0;
	padding-bottom: 6px;
}
.phpbb .codebox dt a {
	display: block;
	float: right;
}

.phpbb .content ul {
    list-style-type: disc;
}
.phpbb .content ol {
    list-style-type: decimal;
}
.phpbb .content li {
    display: list-item;
    margin: 0 0 0 20px;
}

.phpbb .content ul ul, .phpbb .content ol ul {
    list-style-type: circle;
}

.phpbb .content ol ol ul, .phpbb .content ol ul ul, .phpbb .content ul ol ul, .phpbb .content ul ul ul {
    list-style-type: square;
} 

/*
	Forms
*/
.phpbb fieldset {
	line-height: 1.1em;
}
.phpbb fieldset dl {
	padding: 4px 0;
	clear: left;
}
.ie7 .phpbb fieldset dl {
	height: 1%;
}
.phpbb fieldset dt {
	float: left;
	width: 40%;
}
.phpbb fieldset.fields1 dt {
	width: 180px;
}
.phpbb fieldset dd {
	margin-bottom: 3px;
	margin-left: 41%;
	vertical-align: top;
}
.phpbb fieldset.fields1 dd {
	margin-left: 185px;
}

/*
	Lists
*/
.phpbb .linklist li {
	float: left;
}
.phpbb .linklist li.rightside {
	float: right;
}

/*
	Tabs
*/
.phpbb #tabs ul, .phpbb #minitabs ul {
	clear: both;
	display: block;
	margin: 10px 6px -6px;
}
.ie7 .phpbb #tabs ul, .ie7 .phpbb #minitabs ul {
	height: 1%;
}
.phpbb #tabs ul.main-tabs, .phpbb #tabs.cp-tabs ul {
	margin-bottom: 0;
}
.phpbb #tabs.cp-tabs ul {
	margin-left: 0;
}
.phpbb #tabs ul + ul {
	margin-top: 2px;
}
.phpbb #tabs li, .phpbb #minitabs li {
	display: block;
	float: left;
	margin: 0 1px;
	padding: 0;
}
.phpbb #tabs li a, .phpbb #minitabs li a {
	display: block;
	padding: 5px 6px;
	border: 1px solid transparent;
	background: transparent none 0 0 repeat-x;
	border-bottom-width: 0;
	border-top-left-radius: 6px;
	border-top-right-radius: 6px;
	text-decoration: none;
}
.phpbb #tabs .main-tabs li a, .phpbb #tabs.cp-tabs li a {
	border-bottom-width: 1px;
	border-radius: 6px;
}

/*
	Control panel
*/
.phpbb .cp-content {
	clear: both;
}

.phpbb .cp-mini {
	float: left;
	margin: 5px;
	margin-left: 0;
	padding: 5px;
}
.phpbb dl.mini {
	max-height: 140px;
	min-width: 140px;
	min-height: 60px;
	overflow: auto;
}
.phpbb dl.mini dt {
	padding-bottom: 3px;
}

.phpbb #cp-main {
	clear: both;
}

.phpbb dl.pmlist dt {
	width: 40% !important;
}
.phpbb dl.pmlist dt textarea {
	width: 99%;
	width: -moz-calc(100% - 6px);
	width: calc(100% - 6px);
}
.phpbb dl.pmlist dd {
	margin-bottom: 2px;
	margin-left: 41% !important;
}

.phpbb .pm-legend {
	border-left: 10px solid transparent;
	padding: 4px;
	white-space: nowrap;
}
.phpbb .topiclist.pmlist > li > dl {
	padding-left: 4px;
	-moz-box-sizing: border-box;
	-webkit-box-sizing: border-box;
	box-sizing: border-box;
}
.phpbb .topiclist.pmlist > li > dl dt {
	border-left: 4px solid transparent;
}
.phpbb .topiclist.pmlist > li > dl.icon {
	background-position: 15px 50%;
}
.phpbb .topiclist.pmlist > li > dl dt {
	padding-left: 44px;
	background-position: 9px 80%;
}

.phpbb dl.details {
	line-height: 1.5em;
}
.phpbb span.corners-top + dl.details.left-box {
	width: 100% !important;
}
.phpbb dl.details dt {
	clear: left;
	float: left;
	width: 30%;
	text-align: right;
}
.phpbb dl.details dd {
	float: left;
	width: 65%;
	margin: 0 0 5px;
	padding-left: 5px;
}

/*
	Groups
*/
.phpbb table.table1 .name {
	text-align: left;
}
.phpbb table.table1 span.rank-img {
	float: right;
}

/*
	FAQ
*/
.phpbb dl.faq {
	padding-top: 6px;
	line-height: 1.5em;
}
.phpbb dl.faq:first-child {
	padding-top: 0;
}
.phpbb dl.faq dt {
	padding-bottom: 4px;
	font-size: 13px;
	line-height: 1.5em;
	font-weight: bold;
}
.phpbb #faqlinks .column1, .phpbb #faqlinks .column2 {
	float: left;
	width: 49%;
}

/*
	Avatars gallery
*/
.phpbb #gallery label {
	display: block;
	float: left;
	margin: 10px;
	padding: 5px;
	text-align: center;
	border: 1px solid transparent;
}

/*
	RSS feed
*/
.phpbb a.feed-icon-forum {
	display: block;
	float: right;
	width: 0;
	height: 0;
	overflow: hidden;
	margin: 0;
	padding: 18px 0 0 18px;
	background: transparent none 0 0 no-repeat;
}
.phpbb a.feed-icon-forum:hover {
	background-position: 0 -20px;
}

/*
	Transitions
*/
.phpbb .topiclist > li, .phpbb h2.header-outer, .phpbb table.table1 th, 
.phpbb .expandable .header:after, .phpbb .menu li.expandable:after,
.phpbb .buttons a, .phpbb a.button, .phpbb .buttons a span, .phpbb a.button span,
.phpbb input[type="submit"], .phpbb .button1, .phpbb .button2,
.phpbb .pagination span a, .phpbb .pagination span strong,
.phpbb .menu li.menu-item, .phpbb .menu li.menu-section, .phpbb .top-links .top-link, .phpbb .header-login, .phpbb .footer .arty, .phpbb .footer .phpbb-group,
.phpbb .profile-icons a {
    transition: background-color 0.25s ease;
    -webkit-transition: background-color 0.25s ease;
    -moz-transition: background-color 0.25s ease;
    -o-transition: background-color 0.25s ease;
    -ms-transition: background-color 0.25s ease;
}

.phpbb .rules {
    transition: border-color 0.25s ease;
    -webkit-transition: border-color 0.25s ease;
    -moz-transition: border-color 0.25s ease;
    -o-transition: border-color 0.25s ease;
    -ms-transition: border-color 0.25s ease;
}

.phpbb .menu li.menu-item a {
    transition: color 0.25s ease;
    -webkit-transition: color 0.25s ease;
    -moz-transition: color 0.25s ease;
    -o-transition: color 0.25s ease;
    -ms-transition: color 0.25s ease;
}

.phpbb .topiclist > li, .phpbb table.table1 th, .phpbb .expandable .header:after, .phpbb .menu li.expandable:after, .phpbb .footer .arty, .phpbb .footer .phpbb-group, .phpbb .header-login {
	transition-property: background-color, border-color, opacity, color;
	-webkit-transition-property: background-color, border-color, opacity, color;
	-moz-transition-property: background-color, border-color, opacity, color;
	-o-transition-property: background-color, border-color, opacity, color;
	-ms-transition-property: background-color, border-color, opacity, color;
}

/*
	Boxes
*/
.phpbb .topiclist > li.row-outer, .phpbb .panel-outer, .phpbb .post-outer {
	border-width: 0;
	padding: 0;
	border-radius: 0;
	background-position: 50% 0;
	background-repeat: no-repeat;
	zoom: 1;
}

.phpbb .row-inner, .phpbb .panel-inner, .phpbb .post-inner {
	min-height: 12px;
}

.phpbb .row-wrap.row-top, .phpbb .row-wrap.row-bottom,
.phpbb .panel-wrap.row-top, .phpbb .panel-wrap.row-bottom,
.phpbb .post-wrap.row-top, .phpbb .post-wrap.row-bottom {
	display: block;
	height: 5px;
	position: relative;
	margin: 0 5px;
	background: transparent none 0 0 repeat-x;
	zoom: 1;
}
.phpbb .row-wrap.row-top span, .phpbb .row-wrap.row-bottom span,
.phpbb .panel-wrap.row-top span, .phpbb .panel-wrap.row-bottom span,
.phpbb .post-wrap.row-top span, .phpbb .post-wrap.row-bottom span {
	position: absolute;
	width: 5px;
	height: 5px;
	top: 0;
	bottom: 0;
	background: transparent none 0 0 no-repeat;
	zoom: 1;
}
.phpbb .row-top span.row-left, .phpbb .row-bottom span.row-left {
	left: -5px;
}
.phpbb .row-top span.row-right, .phpbb .row-bottom span.row-right {
	right: -5px;
}
.phpbb .row-wrap.row-top, .phpbb .row-wrap.row-top span,
.phpbb .panel-wrap.row-top, .phpbb .panel-wrap.row-top span,
.phpbb .post-wrap.row-top, .phpbb .post-wrap.row-top span { 
	background-position: 0 -9px; 
}

.phpbb .row-wrap.row-left, .phpbb .panel-wrap.row-left, .phpbb .post-wrap.row-left {
	padding-left: 5px;
	background: transparent none 0 0 repeat-y;
	zoom: 1;
}
.phpbb .row-wrap.row-right, .phpbb .panel-wrap.row-right, .phpbb .post-wrap.row-right {
	padding-right: 5px;
	background: transparent none 100% 0 repeat-y;
	zoom: 1;
}

/*
	Link to switch to mobile style
*/
.mobile-style-switch a {
	display: inline-block;
	padding: 5px 10px 6px;
	border: 1px solid #D8D8D8;
	border-radius: 5px;
	background: #F8F8F8;
	box-shadow: #fff 0 0 0 1px inset;
}

/*
	Zoom in image
*/
span.zoom-container {
	position: relative;
	display: inline-block;
	min-height: 34px;
}
span.zoom-image { 
	display: none; 
    -webkit-transition: opacity 0.25s ease;
    -moz-transition: opacity 0.25s ease;
    -o-transition: opacity 0.25s ease;
    -ms-transition: opacity 0.25s ease;
    transition: opacity 0.25s ease;
	opacity: 0.7;
}
img.zoom + span.zoom-image {
	display: block;
	position: absolute;
	top: 2px;
	left: 2px;
	width: 30px;
	height: 30px;
	background: url("{T_THEME_PATH}/images/zoom.png") 0 0 no-repeat;
	cursor: pointer;
}
.zoom-container:hover span.zoom-image { opacity: 1; }
img.zoom.zoomed-in + span.zoom-image { 
	background-position: 0 -30px;
	opacity: 0;
}
.zoom-container:hover img.zoom.zoomed-in + span.zoom-image { opacity: 0.7; }
/*
	Forms
*/

.phpbb input[type="text"], .phpbb input[type="password"], .phpbb input[type="email"], .phpbb textarea, .phpbb select, .phpbb input[type="submit"], .phpbb .button1, .phpbb .button2 {
	margin: 0;
	padding: 0;
	font-family: Verdana;
	font-size: 13px;
	line-height: 1.2em;
	outline-style: none;
	border: 1px solid transparent;
	background-position: 0 50%;
}
.phpbb textarea {
	line-height: 1.4em;
}
.phpbb input[type="text"], .phpbb input[type="password"], .phpbb input[type="email"], .phpbb textarea, .phpbb input[type="submit"], .phpbb .button1, .phpbb .button2 {
	-webkit-appearance: none;
}

.phpbb a.button1, .phpbb a.button2 {
	display: inline-block;
	text-decoration: none;
}
.phpbb .button2 {
	background-position: 100% 50%;
}

.phpbb input[type="text"], .phpbb input[type="password"], .phpbb input[type="email"], .phpbb textarea, .phpbb select {
	padding: 2px;
}
.phpbb.browser-mozilla input[type="text"], .phpbb.browser-mozilla input[type="password"], .phpbb.browser-mozilla input[type="email"] {
	padding: 1px 2px 2px;
}
.phpbb input[type="text"]:invalid, .phpbb input[type="password"]:invalid, .phpbb input[type="email"]:invalid, .phpbb textarea:invalid {
	box-shadow: none;
}

.phpbb input[type="submit"], .phpbb .button1, .phpbb .button2 {
	line-height: 1.4em;
	padding: 2px 8px 3px;
	cursor: pointer;
	border-width: 0;
	border-radius: 5px;
}
.ie7 .phpbb input[type="submit"], .ie7 .phpbb .button1, .ie7 .phpbb .button2 {
	padding-top: 0;
	padding-bottom: 1px;
	margin-top: 0;
}

.phpbb a.button1, .phpbb a.button2 {
	line-height: 1em;
	padding: 4px 10px 0;
	height: 19px;
}
.oldie .phpbb a.button1, .oldie .phpbb a.button2 {
	padding-top: 5px;
}
.ie7 .phpbb a.button1, .ie7 .phpbb a.button2 {
	padding-top: 4px;
	padding-bottom: 0;
}
.ie7 .phpbb .menu a.button1, .ie7 .phpbb .menu a.button2 {
	position: relative;
	top: 2px;
}

.phpbb input[type="checkbox"], .phpbb input[type="radio"] {
	margin-top: 0;
	margin-bottom: 0;
}

.phpbb select {
	max-width: 250px;
}
.ie7 .phpbb select {
	width: 250px;
}

.phpbb fieldset.submit-buttons {
	text-align: center;
	padding: 4px 0;
}
.phpbb #format-buttons .button2 {
	border-width: 1px;
	width: auto !important;
}
.ie7 .phpbb #format-buttons .button2 {
	padding: 0;
}

.phpbb #search_keywords {
	padding-left: 19px;
	background-position: 4px 50%;
	background-repeat: no-repeat;
}

.phpbb #edit_reason {
	width: 90%;
}

/*
	Big post buttons
*/
.phpbb .buttons a, .phpbb a.button {
	display: inline-block;
	position: relative;
	margin: 0;
	margin-left: 30px;
	padding: 4px 12px 0 0;
	vertical-align: top;
	height: 26px;
	font-family: Verdana;
	font-size: 12px;
	line-height: 20px;
	text-decoration: none;
	outline-style: none;
	background-position: 100% 0;
	background-repeat: no-repeat;
	max-width: 400px;
}
.phpbb.browser-webkit .buttons a, .phpbb.browser-webkit a.button {
	padding-top: 5px;
	height: 25px;
}

.phpbb .buttons a span, .phpbb a.button span {
	display: block;
	position: absolute;
	top: 0;
	bottom: 0;
	left: -30px;
	width: 30px;
	background-position: 0 -30px;
	background-repeat: no-repeat;
}
.ie7 .phpbb .topic-actions .buttons, .ie7 .phpbb .panel .buttons, .ie7 .phpbb .popup .buttons {
	position: relative;
	left: 30px;
}

.phpbb .buttons .reply-icon a span, .phpbb .buttons .pmreply-icon a span, .phpbb .buttons .locked-icon a span {
	background-position: -30px -30px;
}
.phpbb .buttons .newpm-icon a span {
	background-position: -60px -30px;
}
.phpbb .buttons .post-icon a span {
	background-position: -90px -30px;
}
.phpbb #qr_showeditor_div a span, .phpbb .jumpbox a.button span {
	background-position: -120px -30px;
}
.phpbb .buttons a.icon-login span {
	background-position: -150px -30px;
}
.phpbb .buttons a.icon-register span, .phpbb .buttons .forwardpm-icon a span {
	background-position: -180px -30px;
}

/*
	Menu forms
*/
.phpbb li.menu-form input.inputbox {
	width: 156px;
	border-radius: 6px;
}
.phpbb li.menu-form input.inputbox.search, .phpbb li.menu-form input.inputbox.login, .phpbb li.menu-form input.inputbox.password {
	padding-left: 20px;
	width: 172px;
	background-position: 4px 45%;
	background-repeat: no-repeat;
}
.phpbb li.menu-form input.inputbox.search {
	width: 140px;
}
.phpbb li.menu-form input.button-icon {
	width: 0;
	height: 0;
	padding: 24px 0 0 26px;
	overflow: hidden;
	font-size: 0;
	float: right;
	border-width: 0;
	border-radius: 0;
	background: transparent none 0 -60px no-repeat;
}
.ie7 .phpbb li.menu-form input.button-icon {
	width: 26px;
	height: 24px;
	padding-top: 0;
}
.phpbb li.menu-form label {
	display: block;
	font-size: 11px;
	max-width: 200px;
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
}
.ie7 .phpbb li.menu-form label {
	white-space: normal;
}
.phpbb li.menu-form .buttons {
	float: none;
	text-align: right;
}
/*
	Popups
*/
.phpbb .popup-trigger {
	position: relative;
}
.phpbb .top-links .popup-trigger {
	display: inline-block;
}
.phpbb .top-links .popup .popup-trigger {
	display: block;
}

.phpbb .popup {
	display: none;
	position: absolute;
	left: 0;
	top: 27px;
	z-index: 10;
	padding: 5px;
	margin: 0;
	border: 1px solid transparent;
	min-width: 150px;
	white-space: nowrap;
	text-align: left;
	font-size: 12px;
	line-height: 1.5em;
	font-family: Verdana;
}
.phpbb .popup-list {
	line-height: 1em;
	padding: 0;
}

.ie7 .phpbb .popup {
	top: 24px;
}
.phpbb .menu .popup {
	left: 4px;
}
.phpbb .top-links .popup {
	top: 28px;
}
.phpbb .header-login .popup {
	top: 18px;
	left: auto;
	right: 0;
}
.ie7 .phpbb .header-login .popup {
	top: 20px;
}
.phpbb .popup-list .popup {
	top: 0;
	left: 198px;
}
.phpbb .popup-up .popup {
	top: auto;
	bottom: 0;
}
.phpbb .right .popup {
	left: auto;
	right: 0;
}

.phpbb .popup-trigger:hover > .popup, .phpbb .popup.active {
	display: block;
}

.phpbb .popup p {
	padding: 3px 0;
	line-height: 1.3em;
	font-family: Helvetica, Arial;
	font-size: 13px;
}
.phpbb .popup p.title {
	font-size: 14px;
	padding: 5px 0;
	font-family: Verdana;
}
.phpbb .popup p.title:first-child, .phpbb .popup p:first-child { 
	padding-top: 0;
}
.phpbb .popup p:last-child { 
	padding-bottom: 0;
}

/*
	Login form
*/
.phpbb #phpbb-header-login dd {
	text-align: right;
}
.phpbb #phpbb-header-login p.right {
	padding-right: 4px;
	padding-bottom: 4px;
}

/*
	Links
*/
.phpbb .popup-list li {
	padding: 0;
}

.ie7 .phpbb .popup-list a {
	width: 100%;
}


.phpbb li.popup-link {
	border: 1px solid transparent;
	border-width: 0 1px;
	padding: 0;
	background: transparent none 0 0 repeat-x;
}
.phpbb li.popup-link:first-child {
	border-top-width: 1px;
}
.phpbb li.poup-link:last-child {
	border-bottom-width: 1px;
}
.phpbb .popup.popup-list li.popup-link:hover, .phpbb .show-levels li.level-root, .phpbb .popup-list li.row-new {
	background-position: 0 -27px !important;
}

.phpbb li.popup-link > a, .phpbb li.popup-link > span {
	display: block;
	line-height: 1em;
	padding: 7px 20px 0 8px;
	height: 20px;
	text-decoration: none !important;
	width: 172px;
	min-width: 172px;
	overflow: hidden;
	text-overflow: ellipsis;
}
.phpbb li.popup-link.popup-trigger > a {
	background: transparent none 100% 0 no-repeat;
}
.phpbb li.popup-link.popup-trigger:hover > a {
	background-position: 100% -60px;
}
.phpbb li.poup-link:last-child > a, .phpbb li.poup-link:last-child > span {
	height: 19px;
}

.phpbb .popup-list > ol {
	display: table-row;
}
.phpbb .popup-list > ol > li {
	display: table-cell;
	padding: 0;
}

/*
	Definition lists
*/
.phpbb .popup dl {
	clear: both;
	width: 254px;
	margin: 0;
	padding: 4px;
}
.phpbb .popup dt {
	float: left;
	width: 100px;
	margin: 0;
	padding: 3px 0 0;
}
.phpbb .popup dd {
	width: 150px;
	margin: 0;
	margin-left: 104px;
	padding: 0;
}
.ie7 .phpbb .popup dd {
	margin-left: 0;
}
.phpbb .popup dd input {
	width: 140px;
}
/*
	Colours, URLs
*/

.phpbb h2, .phpbb h3 {
	color: #1a4f90;
	text-shadow: 1px 1px 0 rgba(255, 255, 255, 0.2);
}

.phpbb hr {
	border-top-color: #d4d4d4;
}



/*
	Links
*/
.phpbb a, .phpbb a:visited { 
	color: #1a4f90;
}
.phpbb a:hover, .phpbb a:active {
	color: #bc2a2a;
}

/*
	Layout
*/
body.phpbb {
	background-color: #e2e2e2;
	background-image: url("{T_THEME_PATH}/images/layout_top.png");
}
body.simple {
	background: #f4f4f4;
}

.phpbb .logo h1 {
	color: rgba(255, 255, 255, 0.8);
	text-shadow: 1px 1px 0 rgba(26, 79, 144, 0.7);
}
.oldie .phpbb .logo h1 {
	color: #1a4f90;
}

.phpbb .body-wrapper {
	background-image: url("{T_THEME_PATH}/images/top400.png");
}

.phpbb .layout-outer {
	background-color: #f4f4f4;
	border-color: #e0e0e0;
	box-shadow: 0 0 2px rgba(0, 0, 0, 0.1);
}
.phpbb .forum-wrapper {
	border-color: #fafafa;
}
.phpbb .layout-wrapper > div, .phpbb table.layout-wrapper > tbody > tr > td {
	border-left-color: #fafafa;
	border-right-color: #e0e0e0;
}

.phpbb .footer {
	background-color: #2372bb;
	background-image: url("{T_THEME_PATH}/images/footer.png");
}
.phpbb .footer, .phpbb .footer a, .phpbb .footer a:visited {
	color: #d3e3f1;
}
.phpbb .footer a:hover {
	color: #fff;
}

.phpbb .footer .arty, .phpbb .footer .phpbb-group {
	background-image: url("{T_THEME_PATH}/images/copyrights.png");
}

.phpbb .header-login {
	background-image: url("{T_THEME_PATH}/images/headermenu.png");
	background-color: #2372bb;
	color: #89b3db;
}
.phpbb .header-login:hover {
	background-color: #b01414;
	color: #db8a8a;
}
.phpbb .header-login .popup {
	color: #000;
}

.phpbb a.header-menu.menu-login > span, .phpbb a.header-menu.menu-register > span {
	background-image: url("{T_THEME_PATH}/images/header_login.png");
}

/*
	Boxes
*/
.phpbb .topiclist > li.row-outer, .phpbb .panel-outer, .phpbb .post-outer {
	background-image: url("{T_THEME_PATH}/images/topwhite.png");
}

.phpbb .row-wrap.row-top, .phpbb .row-wrap.row-bottom,
.phpbb .panel-wrap.row-top, .phpbb .panel-wrap.row-bottom,
.phpbb .post-wrap.row-top, .phpbb .post-wrap.row-bottom {
	background-image: url("{T_THEME_PATH}/images/row_tb.png");
}
.phpbb .row-wrap span.row-left, .phpbb .panel-wrap span.row-left, .phpbb .post-wrap span.row-left {
	background-image: url("{T_THEME_PATH}/images/row_cl.png");
}
.phpbb .row-wrap span.row-right, .phpbb .panel-wrap span.row-right, .phpbb .post-wrap span.row-right {
	background-image: url("{T_THEME_PATH}/images/row_cr.png");
}
.phpbb .row-wrap.row-left, .phpbb .panel-wrap.row-left, .phpbb .post-wrap.row-left {
	background-image: url("{T_THEME_PATH}/images/row_l.png");
}
.phpbb .row-wrap.row-right, .phpbb .panel-wrap.row-right, .phpbb .post-wrap.row-right {
	background-image: url("{T_THEME_PATH}/images/row_r.png");
}

/*
	Menu
*/

.phpbb .time {
	color: rgba(0, 0, 0, 0.5);
	text-shadow: 1px 1px 0 rgba(255, 255, 255, 0.5);
}
.oldie .phpbb .time {
	color: #808080;
}

.phpbb .menu li.menu-item, .phpbb .menu li.menu-section {
	background-image: url("{T_THEME_PATH}/images/menu_left.png");
}
.phpbb .menu li.menu-item a, .phpbb .menu li.menu-section a, .phpbb .menu li.menu-section p,
.phpbb li.menu-form input.button-icon {
	background-image: url("{T_THEME_PATH}/images/menu_right.png");
}

.phpbb .menu li.menu-item {
	background-color: #ccc;
}
.phpbb .menu li.menu-item:hover {
	background-color: #2372bb;
}
.phpbb .menu li.menu-item.active {
	background-color: #b01414;
}
.phpbb .menu li.menu-section, .phpbb li.menu-form input.button-icon {
	background-color: #2372bb;
}
.phpbb .menu li.menu-section:hover, .phpbb li.menu-form input.button-icon:hover {
	background-color: #b01414;
}

.phpbb .menu li.menu-item a {
	color: #1a4f90;
}
.phpbb .menu li.menu-item:hover a {
	color: #2372bb;
}
.phpbb .menu li.menu-item.active a {
	color: #bc2a2a;
}

.phpbb .menu li.menu-section p, .phpbb .menu li.menu-section a {
	color: #fff !important;
	text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.3);
}

.phpbb li.menu-form input.inputbox.search {
	background-image: url("{T_THEME_PATH}/images/input_search.png");
}
.phpbb li.menu-form input.inputbox.login {
	background-image: url("{T_THEME_PATH}/images/input_user.png");
}
.phpbb li.menu-form input.inputbox.password {
	background-image: url("{T_THEME_PATH}/images/input_pass.png");
}

/*
	Navbar
*/
.phpbb .navbar, .phpbb .linkmcp {
	border-color: #d4d4d4;
	background-color: #f8f8f8;
	background-image: url("{T_THEME_PATH}/images/white50.png");
	color: #aaa;
}

/*
	Header menu
*/
.phpbb .top-links .top-link, .phpbb .top-links .top-link > span {
	background-image: url("{T_THEME_PATH}/images/topmenu.png");
}
.phpbb .top-links .top-link {
	background-color: #2372bb;
	color: #fff !important;
}
.phpbb .top-links .top-link:hover, .phpbb .top-links .popup-trigger:hover .top-link {
	background-color: #b01414;
}

/*
	Popups
*/
.phpbb .popup {
	background-color: #f8f8f8;
	border-color: #e0e0e0;
	box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
	-webkit-box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
}
.phpbb .popup-list {
	background-color: rgba(248, 248, 248, 0.9);
}
.oldie .phpbb .popup-list {
	background-color: #f8f8f8;
}

.phpbb .popup.popup-list li.popup-link {
	border-color: #fbfbfb;
	border-right-color: #e0e0e0;
	background-image: url("{T_THEME_PATH}/images/popup_link.png");
	background-color: #f4f4f4;
}
.phpbb .popup-list > ul > li.popup-link, .phpbb li:last-child > ul > li.popup-link {
	border-right-color: #fbfbfb;
}
.phpbb .popup.popup-list li.popup-link:hover {
	background-color: #f8f8f8;
}
.phpbb .popup-link > a {
	color: #1a4f90;
}

.phpbb .popup.popup-list li.popup-link:hover, .phpbb .popup.popup-list .show-levels li.level-root {
	background-color: #2372bb;
	border-color: #4f8ec9;
	border-right-color: #1f66a8;
}
.phpbb .popup.popup-list .show-levels li.level-root:hover, .phpbb .popup.popup-list ul li.row-new, .phpbb .popup.popup-list ul li.row-new:hover {
	background-color: #b01414;
	border-color: #c04343;
	border-right-color: #9e1212;
}
.phpbb .popup-link:hover > a, .phpbb .show-levels li.level-root > a, .phpbb .popup-list li.row-new > a {
	color: #fff !important;
}

.phpbb li.popup-link.popup-trigger > a {
	background-image: url("{T_THEME_PATH}/images/popup_arrows.png");
}

.phpbb .popup p {
	color: #808080;
}
.phpbb .popup p.title {
	color: #1a4f90;
}
.phpbb .popup p.title:first-child {
	color: #bc2a2a;
}

/*
	Forms
*/
.phpbb input[type="text"], .phpbb input[type="password"], .phpbb input[type="email"], .phpbb textarea, .phpbb select {
	color: #808080;
	background-color: #fff;
	border-color: #d4d4d4;
}
.phpbb input[type="text"]:hover, .phpbb input[type="password"]:hover, .phpbb input[type="email"]:hover, .phpbb textarea:hover, .phpbb select:hover {
	color: #000;
	border-color: #a2b1bc;
}
.phpbb input[type="text"]:focus, .phpbb input[type="password"]:focus, .phpbb input[type="email"]:focus, .phpbb textarea:focus, .phpbb select:focus {
	color: #000;
	border-color: #d28484;
}
.phpbb input[type="text"]:invalid, .phpbb input[type="password"]:invalid, .phpbb input[type="email"]:invalid, .phpbb textarea:invalid {
	color: #d28484;
}
.phpbb input[type="submit"], .phpbb .button1, .phpbb .button2 {
	color: #fff !important;
	background-color: #2372bb;
	background-image: url("{T_THEME_PATH}/images/buttons_bg.png");
	border-color: #2372bb;
	text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.25);
}
.phpbb input[type="submit"]:hover, .phpbb .button1:hover, .phpbb .button2:hover, .phpbb .top-links a.top-link:hover, .phpbb .top-links .popup-trigger:hover a.top-link {
	background-color: #b01414;
	border-color: #b01414;
}
.phpbb #search_keywords {
	background-image: url("{T_THEME_PATH}/images/search.png");
	color: #a8a8a8;
}
.phpbb #search_keywords:hover, .phpbb #search_keywords:focus {
	color: #000;
}

.phpbb p.error, .phpbb dd.error {
	background-color: #b01414;
}
.phpbb p.error, .phpbb p.error a, .phpbb dd.error, .phpbb dd.error a {
	color: #fff !important;
}


/*
	Buttons
*/
.phpbb #format-buttons .button2 {
	background-color: #f8f8f8;
	background-image: url("{T_THEME_PATH}/images/white10.png");
	color: #808080 !important;
	border-color: #d4d4d4;
	text-shadow: 1px 1px 0 rgba(255, 255, 255, 0.2);
}
.phpbb #format-buttons .button2:hover {
	background-color: #2372bb;
	border-color: #2372bb;
	color: #fff !important;
	text-shadow: none;
}

.phpbb .buttons a, .phpbb a.button, .phpbb .buttons a span, .phpbb a.button span {
	background-image: url("{T_THEME_PATH}/images/buttons.png");
	background-color: #2372bb;
	color: #fff !important;
}
.phpbb .buttons a:hover, .phpbb a.button:hover, .phpbb .buttons a:hover span, .phpbb a.button:hover span {
	background-color: #b01414;
}

/*
	Forums list
*/
.phpbb .topiclist .header, .oldie .phpbb .topiclist .header, .phpbb h2.header-outer, .phpbb table.table1 th {
	background-color: #2372bb;
	border-color: #2372bb;
}
.phpbb .topiclist .header.inactive {
	background-color: #808080;
	border-color: #808080;
}
.phpbb .topiclist .header.inactive.unread, .phpbb .topiclist .header:hover, .oldie .phpbb .topiclist .header:hover, .phpbb h2.header-outer:hover, .phpbb table.table1 th:hover {
	background-color: #b01414;
	border-color: #b01414;
}
.phpbb .topiclist .header {
	background-image: url("{T_THEME_PATH}/images/topwhite30.png"), url("{T_THEME_PATH}/images/cat_left.png");
}
.oldie .phpbb .topiclist .header, .phpbb h2.header-outer .header-left {
	background-image: url("{T_THEME_PATH}/images/cat_left.png");
}
.phpbb .topiclist .header dl, .phpbb h2.header-outer .header-right {
	background-image: url("{T_THEME_PATH}/images/cat_right.png");
}
.phpbb .topiclist .header dt, .phpbb h2.header-outer .header-inner {
	background-image: url("{T_THEME_PATH}/images/cat_bg.png");
}
.phpbb table.table1 th {
	background-image: url("{T_THEME_PATH}/images/white20.png");
}
.phpbb h2.header.header-outer {
	background-image: url("{T_THEME_PATH}/images/topwhite30.png");
}
.phpbb .topiclist .header, .phpbb .topiclist .header a, .phpbb .topiclist .header a:visited, .phpbb h2.header-outer, .phpbb h2.header-outer a, .phpbb h2.header-outer a:visited,
.phpbb table.table1 th, .phpbb table.table1 th a, .phpbb table.table1 th a:visited,
.phpbb a.header-menu, .phpbb a.header-menu:visited, .phpbb a.header-menu:hover {
	color: #fff;
	text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.2);
}
.oldie .phpbb .topiclist .header, .oldie .phpbb .topiclist .header a, .oldie .phpbb .topiclist .header a:visited, .oldie .phpbb h2.header-outer, .oldie .phpbb h2.header-outer a,
.phpbb .topiclist .header a:hover, .phpbb h2.header-outer a:hover, .oldie .phpbb table.table1 th, .oldie .phpbb table.table1 th a, .oldie .phpbb table.table1 th a:visited .phpbb table.table1 th a:hover {
	color: #fff;
}

.phpbb .expandable .header:after, .phpbb .menu li.expandable:after {
	background-image: url("{T_THEME_PATH}/images/cat_expand.png");
}

.phpbb .topiclist > li {
	background-color: #f8f8f8;
	border-color: #d4d4d4;
}
.phpbb .topiclist > li.row2 {
	background-color: #fafafa;
}
.phpbb .topiclist > li.reported {
	background-color: #f8f4f4;
	background-image: none;
}
.phpbb .topiclist > li:hover {
	background-color: #fcfcfc;
}
.phpbb .topiclist > li.row2:hover {
	background-color: #fdfdfd;
}
.phpbb .topiclist > li.reported:hover {
	background-color: #f4e9e9;
}
.phpbb .topiclist dd {
	border-color: #e8e8e8;
	color: #444;
}
.phpbb .topiclist .reported dd {
	border-color: #e7c7c7;
}
.phpbb .topiclist .topics dfn, .phpbb .topiclist .posts dfn, .phpbb .topiclist .views dfn, .phpbb .topiclist .lastpost dfn, .phpbb .topiclist .by, .phpbb .topiclist .bull {
	color: #999;
}

.phpbb a.topictitle, .phpbb a.forumtitle {
	color: #1a4f90;
}
.phpbb .unread a.topictitle, .phpbb .unread a.forumtitle, .phpbb a.topictitle:hover, .phpbb a.forumtitle:hover, .phpbb a.subforum.unread {
	color: #bc2a2a;
}

.phpbb .topiclist .icon dt {
	color: #808080;
}
.phpbb .topiclist .header dt {
	color: #fff;
}

.phpbb p.subforums strong, .phpbb p.moderators strong {
	color: #808080;
}

/*
	Blocks
*/
.phpbb .panel, .phpbb .post, .phpbb table.table1 td, .phpbb .cp-mini {
	background-color: #f8f8f8;
	border-color: #d8d8d8;
}
.phpbb .panel.stats .inner {
	background-image: url("{T_THEME_PATH}/images/stats.png");
}

.phpbb div.rules, .phpbb .postbody .rules {
	background-image: url("{T_THEME_PATH}/images/topwhite30.png");
	background-color: #f6e7e7;
	border-color: #eadada;
}
.phpbb div.rules:hover, .phpbb .postbody .rules:hover {
	border-color: #e4c6c6;
}
.phpbb .rules .panel-inner {
	border-color: #f9f2f2;
}
.phpbb div.rules span+strong {
	color: #bc2a2a;
}

.phpbb .panel-wrapper {
	background-color: transparent;
	background-image: none;
}


/*
	Arrows
*/
.phpbb a.subforum {
	background-image: url("{IMG_ICON_POST_TARGET_SRC}");
}
.phpbb a.subforum.unread {
	background-image: url("{IMG_ICON_POST_TARGET_UNREAD_SRC}");
}
.phpbb a.left {
	background-image: url("{T_THEME_PATH}/images/arrow_left.png");
}
.phpbb a.right {
	background-image: url("{T_THEME_PATH}/images/arrow_right.png");
}
.phpbb a.up {
	background-image: url("{T_THEME_PATH}/images/arrow_up.png");
}
.phpbb a.down {
	background-image: url("{T_THEME_PATH}/images/arrow_down.png");
}

.phpbb .post .back2top a {
	background-image: url("{IMG_ICON_BACK_TOP_SRC}");
}

/*
	Pagination
*/
.phpbb .pagination span {
	color: #999;
}
.phpbb .pagination span a, .phpbb .pagination span strong {
	background-color: #2372bb;
	color: #fff;
	background-image: url("{T_THEME_PATH}/images/pagination.png");
}
.phpbb .pagination span strong, .phpbb .pagination span a:hover {
	background-color: #b01414;
}

/*
	Poll
*/
.phpbb .polls dl {
	border-color: #e0e0e0;
}
.phpbb .polls dd.resultbar > div {
	color: #fff;
	background-color: #2372bb;
	background-image: url("{T_THEME_PATH}/images/poll.png");
}
.phpbb .polls .voted dd.resultbar > div {
	background-color: #b01414;
}

/*
	Post
*/
.phpbb .poster-rank {
	color: #888;
}
.phpbb .postprofile dd strong, .phpbb .postprofile li > strong, .phpbb .postbody .author {
	font-weight: normal;
	color: #606060;
}
.phpbb .profile .poster-avatar.empty span {
	background-image: url("{T_THEME_PATH}/images/avatar.png");
}
.phpbb .online .poster-avatar {
	background-image: url("{T_THEME_PATH}/images/online.png");
}
.phpbb .post-content-wrap > .postbody {
	border-color: #e8e8e8;
}

.phpbb .profile-icons a {
	background-image: url("{T_THEME_PATH}/images/buttons_post.png");
	background-color: #2372bb;
}
.phpbb .profile-icons a:hover {
	background-color: #b01414;
}

.phpbb .signature {
	color: #444;
	border-color: #e8e8e8;
}
.phpbb .postbody .notice {
	background-color: #f6e7e7;
	border-color: #eadada;
}

.phpbb .posthilit {
	background-color: #e3e37f;
}

/*
	BBCode
*/
.phpbb blockquote, .phpbb blockquote cite, .phpbb .attachbox, .phpbb .attachbox dt, .phpbb .codebox, .phpbb .codebox dt, .phpbb .inline-attachment {
	border-color: #e0e0e0;
}
.phpbb blockquote, .phpbb .attachbox, .phpbb .codebox, .phpbb .inline-attachment {
	background-color: #f4f4f4;
}
.phpbb blockquote blockquote, .phpbb blockquote .attachbox, .phpbb blockquote .codebox {
	background-color: #f8f8f8;
}
.phpbb blockquote, .phpbb .attachbox dt, .phpbb .codebox dt {
	color: #606060;
}
.phpbb blockquote cite {
	color: #000;
}

/*
	Tabs
*/
.phpbb #tabs li a, .phpbb #minitabs li a {
	background-color: #f8f8f8;
	border-color: #d8d8d8;
}
.phpbb #tabs li a:hover, .phpbb #minitabs li a:hover {
	background-color: #2372bb;
	border-color: #2372bb;
	color: #fff;
}
.phpbb #tabs li.activetab a, .phpbb #tabs #active-subsection a, .phpbb #minitabs li.activetab a {
	background-color: #2372bb;
	border-color: #2372bb;
	background-image: url("{T_THEME_PATH}/images/buttons_bg.png");
	color: #fff;
}
.phpbb #tabs li.activetab a:hover, .phpbb #tabs #active-subsection a:hover, .phpbb #minitabs li.activetab a:hover {
	background-color: #b01414;
	border-color: #b01414;
	color: #fff;
}

/*
	Control panel
*/
.phpbb .cp-content {
	border-color: #d8d8d8;
}

.phpbb .pm_marked_colour, .phpbb .topiclist > li.pm_marked_colour > dl dt {
	border-color: #982aaf;
}
.phpbb .pm_replied_colour, .phpbb .topiclist > li.pm_replied_colour > dl dt {
	border-color: #2372bb;
}
.phpbb .pm_friend_colour, .phpbb .topiclist > li.pm_friend_colour > dl dt {
	border-color: #2aaf30;
}
.phpbb .pm_foe_colour, .phpbb .topiclist > li.pm_foe_colour > dl dt {
	border-color: #b01414;
}

.phpbb dl.details dt {
	color: #808080;
}
 
/*
	Avatars gallery
*/
.phpbb #gallery label:hover {
	border-color: #d4d4d4;
	background-color: #fafafa;
}

/*
	RSS feed
*/
.phpbb a.feed-icon-forum {
	background-image: url("{T_THEME_PATH}/images/rss.png");
}
";s:10:"theme_path";s:10:"art_helion";s:10:"theme_name";s:15:"Artodia: Helion";s:11:"theme_mtime";s:10:"1401976189";s:11:"imageset_id";s:1:"4";s:13:"imageset_name";s:15:"Artodia: Helion";s:18:"imageset_copyright";s:18:"&copy; Artodia.com";s:13:"imageset_path";s:10:"art_helion";s:13:"template_path";s:10:"art_helion";}}