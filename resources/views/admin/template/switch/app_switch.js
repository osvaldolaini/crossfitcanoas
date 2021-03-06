var Switch = function () {
    /*Excluir imagem */
    let inputCheckbox = function(){
        $(".switch").click(function() {
        if( $("#slider").is(":checked") == true){
            $('#active').val("1");
            $('.slider i').removeClass("fa-thumbs-down");
            $('.slider i').addClass("fa-thumbs-up");
        }else{
            $('#active').val("0");
            $('.slider i').removeClass("fa-thumbs-up");
            $('.slider i').addClass("fa-thumbs-down");
        }
        });
    }
    let multipleSwitch = function(){
        $(".mswitch").click(function() {
            var data = $(this).data('id')
        if( $("[data-slider="+data+"]").is(":checked") == true){
            $('#'+data+'').val("1");
            $('[data-id='+data+'] .slider i').children().removeClass("fa-thumbs-down");
            $('[data-id='+data+'] .slider i').addClass("fa-thumbs-up");
        }else{
            $('#'+data+'').val("0");
            $('[data-id='+data+'] > .slider i').removeClass("fa-thumbs-up");
            $('[data-id='+data+'] > .slider i').addClass("fa-thumbs-down");
        }
        });
    }
    let dateSwitch = function(){
        $(".dateSwitch").click(function() {
            var data = $(this).data('id')
            var val = $(this).data('value')
        if( $("[data-slider="+data+"]").is(":checked") == true){
            $('#'+data+'').val(val);
            $('[data-id='+data+'] .slider i').children().removeClass("fa-thumbs-down");
            $('[data-id='+data+'] .slider i').addClass("fa-thumbs-up");
        }else{
            $('#'+data+'').val("");
            $('[data-id='+data+'] > .slider i').removeClass("fa-thumbs-up");
            $('[data-id='+data+'] > .slider i').addClass("fa-thumbs-down");
        }
        });
    }

    return{
        init: function(){
            inputCheckbox()
            multipleSwitch()
            dateSwitch()
        }
    }
}()
jQuery(document).ready(function(){
    Switch.init()
})
