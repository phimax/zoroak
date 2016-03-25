/*
	Check IE
*/
(function()
{
	if(navigator && navigator.appVersion)
	{
		var v = navigator.appVersion,
			pos = v.indexOf('MSIE ');
		if(pos)
		{
			v = v.substr(pos + 5);
			var list = v.split('.', 2);
			if(list.length == 2)
			{
				v = parseInt(list[0]);
				if(v)
				{
					phpBB.ie = v;
				}
			}
		}
	}
})();

$(document).ready(function()
{
	$('.phpbb').addClass('js');

	/*
		Test browser capabilities
	*/
	var rootElement = $('.phpbb');
	if(phpBB.ie) rootElement.addClass('ie' + phpBB.ie);
	rootElement.addClass(phpBB.ie && phpBB.ie < 8 ? 'no-tables' : 'display-table');
	rootElement.addClass(phpBB.ie && phpBB.ie < 9 ? 'no-rgba' : 'has-rgba');
	if(!phpBB.ie)
	{
		var browser = (navigator.userAgent) ? navigator.userAgent : '';
		if(browser.indexOf('Opera') >= 0)
		{
			rootElement.addClass('browser-opera');
		}
		else if(browser.indexOf('WebKit') > 0)
		{
			rootElement.addClass('browser-webkit');
		}
		else if(browser.indexOf('Gecko') > 0)
		{
			rootElement.addClass('browser-mozilla');
		}
	}
	
	/*
		IE7 stuff
	*/
	if(phpBB.ie && phpBB.ie < 8)
	{
		$('div.layout-wrapper').each(function(i)
		{
			$(this).children().each(function(j)
			{
				$(this).wrapInner('<td class="' + $(this).attr('class') + ((j == 0) ? ' first' : '') + '" />').children().unwrap();
			});
			$(this).wrapInner('<table class="layout-wrapper" cellspacing="0" cellpadding="0"><tbody><tr></tr></tbody></table>').children().unwrap();
		});
	}
	$('.phpbb .layout-wrapper > div:last, .phpbb .layout-wrapper > tbody > tr > td:last').css('border-right-width', 0);
	
	/*
		Navigation
	*/
	$('p.autologin').each(function()
	{
		$(this).attr('title', $(this).text());
	});

	/*
		Jump box
	*/
	function setupJumpBox()
	{
		var data = $('#jumpbox-data option'),
			list = [],
			levels = {},
			lastLevel = -1;
		if(!data.length || data.length != phpBB.jumpBoxData.length)
		{
			$('#jumpbox-data').remove();
			return false;
		}
		for(var i=0; i<phpBB.jumpBoxData.length; i++)
		if(phpBB.jumpBoxData[i].id >= 0)
		{
			var level = phpBB.jumpBoxData[i].level.length;
			phpBB.jumpBoxData[i].level = level;
			phpBB.jumpBoxData[i].name = $.trim(data.eq(i).text());
			if(!phpBB.jumpBoxData[i].selected) phpBB.jumpBoxData[i].selected = false;
			// find parent item
			levels[level] = list.length;
			lastLevel = level;
			phpBB.jumpBoxData[i].prev = (level > 0) ? levels[level - 1] : -1;
			list.push(phpBB.jumpBoxData[i]);
		}
		phpBB.jumpBoxData = list;
		$('#jumpbox-data').remove();
		return (list.length > 0);
	}
	if(typeof(phpBB.jumpBoxAction) != 'undefined')
	{
		if(setupJumpBox())
		{
			// setup full jumpbox
			var text = phpBB.jumpBoxText(phpBB.jumpBoxData);
			$('.phpbb .nav-jumpbox').each(function()
			{
				$(this).addClass('popup-trigger').append('<div class="popup popup-list">' + text + '</div>');
			});
			$('#jumpbox:has(select):not(#cp-main #jumpbox)').each(function()
			{
				var select = $('select', this).get(0),
					val = (select && select.options.length) ? ((select.selectedIndex > 1) ? select.options[select.selectedIndex].value : select.options[0].value) : '',
					title = (select && select.options.length) ? ((select.selectedIndex > 1) ? select.options[select.selectedIndex].text : select.options[0].text) : '';
				if(val)
				{
					for(var i=0; i<phpBB.jumpBoxData.length; i++)
					{
						if(phpBB.jumpBoxData[i].id > 0 && phpBB.jumpBoxData[i].id == val)
						{
							title = phpBB.jumpBoxData[i].name;
						}
					}
				}
				if(title.length)
				{
					$('input[type="submit"]', this).remove();
					$('select', this).replaceWith('<div class="jumpbox popup-trigger popup-up right"><a class="button" href="javascript:void(0);"><span></span>' + title + '</a><div class="popup popup-list">' + text + '</div></div>');
					$(this).addClass('jumpbox-js');
				}
			});
			$('.phpbb .nav-forum').each(function()
			{
				function checkLink(link, id)
				{
					// split link
					link += ' ';
					var list = link.split(id),
						total = list.length - 1;
					for(var i=0; i<total; i++)
					if(list[i].length > 0 && list[i + 1].length > 0)
					{
						// check if previous and next characters are numbers
						var char1 = list[i].charCodeAt(list[i].length - 1),
							char2 = list[i + 1].charCodeAt(0);
						if((char1 < 48 || char1 > 57) && (char2 < 48 || char2 > 57)) return true;
					}
					return false;
				}
				
				function findItems(num, showNested)
				{
					var item = phpBB.jumpBoxData[num],
						current = false,
						list = [];
					for(var i=item.prev + 1; i<phpBB.jumpBoxData.length; i++)
					{
						var item2 = phpBB.jumpBoxData[i];
						if(item2.level < item.level)
						{
							// another category
							return list;
						}
						if(item2.level == item.level)
						{
							if(item2.prev != item.prev)
							{
								// belongs to another category
								return list;
							}
							current = (i == num);
							if(current != item2.selected)
							{
								var item2 = $.extend({}, item2, true);
								item2.selected = current;
							}
							list.push(item2);
						}
						else if(showNested && current)
						{
							if(item2.selected)
							{
								var item2 = $.extend({}, item2, true);
								item2.selected = false;
							}
							list.push(item2);
						}
					}
					return list;
				}
				
				var title = $.trim($(this).text()),
					found = [];
				// find all entries with same name
				for(var i=0; i<phpBB.jumpBoxData.length; i++)
				{
					if(phpBB.jumpBoxData[i].name == title)
					{
						found.push(i);
					}
				}
				if(!found.length) return;
				var num = found[0];
				if(found.length > 1)
				{
					var found2 = [],
						link = $('a', this).attr('href');
					// find all entries with same link
					for(var i=0; i<found.length; i++)
					{
						if(checkLink(link, phpBB.jumpBoxData[found[i]].id))
						{
							found2.push(found[i]);
						}
					}
					if(!found2.length) return;
					num = found2[0];
				}
				// found 1 or more items. get items in same category + nested items
				var list = findItems(num, !$(this).hasClass('hide-nested'));
				if(list.length < 2) return;
				// create popup
				var text = phpBB.jumpBoxText(list, phpBB.jumpBoxData[num].level);
				$('a.text', this).addClass('text-popup');
				$(this).addClass('popup-trigger').append('<div class="popup popup-list">' + text + '</div>');
			});
		}
	}
	
	/*
		Headers
	*/
	$('.phpbb .page-content > h2, .phpbb #cp-main > h2').addClass('header');
	$('.phpbb h2.header').not('.header-outer, .not-header').addClass('header-outer').wrapInner('<div class="header-left"><div class="header-right"><div class="header-inner"></div></div></div>');

	/*
		Tables
	*/
	$('.phpbb table.table1').attr('cellspacing', '1');
	
	/*
		Inner blocks
	*/
	$('.phpbb div.navbar').not('.panel').addClass('panel').wrapInner('<div class="inner"></div>');
	$('.phpbb ul.navbar').wrap('<div class="panel navbar"><div class="inner"></div></div>');
	
	$('.phpbb .post > div').not('.post-outer > div, .post-wrap').addClass('post-content-wrap');
	$('.phpbb .panel > div').not('.panel-outer > div').addClass('inner');
	
	$('.phpbb div.panel div.post, .phpbb div.panel ul.topiclist, .phpbb div.panel table.table1, .phpbb div.panel dl.panel').parents('.phpbb div.panel').not('.phpbb #confirm .panel').addClass('panel-wrapper').find('.inner:first').addClass('inner-first');
	$('.phpbb #confirm .panel .panel').removeClass('panel');
	$('.phpbb #cp-main .panel').each(function()
	{
		var inner = $(this).find('.inner:first');
		if(!inner.length) return;
		if(inner.children().length < 2)
		{
			$(this).hide();
		}
	});

	$('.phpbb .topiclist > li.row').not('.row-outer').addClass('row-outer').wrapInner('<div class="row-wrap row-left"><div class="row-wrap row-right"><div class="row-inner"></div></div></div>').find('.row-wrap.row-left').before('<div class="row-wrap row-top"><span class="row-left"></span><span class="row-right"></span></div>').after('<div class="row-wrap row-bottom"><span class="row-left"></span><span class="row-right"></span></div>');
	
	$('.phpbb .panel, .phpbb .rules, .phpbb .cp-mini').not('.panel-outer, .rules').addClass('panel-outer').wrapInner('<div class="panel-wrap row-left"><div class="panel-wrap row-right"><div class="panel-inner"></div></div></div>').find('.panel-wrap.row-left').before('<div class="panel-wrap row-top"><span class="row-left"></span><span class="row-right"></span></div>').after('<div class="panel-wrap row-bottom"><span class="row-left"></span><span class="row-right"></span></div>');

	$('.phpbb .post').not('.post-outer').addClass('post-outer').wrapInner('<div class="post-wrap row-left"><div class="post-wrap row-right"><div class="row-inner"></div></div></div>').find('.post-wrap.row-left').before('<div class="post-wrap row-top"><span class="row-left"></span><span class="row-right"></span></div>').after('<div class="post-wrap row-bottom"><span class="row-left"></span><span class="row-right"></span></div>');
	
	/*
		Toggle forums
	*/
	phpBB.hiddenForums = phpBB.getCookie('hidden');
	if(phpBB.hiddenForums == null)
	{
		phpBB.hiddenForums = [];
	}
	else
	{
		phpBB.hiddenForums = phpBB.hiddenForums.split(',');
	}
	$('.phpbb ul.topiclist.forums').each(function(i)
	{
		var id = $(this).data('id');
		if(!id) return;
		$(this).attr('id', 'phpbb-cat-' + id);
		if($('li.row.unread', this).length > 0)
		{
			$('.header', $(this).prev()).addClass('unread');
		}
		$(this).prev().click(function() {
			if($(this).hasClass('over-link')) return;
			var hidden = $('.header', this).hasClass('inactive');
			phpBB.setHiddenForum($(this).next().data('id'), !hidden);
			$(this).next().slideToggle(150);
			$('.header', this).toggleClass('inactive');
		}).addClass('expandable').find('a').hover(function() {
			$(this).parents('ul').toggleClass('over-link');
		});
	});
	for(var i=0; i<phpBB.hiddenForums.length; i++)
	{
		$('#phpbb-cat-' + phpBB.hiddenForums[i]).each(function()
		{
			$(this).slideToggle(0);
			$('.header', $(this).prev()).addClass('inactive');
		});
	}

	/*
		Expand menu
	*/
	$('.phpbb .menu > li.expandable').click(function()
	{
		$(this).toggleClass('collapsed').parent().next().slideToggle(150);
	});
	
	/*
		Popups
	*/
	$('.phpbb .popup input, .phpbb .popup select').focus(function() { $(this).parents('.popup').addClass('active'); }).blur(function() { $(this).parents('.popup').removeClass('active'); });
	$('.phpbb .popup-list > ul > li, .phpbb .popup-list > ol > li > ul > li').addClass('popup-link');

	/*
		Inputs
	*/
	$('.phpbb input[type="text"], .phpbb input[type="password"], .phpbb input[type="email"], .phpbb textarea').change(function() { $(this).toggleClass('not-empty', $(this).val().length > 0); }).each(function()
	{
		$(this).toggleClass('not-empty', $(this).val().length > 0);
	});

	/*
		Forgot password link
	*/
	var item = $('#phpbb-sendpass');
	if(item.length)
	{
		var itemLink = item.find('.data-register').text(),
			itemText = item.find('.data-forgot').text();
		if(itemLink.indexOf('mode=register'))
		{
			item.html('<a class="button2" href="' + itemLink.replace(/mode=register/, 'mode=sendpassword') + '">' + itemText + '</a>').css('display', '');
		}
	}

	/*
		Content size
	*/
	if($('.phpbb .forum-wrapper').length)
	{
		phpBB.lastWidth = 0;
		phpBB.lastHeight = 0;
		phpBB.resizeContent();
		$(window).on('resize load', function() { phpBB.resizeContent(); });
	}
	
	/*
		Links in posts
	*/
	$('a.postlink').each(function() {
		var $this = $(this);
		
		if ($this.children().length)
		{
			return;
		}
		
		var html = $this.html();
		if (html.length > 50 && html.indexOf('://') > 0 && html.indexOf(' ') < 0)
		{
			$this.html(html.substr(0, 39) + ' ... ' + html.substr(-10));
		}
	});

	/*
		Resize big images
	*/
	function imageClicked(event)
	{
		var $this = $(this);
		if ($this.hasClass('zoomed-in'))
		{
			$this.removeClass('zoomed-in').css('max-width', $(this).attr('data-max-width') + 'px');
		}
		else
		{
			$this.addClass('zoomed-in').css('max-width', '100%');
		}
	}
	function zoomClicked(event)
	{
		imageClicked.apply($(this).prev().get(0), arguments);
		event.stopPropagation();
	}
	function resizeImage(width)
	{
		var $this = $(this);
		$this.wrap('<span class="zoom-container" />').attr('data-max-width', width).css({
			'max-width': width + 'px',
			cursor: 'pointer'
			}).addClass('zoom').click(imageClicked).after('<span class="zoom-image" />').next().click(zoomClicked);
	}
	function checkImage()
	{
		var maxWidth = 639;
		if (this.width > maxWidth)
		{
			resizeImage.call(this, maxWidth);
		}
	}
	$('.postbody img').each(function() {
		var $this = $(this);
		if ($this.closest('a').length)
		{
			return;
		}
		if (this.complete)
		{
			checkImage.call(this);
		}
		else
		{
			$this.load(checkImage);
		}
	});

});

