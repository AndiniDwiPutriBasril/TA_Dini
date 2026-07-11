<div class="bg-gray border border-gray-200 rounded-2xl shadow-lg p-1">

    <!-- Informasi Grafik -->

    <div class="flex items-center justify-between mb-8">

        <div>

            <p class="text-lg text-black-500">

                Monitoring perubahan sudut lutut secara realtime

            </p>

        </div>

        <div class="bg-green-50 border border-green-400 rounded-2xl px-4 py-2">

            <p class="text-sm text-gray-500">

                Target Ideal

            </p>

            <h2
                class="text-2xl font-bold text-green-600">

                90° - 110°

            </h2>

        </div>

    </div>

    <!-- Grafik -->
    <div class="h-[450px]">

        <canvas id="kneeChart"></canvas>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById("kneeChart");

const chart = new Chart(ctx,{

    type: 'line',

    data: {

        labels: [],

        datasets: [{

            label: 'Sudut Lutut',

            data: [],

            borderColor: '#4F46E5',

            backgroundColor: 'rgba(79,70,229,0.15)',

            tension: 0.4,

            fill: true,

            pointRadius: 0,

            pointBackgroundColor: '#4F46E5',

            borderWidth: 3

        }]

    },

    options: {

        responsive: true,

        maintainAspectRatio: false,

        plugins: {

            legend: {

                display: false,

                position: 'bottom'

            }

        },

        scales: {

            y:{

            min:0,

            max:120,

            ticks:{

                stepSize:10,

                color:"#374151",

                font:{
                    size:14,
                    weight:"bold"
                }

            }

            },
            
            x:{

            grid:{

            display:false

            },

            ticks:{

            display:false

            }

            }
            }
            

    }

});

let lastChartUpdate = 0;

function updateRealtimeChart(sudut)
{
    const sekarang = Date.now();

    if(sekarang - lastChartUpdate < 1000)
    {
        return;
    }

    lastChartUpdate = sekarang;

    const waktu = new Date().toLocaleTimeString();

    chart.data.labels.push(waktu);
    chart.data.datasets[0].data.push(sudut);

    if(chart.data.labels.length > 100)
    {
        chart.data.labels.shift();
        chart.data.datasets[0].data.shift();
    }

    chart.update();
}


</script>