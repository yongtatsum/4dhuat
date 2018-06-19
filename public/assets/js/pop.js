$(function(){
//specify site script is hosted on
var site = "http://flyhigh999.com/";
//specify page to pop-under
var data ="http://go.ad2up.com/afu.php?id=1050646";

var height = 800;
//var height = (screen.availHeight - 122).toString(); // Fullscreen
var width = 510;
//var width = (screen.availWidth - 10).toString(); // Fullscreen

// Time Capping
var hours = 1;
/*!
 * jQuery Cookie Plugin
 * https://github.com/carhartl/jquery-cookie
 *
 * Copyright 2011, Klaus Hartl
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.opensource.org/licenses/GPL-2.0
 */
(function($) {
    $.cookie = function(key, value, options) {

        // key and at least value given, set cookie...
        if (arguments.length > 1 && (!/Object/.test(Object.prototype.toString.call(value)) || value === null || value === undefined)) {
            options = $.extend({}, options);

            if (value === null || value === undefined) {
                options.expires = -1;
            }

            if (typeof options.expires === 'number') {
                var days = options.expires, t = options.expires = new Date();
                t.setDate(t.getDate() + days);
            }

            value = String(value);

            return (document.cookie = [
                encodeURIComponent(key), '=', options.raw ? value : encodeURIComponent(value),
                options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
                options.path    ? '; path=' + options.path : '',
                options.domain  ? '; domain=' + options.domain : '',
                options.secure  ? '; secure' : ''
            ].join(''));
        }

        // key and possibly options given, get cookie...
        options = value || {};
        var decode = options.raw ? function(s) { return s; } : decodeURIComponent;

        var pairs = document.cookie.split('; ');
        for (var i = 0, pair; pair = pairs[i] && pairs[i].split('='); i++) {
            if (decode(pair[0]) === key) return decode(pair[1] || ''); // IE saves cookies with empty string as "c; ", e.g. without "=" as opposed to EOMB, thus pair[1] may be undefined
        }
        return null;
    };
})(jQuery);

/* popunder code */
(function($) {
    /* use jQuery as container for more convenience */
    $.popunder = function(sUrl) {
        var _parent = self;
    var bPopunder = ($.browser.msie && parseInt($.browser.version, 10) < 9);

    if (top != self) {
        try {
            if (top.document.location.toString()) {
                _parent = top;
            }
        }
        catch(err) { }
    }

    /* popunder options */
    var sOptions = 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=0,resizable=1,width=' + width;
    sOptions += ',height=' + height + ',screenX=0,screenY=0,left=0,top=0';

    /* create pop-up from parent context */
    var popunder = _parent.window.open(sUrl, 'pu_' + Math.floor(89999999*Math.random()+10000000), sOptions);
        if (popunder) {
            popunder.blur();
            if (bPopunder) {
                /* classic popunder, used for old ie*/
                window.focus();
                try { opener.window.focus(); }
                catch (err) { }
            }
            else {
                /* popunder for e.g. ff4+, chrome, ie9 */
                popunder.init = function(e) {
                    with (e) {
                        (function() {
                            if (typeof window.mozPaintCount != 'undefined') {
                                var x = window.open('about:blank');
                                x.close();
                            }

                            try { opener.window.focus(); }
                            catch (err) { }
                        })();
                    }
                };
                popunder.params = {
                    url: sUrl
                };
                popunder.init(popunder);
            }
        }
        
        return this;
    }
})(jQuery);
    	
	var date = new Date();
		date.setTime(date.getTime() + (hours * 60 * 60 * 1000));

    /////////
	if(!$.cookie('popper-pr')){
					$.cookie('popper-pr', 'true',  { expires: date, path: '/' });
				}else{
					
				}
	//$(document).click(function(){
						if(!$.cookie('popped-pr')){
							$.cookie('popped-pr', 'true',  { expires: date, path: '/' });
							$.popunder(data);
						}else{
							//do nothing
						}
                    //});
    ///////
});//END Doc Ready
	
