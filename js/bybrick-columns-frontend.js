var $ = jQuery.noConflict();
$(function () {
	$('.bbcol p').filter(function () {
		return $.trim($(this).html()) == '';
	}).remove()
});