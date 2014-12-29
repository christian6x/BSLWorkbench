/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function()
{
$('#search_suggest').autocomplete({
    position: { my: "right top", at: "right bottom", collision: "flip" },
    autoFocus: true,
    disabled: false,
    minLength: 1
});
$('#search_suggest').keyup(function(key)
{
    var value = this.value;
    var x;
    $.ajax({
        type: "POST",
        url: path_to_controller,
        data: { "value" : value},
        succes : function(result)
        {

        },
        
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            alert('Error: ' + errorThrown + '\n' + textStatus);
        }
        
    }).done(function(result)
    {
        if(result.name)
        {
            console.log(result);
            var name = result.name;
            console.log(name);

            
             var name = [
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
            $( "#search_suggest" ).autocomplete( "option", "source", name );
           
        }
    });
});
});

