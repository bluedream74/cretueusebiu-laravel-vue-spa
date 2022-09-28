$(function(){
var nowModalMulti = null ;
var modalClass = "modal-multi" ;
var modals = document.getElementsByClassName( modalClass ) ;
for(var i=0,l=modals.length; l>i; i++){
	modals[i].onclick = function modalopen(){
		this.blur() ;
		var target = this.getAttribute( "data-target" ) ;
		if( typeof( target )=="undefined" || !target || target==null ){
			return false ;
		}
		nowModalMulti = document.getElementById( target ) ;
		if( nowModalMulti == null ){
			return false ;
		}
		if( $( "#modal-overlay" )[0] ) return false ;
		$( "body" ).append( '<div id="modal-overlay"></div>' ) ;
		$( "#modal-overlay" ).fadeIn( "fast" ) ;
		centeringModal() ;
		$( nowModalMulti ).fadeIn( "slow" ) ;
		$(window).resize();
		$( "#modal-overlay,#modal-close,.modal-close" ).unbind().click( function() {
			$( "#" + target + ",#modal-overlay" ).fadeOut( "fast" , function() {
				$( '#modal-overlay' ).remove() ;
			} ) ;
			nowModalMulti = null ;
		} ) ;
	}
}
	$( window ).resize( centeringModal ) ;
	function centeringModal() {
		if( nowModalMulti == null ) return false ;
		var w = $( window ).width() ;
		var h = $( window ).height() ;
		var cw = $( nowModalMulti ).outerWidth() ;
		var ch = $( nowModalMulti ).outerHeight() ;
		$( nowModalMulti ).css( {"left": ((w - cw)/2) + "px","top": ((h - ch)/2) + "px"} ) ;
	}
} ) ;
