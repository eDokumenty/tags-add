jQuery(function($) {     
    var $info = $("#modal-content");
    $info.dialog({
        'dialogClass'   : 'wp-dialog',
        'resizable'     : false,
        'modal'         : true,
        'autoOpen'      : false,
        'closeOnEscape' : true,
        'height'        : 520,
        'width'         : 500,
        'draggable'     : false,
        // not scroll background
        open: function(){
            $("body").css("overflow", "hidden");
        },
        close: function(){
            $("body").css("overflow", "auto");
        }
    });
    $( function() {
        $( "#add-tag" ).click(function() {
           $( "#modal-content" ).dialog( "open" );
           $info.dialog( "option", "title", "Dodaj nowy tag" );
        });
    });
    // When click outside
    $(".ui-widget-overlay").live("click", function (){
        $("div:ui-dialog:visible").dialog("close");
    });
});