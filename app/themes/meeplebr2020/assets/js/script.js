$(".header-menu ul.menu").addClass("list-inline mb-0");
$(".header-menu ul.menu > li").addClass("list-inline-item");
$(".header-menu ul.sub-menu").addClass("dropdown-menu");
$(".header-menu ul.sub-menu li").addClass("dropdown-item");
$(".header-menu ul.menu > li.menu-item-has-children").addClass("dropdown");
$(".header-menu ul.menu > li.menu-item-has-children li.menu-item-has-children").addClass("dropdown-submenu");
$(".header-menu ul.sub-menu").parent().find("> a").addClass("dropdown-toggle");
$(".header-menu").show();

$("#mobile-menu ul").addClass("list-unstyled");
$("#mobile-menu ul li a").addClass("btn btn-dark btn-sm btn-block rounded-0");
var mobile_collapse = 1;
$("#mobile-menu ul li.menu-item-has-children").each(function(){
    var id = "collapse-" + mobile_collapse;
    $(this).attr("id", id + "-parent");
    var txt = $(this).find("> a").text();
    $(this).find("> a").text(txt + " +");
    $(this).find("> a").attr("href", "#" + id);
    $(this).find("> a").attr("role", "button");
    $(this).find("> a").attr("data-parent", "#" + id + "-parent");
    $(this).find("> a").attr("data-toggle", "collapse");
    $(this).find("> a").attr("aria-expanded", "false");
    $(this).find("> a").attr("aria-controls", id);
    $(this).find("> ul.sub-menu").addClass("collapse");
    $(this).find("> ul.sub-menu").attr("id", id);
    mobile_collapse++;
});

$(window).on("load", function(){
    $("#loader").fadeOut("slow");
});

$(document).ready(function(){
    HeaderScroll();
    $(window).on("scroll", function(){
        HeaderScroll();
    });

    $(".entry-content p > img").parent().css("margin-bottom", "0");
    $(".entry-content img").addClass("img-fluid");
    
    $("[title]").tooltip();

    $("input[type=text].input-phone").mask("(00) 0000-00000");
    $("input[type=text].input-cpf").mask("000.000.000-00");
    $("input[type=text].input-cnpj").mask("00.000.000/0000-00");
    $("input[type=text].input-cep").mask("00000-000");
    $("input[type=text].input-ie").mask("000.000.000.000");
    $("input[type=text].input-uf").mask("AA");

    $("div#product-carousel img").on("click", function(e){
        e.preventDefault();
        var src = $(this).attr("src");
        $("img#zoom-image").attr("src", src);
        $(".modal#zoom-modal").modal();
    });

    $("div#product-carousel").slick({
        autoplay: false,
        arrows: false,
        dots: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: "#product-carousel-nav,#zoom-carousel"
    });
    $("div#product-carousel-nav").slick({
        arrows: false,
        dots: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: "#product-carousel,#zoom-carousel",
        centerMode: true,
        focusOnSelect: true
    });
    $("div#zoom-carousel").slick({
        autoplay: false,
        arrows: false,
        dots: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: "#product-carousel,#product-carousel-nav",
    });

    $("button.next-slide").on("click", function(e){
        e.preventDefault();
        var target = $(this).data("target-carousel");
        $(target).slick("slickNext");
    });
    $("button.prev-slide").on("click", function(e){
        e.preventDefault();
        var target = $(this).data("target-carousel");
        $(target).slick("slickPrev");
    });

    $(".modal#zoom-modal").on("shown.bs.modal", function(){
        triggerResize();
    });

    window.lazyload = new LazyLoad();
});

function HeaderScroll()
{
    if($("html,body").scrollTop() > 10){
        if(!$("header").hasClass("scrolled")){
            $("header").addClass("scrolled");
			$("ul#social-networks").slideUp();
        }
    } else {
        if($("header").hasClass("scrolled")){
            $("header").removeClass("scrolled");
			$("ul#social-networks").slideDown();
        }
    }
}

function triggerResize()
{
    window.dispatchEvent(new Event('resize'));
}