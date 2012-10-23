/* Use this script if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'IcoMoon\'">' + entity + '</span>' + html;
	}
	var icons = {
			'icon-arrow-down' : '&#x21;',
			'icon-arrow-up' : '&#x22;',
			'icon-arrow-right' : '&#x23;',
			'icon-arrow-left' : '&#x24;',
			'icon-arrow-up-left' : '&#x25;',
			'icon-arrow-up-2' : '&#x26;',
			'icon-arrow-up-right' : '&#x27;',
			'icon-arrow-right-2' : '&#x28;',
			'icon-arrow-down-right' : '&#x29;',
			'icon-arrow-down-2' : '&#x2a;',
			'icon-facebook' : '&#x2b;',
			'icon-facebook-2' : '&#x2c;',
			'icon-twitter' : '&#x2d;',
			'icon-feed' : '&#x2e;',
			'icon-google-plus' : '&#x2f;',
			'icon-google-plus-2' : '&#x30;',
			'icon-twitter-2' : '&#x31;',
			'icon-left-quote' : '&#x32;',
			'icon-thumbs-up' : '&#x33;',
			'icon-dots-three' : '&#x34;',
			'icon-home' : '&#x35;',
			'icon-microphone' : '&#x36;',
			'icon-bell' : '&#x37;',
			'icon-arrow' : '&#x38;',
			'icon-arrow-2' : '&#x39;',
			'icon-arrow-3' : '&#x3a;',
			'icon-arrow-4' : '&#x3b;',
			'icon-warning' : '&#x3c;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, html, c, el;
	for (i = 0; i < els.length; i += 1) {
		el = els[i];
		attr = el.getAttribute('data-icon');
		if (attr) {
			addIcon(el, attr);
		}
		c = el.className;
		c = c.match(/icon-[^s'"]+/);
		if (c) {
			addIcon(el, icons[c[0]]);
		}
	}
};