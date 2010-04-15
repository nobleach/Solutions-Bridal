<html>
<head>
<script src="scripts/jquery-1.4.2.min.js" type="text/javascript" charset="utf-8"></script>
<script src="scripts/jquery.cycle.lite.min.js" type="text/javascript" charset="utf-8"></script>
<script>
	$(function () {
    var $container = $('#quotes'),
        quotes = [
            {quote: 'quote 1', source: 'person 1'},
            // more quotes here
            {quote: 'quote 20', source: 'person 20'}
    ];
    $(quotes).each(function (i) {
        var quote = this.quote + ' <span>- ' + this.source + '</span>';
        $container.append('<div><p>' + quote + '</p></div>');
    });
    $container.cycle({
        speed: '2000',
        timeout: '10000',
        cleartype: '1' // enable cleartype corrections
    });
});
</script>
</head>
<body>
<div id="quotes">

</div>
</body>
</html>