/*==============================================================================
Variables
==============================================================================*/

var $win = $( window ),
	$doc = $( document ),
	$html = $( 'html' ),
	$body = $( 'body' ),
	$main = $( '.main' );

/*==============================================================================
Retina Class
==============================================================================*/

if (window.matchMedia) { 
	var mq = window.matchMedia("only screen and (-moz-min-device-pixel-ratio: 1.3), only screen and (-o-min-device-pixel-ratio: 2.6/2), only screen and (-webkit-min-device-pixel-ratio: 1.3), only screen  and (min-device-pixel-ratio: 1.3), only screen and (min-resolution: 1.3dppx)");
	if(mq && mq.matches) {
		document.documentElement.className += ' retina';
	}
}

/*==============================================================================
FastClick
==============================================================================*/

FastClick.attach( document.body );

/*==============================================================================
Loaded Class
==============================================================================*/

$win.on( 'load', function() {
	$html.addClass( 'loaded' );
});

/*==============================================================================
Form Submit Replace
==============================================================================*/

$( '.submit-replace' ).on( 'click', function( e ) {
	e.preventDefault();
	$( this ).closest( 'form' ).submit();
});

/*==============================================================================
pjax
==============================================================================*/

/*var siteURL = 'http://' + top.location.host.toString();

$doc.pjax( "a[href^='" + siteURL + "'], a[href^='/'], a[href^='./'], a[href^='../'], a[href^='#']", '.main', {
	fragment: '.main'
});

$doc.on( 'pjax:send', function() {
	$html.addClass( 'loading' );
});

$doc.on( 'pjax:complete', function() {
	$main.imagesLoaded( function() {
		$html.removeClass( 'loading' );
	});
});*/

/*===================================================================================
Vue
===================================================================================*/
import Vue from 'vue'

var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue!'
  }
})