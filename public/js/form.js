$(document).ready(function () {
    $(".btn-success.btnimg").click(function () {
        var lsthmtl = $(".clone").html();
        $(".increment").after(lsthmtl);
    });
    $("body").on("click", ".btn-danger.btnimgdel", function (event) {
        event.preventDefault();
        $(this).parents('.hdtuto').remove();
    });
});
$(document).ready(function () {
    $(".btn-success.btnvideo").click(function () {
        var lsthmtl = $(".clone2").html();
        $(".increment2").after(lsthmtl);
    });
    $("body").on("click", ".btn-danger.btnvideodel", function (event) {
        event.preventDefault();
        $(this).parents('.hdtuto2').remove();
    });
});
