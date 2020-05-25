jQuery( "#accordion" ).accordion();



var availableTags = [
	"ActionScript",
	"AppleScript",
	"Asp",
	"BASIC",
	"C",
	"C++",
	"Clojure",
	"COBOL",
	"ColdFusion",
	"Erlang",
	"Fortran",
	"Groovy",
	"Haskell",
	"Java",
	"JavaScript",
	"Lisp",
	"Perl",
	"PHP",
	"Python",
	"Ruby",
	"Scala",
	"Scheme"
];
jQuery( "#autocomplete" ).autocomplete({
	source: availableTags
});



jQuery( "#button" ).button();
jQuery( "#button-icon" ).button({
	icon: "ui-icon-gear",
	showLabel: false
});



jQuery( "#radioset" ).buttonset();



jQuery( "#controlgroup" ).controlgroup();



jQuery( "#tabs" ).tabs();



jQuery( "#dialog" ).dialog({
	autoOpen: false,
	width: 400,
	buttons: [
		{
			text: "Ok",
			click: function() {
				jQuery( this ).dialog( "close" );
			}
		},
		{
			text: "Cancel",
			click: function() {
				jQuery( this ).dialog( "close" );
			}
		}
	]
});

// Link to open the dialog
jQuery( "#dialog-link" ).click(function( event ) {
	jQuery( "#dialog" ).dialog( "open" );
	event.preventDefault();
});



jQuery( "#datepicker" ).datepicker({
	inline: true
});



jQuery( "#slider" ).slider({
	range: true,
	values: [ 17, 67 ]
});



jQuery( "#progressbar" ).progressbar({
	value: 20
});



jQuery( "#spinner" ).spinner();



jQuery( "#menu" ).menu();



jQuery( "#tooltip" ).tooltip();



jQuery( "#selectmenu" ).selectmenu();


// Hover states on the static widgets
jQuery( "#dialog-link, #icons li" ).hover(
	function() {
		jQuery( this ).addClass( "ui-state-hover" );
	},
	function() {
		jQuery( this ).removeClass( "ui-state-hover" );
	}
);