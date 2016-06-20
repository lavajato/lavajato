(function ($) {

    $(document).ready(function () {
        $(".btn-voltar").on("click", function () {
            window.history.back();
        });

        $("form").on("submit", function() {
            $("input").unmask();
        });
    });

})(jQuery);
