
    $(document).ready(function () {

        divLogin = document.getElementsByClassName("form_div")[0];
        divRegister = document.getElementsByClassName("form_div-reg")[0];

        console.log(divRegister)

        divLogin.style.display = "none";
        divRegister.style.display = "none";
        

        $("#login").click(function(){

            divRegister.style.display = "none";

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

        $("#register").click(function(){

            divLogin.style.display = "none";

            if(($(".form_div-reg").css("display") == "flex")){

                $(".form_div-reg", document).css({ opacity: 1, visibility: "hidden" }).animate({ opacity: 0.0 })
                document.getElementsByClassName("form_div-reg")[0].style.display = "none";

            }else{
                document.getElementsByClassName("form_div-reg")[0].style.display = "flex";
                $(".form_div-reg", document).css({ opacity: 0.0, visibility: "visible" }).animate({ opacity: 1.0 })
                    $(".form_div-reg i").click(function(){
                        $(".form_div-reg", document).css({ opacity: 1, visibility: "hidden" }).animate({ opacity: 0.0 })
                        document.getElementsByClassName("form_div-reg")[0].style.display = "none";
                    })
            }
        })

        

    });

