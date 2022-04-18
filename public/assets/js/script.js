
setInterval(function () {

    red = (Math.random() * (30 - 40) + 50);
    white = (Math.random() * (1 - 5) + 5);
    black = (Math.random() * (30 - 40) + 50);
    apostared = (Math.random() * 200);
    apostawhite = (Math.random() * 200);
    apostablack = (Math.random() * 200);

}, 3000);

setInterval(function () {

    totalper = 100;


}, 3000);

setInterval(function () {
    var classe = Math.floor((Math.random() * 2));

    var newclass;
    if (classe == 0) {
        newclass = 'text-green';
    }
    if (classe == 1) {
        newclass = 'text-red';
    }
    $('#blackValue').toggleClass(newclass);
}, 2000);




setInterval(function () {


    var valueRed = (Math.random() * 10000).toLocaleString('pt-br', { style: 'currency', currency: 'BRL' });
    var valueapost = (Math.random() * 10000).toLocaleString('pt-br', { style: 'currency', currency: 'BRL' });
    $('#red').text(valueRed);
    $('#redblack').text(valueapost);

    var valueWhite = (Math.random() * 10000).toLocaleString('pt-br', { style: 'currency', currency: 'BRL' });
    var valueapostb = (Math.random() * 10000).toLocaleString('pt-br', { style: 'currency', currency: 'BRL' });
    $('#blackValue').text(valueWhite);
    $('#blackAposta').text(valueapostb);

    if (white < apostawhite) {
        $('#whiteValue').addClass('text-red')

    }
    var valueWhite = (Math.random() * 10000).toLocaleString('pt-br', { style: 'currency', currency: 'BRL' });
    var valueapostw = (Math.random() * 10000).toLocaleString('pt-br', { style: 'currency', currency: 'BRL' });
    $('#whiteValue').text(valueWhite);
    $('#whiteAposta').text(valueapostw);

}, 3000);


lucro = 0;

setInterval(function () {
    // lucro = (Math.random() * 500);

    var valueSum = lucro += (Math.random() * 2000);
    var value = valueSum.toLocaleString('pt-br', { style: 'currency', currency: 'BRL' });

    $('#lucro').text(value);

}, 2000);

total = 0;

setInterval(function () {

    var totalSum = total += (Math.random() * 10000);
    var value = totalSum.toLocaleString('pt-br', { style: 'currency', currency: 'BRL' });

    $('#total').text(value);

}, 5000);




var ctx = document.getElementById('myChart');
var chart = new Chart(ctx, {
    type: 'pie',
    data: {

        datasets: [{
            data: [(Math.random() * 10000), (Math.random() * 10000), (Math.random() * 10000)],
            backgroundColor: [
                '#FF0000',
                '#000000',
                '#F1EAEA',

            ],
            borderColor: [
                '#FF0000',
                '#000000',
                '#F1EAEA',

            ],
            borderWidth: 1
        }]
    },
    options: {

    },



});


setInterval(function () {
    $.ajax({
        url: 'getClass',
        success: function (data) {
            $('#redval').text(`${data.red} - ${data.v2.toFixed(2)}%`);
            $('#whiteval').text(`${data.white} - ${data.v3.toFixed(2)}%`);
            $('#blackval').text(`${data.black} - ${data.v1.toFixed(2)}%`);
        },

    });


}, 2000);
setInterval(function () {
    addData(chart);
}, 2000);



function addData(chart) {

    chart.data.datasets[0]
    $.ajax({
        url: 'getClass',
        success: function (data) {
            console.log(data.black)
            chart.data.datasets[0].data[0] = data.red;
            chart.data.datasets[0].data[1] = data.black;
            chart.data.datasets[0].data[2] = data.white;
            chart.update();
        },

    });

}


setInterval(function () {

    $.ajax({
        url: 'getDados',
        success: function (data) {
            var seconds = new Date();
            seconds.setSeconds(seconds.getSeconds() + 5);
            // console.log(seconds);
            // console.log(data[0].created_at);

            $.each(data, (key, value) => {
                console.log($('.result').find(`.roulette-id-${value.id}`).length);
                if ($('.result').find(`.roulette-id-${value.id}`).length == 0) {
                    $('.result').append(`<div class="entry roulette-id-${value.id}">
                    <div class="roulette-tile">
                        <div class="sm-box ${value.class_name}">
                            <div class="number">${value.number}
                            </div>
                        </div>
                    </div>
                </div>`)
                }
            }
            );
        },

    });
    // console.log(classe);
}, 2000);


