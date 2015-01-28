/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
callSuggest($('#search_suggest'));
jQuery(document).ready(function()
{   
$('#search_suggest').keyup(function(key)
{
    callSuggest(this);
});
});

function callSuggest(obj)
    {
        var value = obj.value;
        $.ajax({
            type: "POST",
            url: path_to_controller,
            data: { "value" : value},
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
                    disabled: false,
                    minLength: 0
                });
                $( "#search_suggest" ).autocomplete({
//                            source: function( request, response ) {
//                            var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
//                            response( $.grep( suggestions, function( item ){
//                            return matcher.test( item );
//                            }) );
//                            }
                            source : suggestions
                            });      
            }
            else
            {
                var suggestions = [];
                $( "#search_suggest" ).autocomplete({
                source : suggestions
                });
            }
            if(result.request)
            {
                //console.log(result.request);
             }

            if(result.fields)
            {
                //console.log(result.fields);
            }

        });
    }