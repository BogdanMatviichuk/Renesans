jQuery(document).ready(function($){
    //Start opacity of body tag at 0 and transition it to 100% when page is loaded.
    $('.ept_swipe').addClass('ept_swipe--animate');

    //When an anchor link with the class of transitionLink is clicked stop the link from linking.
    //Then remove the 'showContent' class from the body, making it fade out. Then link to the correct link.
    $("a").click(function(event){
        event.preventDefault();
        let th = $(this);
        let link = th.attr("href");
        let target = th.attr("target");

        if(link.startsWith('#') || th.hasClass('open-img') || th.parent().hasClass('popup-gallery')){
          //Don't run animation.
        }else{
          if(target == '_blank'){
            window.open(link, '_blank');
          }else{
            $('.ept_swipe').removeClass('ept_swipe--animate');
            setTimeout(function() {
                window.location.href = link;
            }, 500);
          }
        }
    });
});
