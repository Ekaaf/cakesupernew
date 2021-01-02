(() => {
    const includes = document.getElementsByTagName('include');
    [].forEach.call(includes, i => {
        let filePath = i.getAttribute('src');
        fetch(filePath).then(file => {
            file.text().then(content => {
                i.insertAdjacentHTML('afterend', content);
                i.remove();
            });
        });
    });
})();


$(document).ready(function(){

    $(function() {

        $('.university-list a').on('click', function(e) {
            $('.university-list').removeClass('selected').addClass('selected');
            $(".active").removeClass("active");
            $(this).addClass("active");
            e.stopPropagation();
        });
    });


    $(function() {
        $(".sidebar-wrap a").click(function(){
            $(".active").removeClass("active");
            $(this).addClass("active");
        });
    });

    $(".sidebar-toggle").click(function(){
        $(this).parent(".sidebar-wrap").toggleClass("hide");
        $(this).parent(".sidebar-wrap").siblings(".main-body-wrapper").toggleClass("show-sidebar");
    });


    $(function () {
        $('#datetimepicker1').datetimepicker();
    });

    $(".multiple-select2").select2({
        placeholder: "Select and press enter",
        allowClear: true,
        width: 'resolve' // need to override the changed default
    });

    $('.dropdown-select2').select2({
        selectOnClose: true
    });

});




