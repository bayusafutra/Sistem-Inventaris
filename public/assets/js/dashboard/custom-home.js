var cSpeed = 6000;
var value = $(".s-counter2").text();
$(".s-counter2").countTo({
    from: 0,
    to: value,
    speed: cSpeed,
    formatter: function (value, options) {
        return value
            .toFixed(options.decimals)
            .replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
    },
});
var value = $(".s-counter3").text();
$(".s-counter3").countTo({
    from: 0,
    to: value,
    speed: cSpeed,
    formatter: function (value, options) {
        return value
            .toFixed(options.decimals)
            .replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
    },
});
var value = $(".s-counter4").text();
$(".s-counter4").countTo({
    from: 0,
    to: value,
    speed: cSpeed,
    formatter: function (value, options) {
        return value
            .toFixed(options.decimals)
            .replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
    },
});
var value = $(".s-counter5").text();
$(".s-counter5").countTo({
    from: 0,
    to: value,
    speed: cSpeed,
    formatter: function (value, options) {
        return value
            .toFixed(options.decimals)
            .replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
    },
});
var value = $(".s-counter6").text();
$(".s-counter6").countTo({
    from: 0,
    to: value,
    speed: cSpeed,
    formatter: function (value, options) {
        return value
            .toFixed(options.decimals)
            .replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
    },
});

