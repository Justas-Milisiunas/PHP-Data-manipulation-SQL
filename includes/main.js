function showConfirmDialog(md, removeId) {
    let r = confirm("Ar tikrai norite pašalinti!");
    if (r === true) {
        window.location.replace("index.php?module=" + md + "&action=delete&id=" + removeId);
    }
}