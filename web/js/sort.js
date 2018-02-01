var table = document.getElementById('ListCoder');
table.addEventListener('click', function (e) {
    var tableHeader = e.target, order;
    if (tableHeader.nodeName == 'TD') return;
    while (tableHeader.nodeName !== 'TH') tableHeader = tableHeader.parentNode;
    order = tableHeader.getAttribute('data-order') === 'asc' ? 'desc' : 'asc';
    tableHeader.setAttribute('data-order', order);
    tinysort(table.querySelectorAll('tr'), { selector: 'td:nth-child(' + (Array.prototype.indexOf.call(table.querySelectorAll('th'), tableHeader) + 1) + ')', order: order });
}); 



// déterminer l'index des colonnes les colonnes
var colonnes = {};
$("#ListCoder thead th").each(function (index, th) {
    colonnes[index] = $(th).text();
}
);
// faire la recherche dans le tableau
$("#search").keyup(function () {
    var mots = $(this).val().toLowerCase().split(" ");
    $("#ListCoder tbody tr").each(function (index, tr) {
        if (mots[0].length > 0) $(tr).hide(); else $(tr).show();
        $("td", tr).each(function (index, td) {
            if (colonnes[index] in { ' Titre': true  }) {
                for (mot in mots) {
                    if (mots[mot].length > 0 && $(td).text().toLowerCase().indexOf(mots[mot]) >= 0) {
                        $(tr).show();
                        return false;
                    }
                }
            }
        });
    });
});