/*
	Resize window
*/
phpBB.resizeContent = function()
{
	var content = $('.phpbb .forum-wrapper'),
		h = content.height(),
		pageHeight = $('.phpbb').height();
	if(!pageHeight)
	{
		return;
	}
	var diff = pageHeight - h;
	h = Math.max(400, Math.floor($(window).height() - diff));
	if(h != phpBB.lastHeight)
	{
		if(phpBB.lastHeight == h) return;
		phpBB.lastHeight = h;
		$('.phpbb .forum-wrapper').css('min-height', h + 'px');
	}
	// Resize posts
	if(phpBB.ie && phpBB.ie < 8) return;
	var width = content.width();
	if(width != phpBB.lastWidth)
	{
		phpBB.lastWidth = width;
		var diff = $('.phpbb .layout-wrapper').width() - $('.phpbb .layout-wrapper > .layout-middle').width();
		if(diff > 0)
		{
			diff = Math.floor(width - diff);
			$('.phpbb .layout-middle > div').css('max-width', diff + 'px');
		}
	}
};

/*
	Jump box data
*/
phpBB.jumpBoxText = function(list)
{
	var levelDiff = (arguments.length > 1) ? arguments[1] : 0,
		text = '<ul>',
		count = 0,
		maxLevel = 0,
		lastLevel = -1,
		rows = false,
		noHighlight = false,
		limit = (phpBB.ie && phpBB.ie < 8) ? 0 : (list.length > 30 ? 25 : list.length);
	for(var i=0; i<list.length; i++)
	{
		if(limit > 0 && count >= limit)
		{
			if(!rows)
			{
				text = '<ol><li>' + text;
				rows = true;
			}
			text += '</ul></li><li><ul>';
			count = 0;
		}
		count ++;
		var diff = list[i].level - levelDiff;
		if(diff > 4) diff = 4;
		text += '<li class="popup-link nowrap level-' + diff;
		if(diff == 0)
		{
			if(lastLevel != 0) text += ' level-root';
			else noHighlight = true;
		}
		lastLevel = diff;
		if(list[i].selected) text += ' row-new';
		if(list[i].name.length > 40) text += ' long';
		text += '">';
		if(list[i].url)
		{
			text += '<a href="' + list[i].url + '">';
		}
		else
		{
			text += '<a href="javascript:void(0);" onclick="phpBB.jumpBox(' + list[i].id + '); return false;">';
		}
		if(diff > 0)
		{
			maxLevel = Math.max(maxLevel, diff);
			text += '<span class="level">';
			for(var j=0; j<diff; j++) text += '- ';
			text += '</span> ';
		}
		text += list[i].name;
		text += '</a></li>';
	}
	if(rows)
	{
		for(var i=count; i<limit; i++)
		{
			text += '<li class="popup-link empty"></li>';
		}
	}
	text += '</ul>' + (rows ? '</li></ol>' : '');
	if(!noHighlight && maxLevel > 0)
	{
		// highlight root categories
		var tag = (list.length > limit) ? 'ol' : 'ul';
		text = text.replace('<' + tag + '>', '<' + tag + ' class="show-levels">');
	}
	return text;
};

