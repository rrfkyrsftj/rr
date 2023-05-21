// <!-- DTM Data Layer BEGIN -->
/* Page Name sections : 9
/  Site = "cpc.ca: > " +
/ Language = ($('meta[name=language]').attr('content') ? $('meta[name=language]').attr('content') : 'en') + " > " + 
/ Segment = ($('meta[name=sns]').attr('content') ? $('meta[name=sns]').attr('content') : 'common')	+ " > " + 
/ Category Type = ($('meta[name=cattype]').attr('content') ? $('meta[name=cattype]').attr('content') + " > " : '') + "" +
/ Category = ($('meta[name=category]').attr('content') ? $('meta[name=category]').attr('content') + " > " : ($.url().param('cat') ? ($.url().param('cat') == '*' ? '' : $.url().param('cat') + " > ") : '')) + "" +
/ Sub-Category = ($('meta[name=subcategory]').attr('content') ? $('meta[name=subcategory]').attr('content') + " > " : ($.url().param('subcat') ? ($.url().param('subcat') == '*' ? '' : $.url().param('subcat') + " > ") : '')) + "" + ($.url().param('pubdate') ? ($.url().param('pubdate') + " > ") : '') + "" + ($('meta[name=ptype]').attr('content') ? $('meta[name=ptype]').attr('content') + "" + ($('meta[name=phead]').attr('content') ? " > "  : '') : '') + "" +
/ Page Title = ($('meta[name=phead]').attr('content') ? $('meta[name=phead]').attr('content') : '') +
/ Advisor Step [only if on Advisor] = (typeof $('.stepsTrack').data('stateCode') != 'undefined' ? ' > Step' + $('.stepsTrack').data('stateCode') : ''),
/
*/
  
var getUrlParameter = function getUrlParameter(sParam) {
  	var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;
	for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');
		if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? '' : encodeURIComponent(sParameterName[1]);
        }
    }
};

var pathname = window.location.pathname;

var analyicsData = {};
analyicsData.lang = (document.documentElement.lang ? document.documentElement.lang : 'en');
analyicsData.sns = ($('meta[name=sns]').attr('content') ? $('meta[name=sns]').attr('content') : 'common');
analyicsData.cattype = ($('meta[name=cattype]').attr('content') ? $('meta[name=cattype]').attr('content') : '');
analyicsData.category = ($('meta[name=category]').attr('content') ? $('meta[name=category]').attr('content') : (getUrlParameter('cat') ? (getUrlParameter('cat') == '*' ? '' : getUrlParameter('cat')) : ''));
analyicsData.subcategory = ($('meta[name=subcategory]').attr('content') ? $('meta[name=subcategory]').attr('content') : (getUrlParameter('subcat') ? (getUrlParameter('subcat') == '*' ? '' : getUrlParameter('subcat')) : ''));
analyicsData.pagename = "cpc.ca: > " + analyicsData.lang + " > " + analyicsData.sns + " > " + (analyicsData.cattype ? analyicsData.cattype + ' > ' : '') + (analyicsData.category ? analyicsData.category + ' > ' : '') + (analyicsData.subcategory ? analyicsData.subcategory + ' > ' : '') + (getUrlParameter('pubdate') ? (getUrlParameter('pubdate') + " > ") : '') + "" + ($('meta[name=ptype]').attr('content') ? $('meta[name=ptype]').attr('content') + "" + ($('meta[name=phead]').attr('content') ? " > "  : '') : '') + "" + ($('meta[name=phead]').attr('content') ? $('meta[name=phead]').attr('content') : '') + ((!!window.location.pathname.match('ncoa') == true) ? " > " + window.location.pathname.split("/").pop() : '') + (typeof $('.stepsTrack').data('stateCode') != 'undefined' ? ' > Step' + $('.stepsTrack').data('stateCode') : '');

// for KB list pages
if(pathname.match('/support/kb/|/soutien/bc/') && pathname.split('/').length <= 7) {
    analyicsData.cattype = window.location.pathname.split('/')[4];
    analyicsData.category = window.location.pathname.split('/')[5];
    analyicsData.subcategory = window.location.pathname.split('/')[6];
    analyicsData.pagename = "cpc.ca: > " + analyicsData.lang + " > " + analyicsData.sns + " > " + (analyicsData.cattype ? analyicsData.cattype + ' > ' : '') + (analyicsData.category ? analyicsData.category : '') + (analyicsData.subcategory ? ' > ' + analyicsData.subcategory : '')
}


var digitalData={
	page: {
		attributes: {
			externalCampaignID: (getUrlParameter('ecid') ? getUrlParameter('ecid') : ''), 
			internalCampaignID: (getUrlParameter('icid') ? getUrlParameter('icid') : ''),
			internalSearch: {
			term: (getUrlParameter('searchInput') ? getUrlParameter('searchInput') : (getUrlParameter('q') ? getUrlParameter('q') : ''))
			},
			channel: {
				site: window.location.host
			}
		},		
		pageInfo:	{
    		pageName: analyicsData.pagename,
            audience: analyicsData.sns,
			language: analyicsData.lang,
			destinationURL: window.location.href
		},
		category: {
			pageType: ($('meta[name=ptype]').attr("content") ? $('meta[name=ptype]').attr('content') : ''),
			primaryCategory: analyicsData.cattype,
			subCategory1: analyicsData.category, 
			subCategory2: analyicsData.subcategory
		}
	}
};
// <!-- DTM Data Layer END -->
