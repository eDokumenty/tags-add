/**
 * Generuje slug'a
 * 
 * @param string t
 * @returns string
 */
function getSlug(t){
    var charMap = {
        ą:'a', ć:'c', ę:'e', ł:'l', ń:'n', ó:'o', ś:'s', ż:'z', ź:'z',
        Ą:'A', Ć:'C', Ę:'E', Ł:'L', Ń:'N', Ś:'S', Ó:'O', Ż:'Z', Ź:'Z'
    };
    var str_array = t.split('');
    for( var i = 0, len = str_array.length; i < len; i++ ) {
        str_array[ i ] = charMap[ str_array[ i ] ] || str_array[ i ];
    };
    var slugreplace = str_array.join('');
    var slugcontent_hyphens = slugreplace.replace(/\s/g,'-');
    return slugcontent_hyphens.replace(/[^a-zA-Z0-9\-]/g,'').toLowerCase();
}

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
    $(function() {
        $("#name").keyup(function(){
            var t = getSlug( $('#name').val());
            $("#slug").val(t);
        });
    });
});