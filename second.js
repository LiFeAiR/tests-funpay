function getHtmlFromUrl(url) {
    var c = $(".modal-window");
    var b = c.find(".modal-body");
    
    b.html('<span class="text-muted">Загрузка информации...</span>');
    c.modal("show");

    $.ajax({
            type: "GET", url: url,
            
            error: function (html) {
                b.html(html);
            },
            
            success: function (html) {
                b.html(html);
            }
        }
    )
}
