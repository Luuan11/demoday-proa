const ctx = document.getElementById('myChart').getContext('2d');
const graficoPie = document.getElementById('graficoPie').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Maio', 'Jun', 'jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        datasets: [{
            label: 'Ganhos',
            data: [12, 19, 8, 5, 7, 3, 6, 10, 9, 9, 16, 14],
            backgroundColor: [
                '#0954B5',
                '#0954B5',
                '#f37735',
                '#f37735',
                '#f37735',
                '#f37735',
                '#f37735',
                '#0954B5',
                '#f37735',
                '#f37735',
                '#0954B5',
                '#0954B5'
            ],
            borderWidth: 1
        }]
    },
    options: {
        reponsive: true,
    }
});

// Gráfico 2 doughnut

const graficoPie2 = new Chart(graficoPie, {
    type: 'doughnut',
    data: {
        labels: ['11', '17', '-6', '-7', '-4', '-5'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                '#0954B5',
                '#0954B5',
                '#f37735',
                '#f37735',
                '#f37735',
                '#f37735'
            ],
            borderWidth: 1
        }]
    },
    options: {
        reponsive: true,
    }
});
