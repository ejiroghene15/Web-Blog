$.protip();

// ? click on the hamburger icon to toggle the sidebar
$('[data-toggle="sidebar"]').on("click", function(e) {
    e.stopPropagation();
    $("#sidebar").toggleClass("sidebar-active");
});

// ? close the sidebar  when any part of the document is clicked
$(document).on("click", function(e) {
    $("#sidebar").removeClass("sidebar-active");
});

$(".toggle-category").on("click", () => $(".categories").slideToggle());

$(".ck-content").each(function(i) {
    $(this).html(
        $(this)
            .html()
            .trim()
            .replace("<p>&nbsp;</p>", "")
    );
});

// * reactions on on post
$(".icon_heart").on("click", function() {
    let elem_icon = $(".icon_heart i");
    (elem_hearts = $("#no_of_hearts")),
        (hearts = Number(elem_hearts.text())),
        (postid = $("#article_id").text()),
        (userid = $("#user_id").text());

    hearts == 0
        ? elem_icon.hasClass("fa-heart-o")
            ? hearts++
            : false
        : elem_icon.hasClass("fa-heart-o")
        ? hearts++
        : hearts--;

    $.post("/api/react_on_post", { hearts, postid, userid }, () => {
        elem_hearts.text(hearts);
        elem_icon.toggleClass("fa-heart fa-heart-o");
    });
});

// ! profile
$("[href='#fb']").on("click", () => {
    $("#fb").show();
});

// ! profile
$("[href='#tw']").on("click", () => {
    $("#tw").show();
});

document.querySelectorAll("oembed[url]").forEach(element => {
    iframely.load(element, element.attributes.url.value);
});
