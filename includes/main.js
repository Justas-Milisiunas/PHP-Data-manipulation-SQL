$(window).ready(function () {

    $(".addChild").click(function () {
        table = document.getElementById("parent");
        childRow = document.getElementById("childRow");

        childRowHeader = document.getElementById("childRowHeader");
        if(childRowHeader != undefined)
            childRowHeader.style.display = "";

        newRow = childRow.cloneNode(true);
        // newRow.id = 'kopija';
        newRow.childNodes[1].childNodes[1].value = '';

        newRow.style.display = "";
        table.appendChild(newRow);

        return false;
    });

    $(".addChildWithoutResetting").click(function () {
        table = document.getElementById("parent");
        childRow = document.getElementById("childRow");

        childRowHeader = document.getElementById("childRowHeader");
        if(childRowHeader != undefined)
            childRowHeader.style.display = "";

        newRow = childRow.cloneNode(true);
        newRow.childNodes[3].childNodes[1].value = "";

        newRow.style.display = "";
        table.appendChild(newRow);

        return false;
    });
});


function showConfirmDialog(md, removeId) {
    let r = confirm("Ar tikrai norite pašalinti!");
    if (r === true) {
        window.location.replace("index.php?module=" + md + "&action=delete&id=" + removeId);
    }
}

function removeRow(element) {
    let row = element.parentElement.parentElement;
    row.remove();

    rowsCount = document.getElementById("parent").getElementsByTagName("tr").length;
    if (rowsCount == 2) {
        childRowHeader = document.getElementById("childRowHeader");
        childRowHeader.style.display = "none";
    }
}

function removeRowLeavingOne(element) {
    rowsCount = document.getElementById("parent").getElementsByTagName("tr").length;
    console.log(rowsCount);
    if (rowsCount == 1) {
        childRowHeader = document.getElementById("childRowHeader");
        childRowHeader.style.display = "none";
    }
    if(rowsCount >= 3) {
        let row = element.parentElement.parentElement;
        row.remove();
    }
}