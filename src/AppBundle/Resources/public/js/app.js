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
            this.$http.get('/startWorkDay', {params:  {page: 'page'}} ).then(
                function (response) {
                    //look into the routes file and format your response
                    this.$set('items', response.data.data.data);
                    this.$set('pagination', response.data.pagination);

                }, function (error) {
                    // handle error
                });
        },
        stopDay: function () {
            this.$http.get('/stopWorkDay').then((resp) => {
                console.log(JSON.stringify(resp.data));
            });
        },
        coffeeBreak: function () {
            this.$http.get('/coffeeBreak').then((resp) => {
                console.log(JSON.stringify(resp.data));
            });
        }
    }
});
