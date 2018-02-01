var table = document.getElementById('ListCoder');
table.addEventListener('click', function (e) {
    var tableHeader = e.target, order;
    if (tableHeader.nodeName == 'TD') return;
    while (tableHeader.nodeName !== 'TH') tableHeader = tableHeader.parentNode;
    order = tableHeader.getAttribute('data-order') === 'asc' ? 'desc' : 'asc';
    tableHeader.setAttribute('data-order', order);
    tinysort(table.querySelectorAll('tr'), { selector: 'td:nth-child(' + (Array.prototype.indexOf.call(table.querySelectorAll('th'), tableHeader) + 1) + ')', order: order });
}); 