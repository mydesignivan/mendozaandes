$(document).ready(function(){
    if ($("#slider").length > 0) {
        $('#slider').cycle({
            fx: "fade",
            slideExpr: "img",

            before: function() {
                /*$("#slide-label").fadeOut();*/
            },
            after: function() {
                /*$("#slide-label").fadeIn().html(this.alt);*/
            }
        });
    }
});
