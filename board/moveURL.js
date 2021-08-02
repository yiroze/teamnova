function moveURL(param) {
    location.href = "/firstapp/board_view/board_view.php?id=" + param;
}
function category() {
    var category = document
        .getElementById("category")
        .value;

    var req = new XMLHttpRequest( ); 
    req.open("GET", "/firstapp/board/free.php?category="+category); 
    req.send( );

}
function submit() {
    document.category.submit();
    }