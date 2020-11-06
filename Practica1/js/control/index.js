window.onload = function(){

    $(document).ready(function () {
        
        document.getElementsByClassName("form_div")[0].style.display = "none"

        $("#login").click(function(){

            if(($(".form_div").css("display") == "flex")){

                $(".form_div", document).css({ opacity: 1, visibility: "hidden" }).animate({ opacity: 0.0 })
                document.getElementsByClassName("form_div")[0].style.display = "none";

            }else{
                document.getElementsByClassName("form_div")[0].style.display = "flex";
                $(".form_div", document).css({ opacity: 0.0, visibility: "visible" }).animate({ opacity: 1.0 })
                    $(".form_div i").click(function(){
                        $(".form_div", document).css({ opacity: 1, visibility: "hidden" }).animate({ opacity: 0.0 })
                        document.getElementsByClassName("form_div")[0].style.display = "none";
                    })
            }
        })
    });

}