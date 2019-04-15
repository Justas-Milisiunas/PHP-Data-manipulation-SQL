$(window).ready(function () {

    $(".addChild").click(function () {
        table = document.getElementById("parent");
        childRow = document.getElementById("childRow");
        newRow = childRow.cloneNode(true);
        newRow.id = 'kopija';

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

// function addChild() {
//     // document.getElementById("childRow").style.display = "";
//     let row = document.getElementById("childRow"); // find row to copy
//     let table = document.getElementById("parent"); // find table to append to
//     let clone = row.cloneNode(true); // copy children too
//     clone.style.display = "";
//     clone.id = "newID"; // change id or other attributes/contents
//     table.appendChild(clone); // add new row to end of table
// }

function removeRow(element) {
    // console.log(element);
    // let table = document.getElementById('parent').id;
    // let childRow = document.getElementById('childRow').id;
    let row = element.parentElement.parentElement;
    row.remove();
    // alert(row);
}