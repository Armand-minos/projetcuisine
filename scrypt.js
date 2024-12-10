$(document).ready(function() {
    var toutesLesEtoiles = $('.stars .star');

    toutesLesEtoiles.click(onStarClick);

    function onStarClick(event) {
        var etoileCliquée = $(event.currentTarget);
        var indexCliqué = etoileCliquée.data("index");
        var parent = etoileCliquée.parent();

        parent.find('.star').addClass('stargrey').removeClass('yellow');

        for (var i = 0; i <= indexCliqué; i++) {
            var etoile = parent.find('.star[data-index=' + i + ']');
            etoile.addClass('yellow').removeClass('stargrey');
        }
    }
});

