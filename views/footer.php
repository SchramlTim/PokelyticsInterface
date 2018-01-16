<footer class="col-xs-12">
    <div class="col-xs-8 col-xs-offset-2">
        <p>Pokémon und alle relevanten Namen sind Warenzeichen und © von Nintendo 1996-2017</p>
        <p>Pokémon GO ist ein Warenzeichen und © von Niantic, Inc.</p>
        <p>Pokelytics steht in keinem Zusammenhang zu Niantic Inc., The Pokemon Company, oder Nintendo.</p>
        <p>Die genutzten Daten werden von <a href="https://www.gomap.eu">GoMap.eu</a> bezogen.</p>
        <p>Bilder wurden von <a href="http://theartificial.nl">The Artificial</a> erstellt.</p>
        <p><a href="/datenschutz">Datenschutz</a> | <a href="/impressum">Impressum</a></p>
    </div>
</footer>


</body>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
    // Mobile Navigation
    $('.mobile-toggle').click(function() {
        if ($('.main_h').hasClass('open-nav')) {
            $('.main_h').removeClass('open-nav');
        } else {
            $('.main_h').addClass('open-nav');
        }
    });

    /*
    $('.main_h li a').click(function() {
        if ($('.main_h').hasClass('open-nav')) {
            $('.navigation').removeClass('open-nav');
            $('.main_h').removeClass('open-nav');
        }
    });*/

    /*
    // Navigation Scroll - ljepo radi materem
    $('nav a').click(function(event) {
        var id = $(this).attr("href");
        var offset = 70;
        var target = $(id).offset().top - offset;
        $('html, body').animate({
            scrollTop: target
        }, 500);
        event.preventDefault();
    });*/
</script>

</html>