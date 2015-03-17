
callSuggest($('#search_suggest'));
jQuery(document).ready(function()
{       
    
//    $("#mocz").click(function(event){
//        console.log("kliked");
//  //  t = t +1;
//    $.ajax({
//       type: "POST",
//       cache: "false",
//       dataType: "html",
//       url: path_to_search,
//       success: function(data){
//           console.log("pizda");
//       $("#mocznik"). .append(data);    
//       }
//    });
//  });
//    
$('#search_suggest').keyup(function(key)
{
    console.log(key);
    callSuggest(this);
});
});

function callSuggest(obj)
    {
        var value = obj.value;
        var context = $('#context_suggest').val();
        $.ajax({
            type: "POST",
            cache: false,
            url: path_to_controller,
            data: { "value" : value, "context" : context},
            error: function(XMLHttpRequest, textStatus, errorThrown)
            {
                alert('Error: ' + errorThrown + '\n' + textStatus);
            }

        }).done(function(result)
        {
            if(result.suggestionsArray)
            {
                var suggestions = result.suggestionsArray;
                console.log(suggestions);
                $('#search_suggest').autocomplete({
                    position: { my: "right top", at: "right bottom" },
                    autoFocus: true,
                    delay: 500,
                    disabled: false,
                    minLength: 0,
                    cache: false
                });
                $( "#search_suggest" ).autocomplete({
                            source: function( request, response ) {
                            
                            var splitTerm = (request.term).split(" ");
                            var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( (request.term).trim() ), "i" );
                            var a = $.grep( suggestions, function( item ){
                                return matcher.test( item );
                            }) ;
                            if(a.length == 0)
                            {
                                matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( splitTerm[splitTerm.length - 1] ), "i" );
                                a = $.grep( suggestions, function( item ){
                                return matcher.test( item );
                                }) ;
                                response( $.grep( suggestions, function( item ){
                                return matcher.test( item );
                            }) );
                            }
                            else
                            {
                                    response( $.grep( suggestions, function( item ){
                                return matcher.test( item );
                            }) );
                            }
                            },
                            focus: function( event, ui ) 
                            {
                                return false;
                            },
                            select: function( event, ui ) 
                            {
                                var oldLabel = (obj.value).split(/\s+/);
                                var oldString = '';
                                for(i = 0; i < (oldLabel.length-1); i++)
                                {
                                    oldString += oldLabel[i] + " ";
                                }
                                
                                $('#search_suggest').val(doSomethingNasty(oldString,ui.item.value,suggestions));
                                return false;
                            
                            }
                            }).data('uiAutocomplete')._renderItem = function( ul, item ) {
                        var srchTerm = $.trim(this.term).split(/\s+/).join ('|');
                        var strNewLabel = item.label;
                        var oldLabel = (this.term).split(/\s+/);
                        var oldString = '';
                        for(i = 0; i < (oldLabel.length-1); i++)
                        {
                            oldString += oldLabel[i] + " ";
                        }
                        regexp = new RegExp ('(' + srchTerm + ')', "ig");
                        var strNewLabel = strNewLabel.replace(regexp,"<span style='font-weight:bold;color:Blue;'>$1</span>");
                        return $( "<li></li>" )
                            .data( "item.autocomplete", item )
                            .append( "<a>" + strNewLabel + "</a>" )
                            .appendTo( ul );
                            };      
            }
            else
            {
                var suggestions = [];
                $( "#search_suggest" ).autocomplete({
                source : suggestions
                });
            }
        });
    }
    
    function doSomethingNasty(oldInput,currentSuggestion,suggestions)
    {  
        var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( (oldInput).trim() ), "i" );
                            var a = $.grep( suggestions, function( item ){
                                return matcher.test( item );
                            }) ;    
        regexp = new RegExp ('(' + oldInput + ')', "ig");
        if(a.length == 0)
            return oldInput + currentSuggestion;
        else
            return currentSuggestion;
    }