$('#old > li').clone().text(function (index, text) {
    return text + ' at ' + index;
}).appendTo('#new');