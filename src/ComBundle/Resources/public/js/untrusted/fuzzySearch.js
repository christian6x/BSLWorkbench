/* 
 * Copyright(c) 1993-2015 Softax, ksikora., Wszelkie prawa zastrzeżone
 * To oprogramowanie jest własnością i zawiera poufne technologie Softax.
 * Posiadanie, użycie lub kopiowanie tego oprogramowania jest dozwolone
 * jedynie na podstawie ważnej udzielonej pisemnie licencji Softax.
 */
var continouesCall = false;
$(document).ready(function () {
    $('#formFuzzySearch').submit(function (e) {
        e.preventDefault();
        console.log($(this).serialize());
        $.ajax({
            type: "POST",
            cache: false,
            url: path_to_controller,
            data: $(this).serialize(),
            dataType: "json",
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
                    fillWithData($('#fuzzySearchResult'),res);
                    if(res['HEADER']['generation-state'] != "DONE")
                    {
                       continouesCall = true;
                       setTimeout(function () {                            
                            continuedCall($('#fuzzySearchResult'),res);
                        },2500);
                    }
                //alert('Ta-dam.');
                }
                //console.log(result.result);
            }
        });
    });

function continuedCall(element,res)
{
        fillWithData($('#fuzzySearchResult'),res);
        console.log(continouesCall);
        var $header = res['HEADER'];   
            var ham = $('#formFuzzySearch').serializeArray();
            ham.push({name: 'refresh', value : 'NO'});
            $.ajax({
            type: "POST",
            cache: false,
            url: path_to_controller,
            data: ham,
            dataType: "json",
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
                    fillWithData($('#fuzzySearchResult'),res);
                    if(res['HEADER']['generation-state'] != "DONE" && continouesCall)
                    {
                       setTimeout(function () {                            
                            continuedCall($('#fuzzySearchResult'),res);
                        },2500);
                    }
                }
            }
        });
}

function clearElementData(element)
{
    element.empty();
}

function appendRow(table,record)
{
    var tr = $("<tr>");
    tr.append($("<td>").text(record['IDENTIFIER']));
    tr.append($("<td>").text(record['VALUE']));
    tr.append($("<td>").text(record['SIMILARITY']));
    tr.append($("<td>").text(record['DOMAIN']));
    tr.append($("<td>").text(record['TYPE']));
    tr.append($("<td>").text(record['STATUS']));
    table.append(tr);
}

function evaluatePageButtons(element,res)
{
    var replyParams = res['REPLY-PARAMETERS'];
    var pageSize = replyParams["PAGE-SIZE"];
    var totalRecords = replyParams["TOTAL-RECS"];  
    var PageCounter = Math.ceil((totalRecords / pageSize));
    console.log("PageCounter "+PageCounter);
    //Doklejam do element    
}

function fillWithData(element,res)
{
    clearElementData(element);
    
    var header = res['HEADER'];
    var result = res['BLACK-LIST'];
    var replyParams = res['REPLY-PARAMETERS'];
    
    var replyDiv = $("<ul>", {class : "list-inline"});
    replyDiv.append($("<li>").text("CAN-CONTINUE: " + replyParams["CAN-CONTINUE"]));
    replyDiv.append($("<li>").text("PAGE-NO: " + replyParams["PAGE-NO"]));
    replyDiv.append($("<li>").text("PAGE-SIZE: " + replyParams["PAGE-SIZE"]));
    replyDiv.append($("<li>").text("TOTAL-RECORDS: " + replyParams["TOTAL-RECS"]));
    element.append(replyDiv);
   
    var headerDiv = $("<dl>",{id : "fuzzySearchResultHeader", class : "dl-horizontal"});
    headerDiv.css({widht : "60%"});
    
    headerDiv.append($("<dt>Generation State</dt>"));
    headerDiv.append($("<dd>"+header['generation-state']+"</dd>"));
    
    headerDiv.append($("<dt>Start Time</dt>"));
    headerDiv.append($("<dd>"+header['start-time']+"</dd>"));
    
    if(header['end-time'] != "" && header['end-time'] != 'undefined')
    {
        headerDiv.append($("<dt>End Time</dt>"));
        headerDiv.append($("<dd>"+header['end-time']+"</dd>"));
    } 
    
    headerDiv.append($("<dt>Similarity</dt>"));
    headerDiv.append($("<dd>"+header['similarity']+"</dd>"));
    
    element.append(headerDiv);
    
    var resultTable = $("<table>", {class : "table table-striped"});
    var tableHeader = $("<thead>");
    var tableHeaderTr = $("<tr>");
    tableHeaderTr.append($("<th>").text('Identifier'));
    tableHeaderTr.append($("<th>").text('Value'));
    tableHeaderTr.append($("<th>").text('Similarity'));
    tableHeaderTr.append($("<th>").text('Domain'));
    tableHeaderTr.append($("<th>").text('Type'));
    tableHeaderTr.append($("<th>").text('Status'));
    tableHeader.append(tableHeaderTr);   
    resultTable.append(tableHeader);
    /*
     * Table content
     */
    result.forEach(function(entry) {
        appendRow(resultTable,entry);
});   
    element.append(resultTable);
    
    evaluatePageButtons(element,res);
}
    
});


