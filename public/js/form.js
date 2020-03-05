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

$(document).ready(function () {
    $("body").on("click", ".load_img .my_del_x", function (event) {
        event.preventDefault();
        $(this).parents('.load_img .load_img_card').remove();
    });
});

$(document).ready(function () {
    $(".add-images").click(function () {
        $(".myfrm").change(function () {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    });
});
