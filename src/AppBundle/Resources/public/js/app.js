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
        name: 'Vue.js'
    },
    // определяйте методы в объекте `methods`
    methods: {
        startDay: function (event) {
            fetch('https://jsonplaceholder.typicode.com/posts/1')
                .then((response) => {
                if(response.ok) {
                return response.json();
            }

                throw new Error('Network response was not ok');
            })
            .then((json) => {
                    this.posts.push({
                    title: json.title,
                    body: json.body
                });
            })
            .catch((error) => {
                    console.log(error);
            });
        }
    }
});