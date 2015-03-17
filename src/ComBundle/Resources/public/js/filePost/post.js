/* 
 * Copyright(c) 1993-2015 Softax, ksikora., Wszelkie prawa zastrzeżone
 * To oprogramowanie jest własnością i zawiera poufne technologie Softax.
 * Posiadanie, użycie lub kopiowanie tego oprogramowania jest dozwolone
 * jedynie na podstawie ważnej udzielonej pisemnie licencji Softax.
 */
if (!String.format) {
    String.format = function (format) {
        var args = Array.prototype.slice.call(arguments, 1);
        return format.replace(/{(\d+)}/g, function (match, number) {
            return typeof args[number] != 'undefined'
                    ? args[number]
                    : match
                    ;
        });
    };
}

function randString(n)
{
    if(!n)
    {
        n = 5;
    }

    var text = '';
    var possible = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

    for(var i=0; i < n; i++)
    {
        text += possible.charAt(Math.floor(Math.random() * possible.length));
    }
    
    return '_' + text;
}

    function greyInput(field)
{
    field.attr('readonly','true');
    field.css('background-color' , '#DEDEDE');
    var fileType = $("#IpsFilePost_fileType").val();
    var randomFileId = fileType + randString(12);
    field.val(randomFileId);
}

function enableInput(field)
{
    field.attr('readonly','false');
    field.removeAttr('style');
    field.removeAttr('readonly');
}

function tempAlert(msg,duration)
{
 var el = document.createElement("div");
 el.setAttribute("style","position:absolute;top:40%;left:20%;background-color:white;");
 el.innerHTML = msg;
 setTimeout(function(){
  el.parentNode.removeChild(el);
 },duration);
 $("$IpsFilePost_submit").appendChild(el);
}

$(document).ready(function () {
    
    if($('#IpsFilePost_randomizeId').prop('checked'))
    {
        /*
         * Jeśli jest zaznaczony należy pole fileId zrobić disabled
         */
        greyInput($("#IpsFilePost_fileId"));
    }
    else
    {
        enableInput($("#IpsFilePost_fileId"));
    }
    $('#IpsFilePost_randomizeId').change(function(e) {
    if($('#IpsFilePost_randomizeId').prop('checked'))
    {
        /*
         * Jeśli jest zaznaczony należy pole fileId zrobić disabled
         */
        greyInput($("#IpsFilePost_fileId"));
    }
    else
    {
        enableInput($("#IpsFilePost_fileId"));
    }
        
    });
            
    $('#formFilePost').submit(function (e) {
        e.preventDefault(); 
        $.ajax({
            type: "POST",
            cache: false,
            url: path_to_controller,
            data: $(this).serialize(),
            error: function (XMLHttpRequest, textStatus, errorThrown)
            {
                alert('Error: ' + errorThrown + '\n' + textStatus);
            }

        }).done(function (result)
        {
            if (result.result)
            {

                var res = result.result;
                if (res['result'] == 'ERROR')
                {

                    var msg = 'result      :' + res['result'] + '\n'
                            + 'err-code    :' + res['err-code'] + '\n'
                            + 'err-message :' + res['err-message'];
                    alert(msg);
                }
                else
                {
                    alert('File added succesfully.');
                }
                console.log(result.result);
            }
        });
        if($('#IpsFilePost_randomizeId').prop('checked'))
        {
            /*
             * Wyznaczanie losowej wartości
             */
            var fileType = $("#IpsFilePost_fileType").val();
            var randomFileId = fileType + randString(12);
            $("#IpsFilePost_fileId").val(randomFileId);
        }
    });
});

    