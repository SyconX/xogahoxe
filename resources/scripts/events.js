$(() => {
    $(".event").click(function () {
        console.log($(this));
        console.log(Object.entries($(this)));
    });
});
