/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*jQuery(document).ready(function()
{*/
$('#search_suggest').keyup(function(key)
{
    var value = this.value;
    $.ajax({
        type: "POST",
        url: path_to_controller,
        data: { "value" : value},
        succes : function(data)
        {
            alert(data);
        },
        
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            alert('Error: ' + errorThrown + '\n' + textStatus);
        }
    });
});
//});

