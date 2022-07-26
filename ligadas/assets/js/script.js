var cardTemplate = "<div class=\"col-12 col-md-6 col-lg-4 p-2\">"+
    "<div class=\"card shadow bg-black h-100\">"+
        "<div class=\"wide bg-image lazy\" data-bg=\"{thumbnail}\"></div>"+
        "<div class=\"card-body text-light\">"+
            "<h5 class=\"font-weight-bold\">{title}</h5>"+
            "<p class=\"small\">{excerpt}</p>"+
            "<a href=\"{permalink}\" target=\"_blank\" rel=\"noopener noreferrer\" class=\"text-light text-decoration-none font-weight-bold\">Continuar lendo</a>"+
        "</div>"+
    "</div>"+
"</div>";

$(window).on("load", function(){
    AOS.init({
        disable: "mobile",
        once: true,
        duration: 1000,
        offset: 250,
    });

    $("section").verticalDotNav({
        align : "right",
        nav_color: "rgba(0, 0, 0, 0)",
        dot_size: 15,
        dot_color: "#C2C2C2"
    });

    $(".loader").fadeOut(250);
});

$(document).ready(function(){
    window.lazyload = new LazyLoad();

    $("header").sticky({
        topSpacing: 0,
        zIndex: 999,
    });

    $.getJSON("http://meeplebr.com/wp-json/wp/v2/posts?per_page=6&tags=1149&_embed", function(data){
        data.forEach(function(post, index){
            var thumbnail = post._embedded['wp:featuredmedia'][0].source_url;
            var title = post.title.rendered;
            var excerpt = post.excerpt.rendered;
            var permalink = post.link;
            card = cardTemplate.replace("{thumbnail}", thumbnail).replace("{title}", title).replace("{excerpt}", excerpt).replace("{permalink}", permalink);

            $("#news-container").append(card);

            window.lazyload.update();
        });
    });

    $("input[type=file].custom-file-input").on("change", function(event){
        var file = $(this).val().split("\\").pop();
        var id = $(this).attr("id");
        $("label[for="+id+"]").text(file);
    });

    $("input[name=team]").on("change", function(){
        var val = $("input[name=team]:checked").val();
        
        if(val == "yes"){
            $("#co-authors").show();
        } else {
            $("#co-authors-list").empty();
            $("#co-authors").hide();
        }
    });

    $("button#add-co-author").on("click", function(event){
        var template = $("template#co-author-block").html();
        $("#co-authors-list").append(template);

        $("button.delete-co-author").on("click", function(event){
            $(this).closest(".co-author-block").remove();
        });
    });

    $(window).on("scroll", AOS.refresh);
});