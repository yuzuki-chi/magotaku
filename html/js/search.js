//ログインメニューの表示
document.getElementById("rogin_form").style.visibility = "hidden";
document.getElementById("rogin_nav").onclick = function () {
    document.getElementById("rogin_form").style.visibility = "visible";
}
// ログインメニューを閉じる
document.getElementById("close_item").onclick = function () {
    document.getElementById("rogin_form").style.visibility = "hidden";
}
