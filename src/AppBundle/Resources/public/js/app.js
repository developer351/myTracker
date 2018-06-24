Vue.use(VueResource);
var clock = new Vue({
    el: '#clock',
    delimiters: ['${', '}'],
    data: {
        time: '',
        date: ''
    }
});

var clocke = new Vue({
    el: '#timer',
    data: {
        timer: '',
    }
});

var week = ['ВС', 'ПОН', 'ВТ', 'СР', 'ЧТ', 'ПТ', 'СУБ'];
var timerID = setInterval(updateTime, 1000);
updateTime();

function updateTime() {
    var cd = new Date();
    clocke.timer = zeroPadding(0, 2) + ':' + zeroPadding(0, 2) + ':' + zeroPadding(0, 2);
    clock.time = zeroPadding(cd.getHours(), 2) + ':' + zeroPadding(cd.getMinutes(), 2) + ':' + zeroPadding(cd.getSeconds(), 2);
    clock.date = zeroPadding(cd.getFullYear(), 4) + '-' + zeroPadding(cd.getMonth() + 1, 2) + '-' + zeroPadding(cd.getDate(), 2) + ' ' + week[cd.getDay()];
};

function zeroPadding(num, digit) {
    var zero = '';
    for (var i = 0; i < digit; i++) {
        zero += '0';
    }
    return (zero + num).slice(-digit);
}


var startWorkDay = new Vue({
    el: '#startDay',
    data: {
        debug: true,
        weather: []
    },
    methods: {
        startDay: function () {
            var cd = new Date();
            var time = cd.getHours() + ':' + cd.getMinutes() + ':' + cd.getSeconds();

            this.$http.get('/startWorkDay', {params:  {time: time}} ).then(
                function (response) {
                    if(response.data.success === 'True') {
                        location.href = '/';
                    }
                }, function (error) {
                    // handle error
                });
        },
        stopDay: function () {
            var el = document.querySelector('#stopWork');

            this.$http.get('/stopWorkDay/',{params:  {id: el.getAttribute('data-id')}}).then((resp) => {
                if(response.data.success === 'True') {
                location.href = '/';
                }
            });
        },
        coffeeBreak: function () {
            alert("А хрен! жди) скоро будет =)");
        }
    }
});
