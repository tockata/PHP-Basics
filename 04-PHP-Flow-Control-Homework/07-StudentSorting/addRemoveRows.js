var count = 0;
var tbody = document.getElementsByTagName('tbody')[0];

function removeRow(td) {
    var parentId = td.parentNode.id;
    if (parentId !== 'clone') {
        td.parentNode.remove();
    }
}

function addRow() {
    count++;
    var newRow = document.getElementById('clone').cloneNode();
    var newRowInnerHtml = document.getElementById('clone').innerHTML;
    newRow.innerHTML = newRowInnerHtml;
    newRow.setAttribute('id', 'clone' + count);
    tbody.appendChild(newRow);
}