phpBB.jumpBox = function(id)
{
	var d = new Date(),
		itemId = 'form-' + d.getTime();
	$('body').after('<div id="' + itemId + '" style="display: none;"><form action="' + phpBB.jumpBoxAction + '" method="post"><input type="hidden" name="f" value="' + id + '" /></form></div>');
	$('#' + itemId + ' form').get(0).submit();
};

phpBB.setCookie = function(name, value) 
{
	var argv = arguments;
	var argc = arguments.length;
	var expires = (argc > 2) ? argv[2] : null;
	var path = (argc > 3) ? argv[3] : null;
	var domain = (argc > 4) ? argv[4] : null;
	var secure = (argc > 5) ? argv[5] : false;
	document.cookie = name + "=" + escape(value) +
		((expires == null) ? "" : ("; expires=" + expires.toGMTString())) +
		((path == null) ? "" : ("; path=" + path)) +
		((domain == null) ? "" : ("; domain=" + domain)) +
		((secure == true) ? "; secure" : "");
};

phpBB.getCookieVal = function(offset) 
{
	var endstr = document.cookie.indexOf(";",offset);
	if (endstr == -1)
	{
		endstr = document.cookie.length;
	}
	return unescape(document.cookie.substring(offset, endstr));
};

phpBB.getCookie = function(name) 
{
	var arg = name + "=";
	var alen = arg.length;
	var clen = document.cookie.length;
	var i = 0;
	while (i < clen) 
	{
		var j = i + alen;
		if (document.cookie.substring(i, j) == arg)
			return phpBB.getCookieVal(j);
		i = document.cookie.indexOf(" ", i) + 1;
		if (i == 0)
			break;
	} 
	return null;
};

phpBB.setHiddenForum = function(id, hide)
{
	function updateCookie()
	{
		var str = phpBB.hiddenForums.join(','),
			d = new Date();
		d.setTime(d.getTime() + 30*24*60*60*1000);
		phpBB.setCookie('hidden', str, d);
	}
	for(var i=0; i<phpBB.hiddenForums.length; i++)
	{
		if(phpBB.hiddenForums[i] == id)
		{
			// found it
			if(hide) return;
			phpBB.hiddenForums.splice(i, 1);
			updateCookie();
			return;
		}
	}
	if(!hide) return;
	phpBB.hiddenForums.push(id);
	updateCookie();
};
