(function ($) {
    $.drawLine = function (from, to, svg, offsetX) {
        const fromPos = from.position();
        const toPos = to.position();

        const fromWidth = from.outerWidth();
        const fromHeight = from.outerHeight();
        const toWidth = to.outerWidth();
        const toHeight = to.outerHeight();

        const fromX = fromPos.left + fromWidth / 2 + offsetX;
        const fromY = fromPos.top + fromHeight / 2;
        const toX = toPos.left + toWidth / 2 + offsetX;
        const toY = toPos.top + toHeight / 2;

        const line = $(document.createElementNS('http://www.w3.org/2000/svg', 'line'));
        line.attr({
            x1: fromX,
            y1: fromY,
            x2: toX,
            y2: toY,
            stroke: '#d1d1d6',
            'stroke-width': 1,
            'stroke-linecap': 'round',
        });
        svg.append(line);
    }
})(jQuery);
