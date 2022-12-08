$(() => {
    $(".fa-arrow-up").hide();
    var scrollBreakpoint = $(window).innerHeight() / 2;
    $(window).on("scroll down", function () {
        st = $(this).scrollTop();
        if (st > scrollBreakpoint) {
            $(".fa-arrow-up").show();
        } else {
            $(".fa-arrow-up").hide();
        }
    });
});
