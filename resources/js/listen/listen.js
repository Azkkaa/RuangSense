const apiKey = document.getElementById('apiKey').innerText;

// Elemen UI
const statusBadge = document.getElementById('statusBadge');
const statusText = document.getElementById('statusText');
const statusDot = document.getElementById('statusDot');
const statusPing = document.getElementById('statusPing');

const tempDisplay = document.getElementById('tempDisplay');
const humDisplay = document.getElementById('humDisplay');
const gasDisplay = document.getElementById('gasDisplay');

// Fungsi pembantu untuk membuat template chart agar tidak tulis ulang
function createChart(canvasId, label, color, bgColor) {
    const ctx = document.getElementById(canvasId).getContext('2d');
    return new Chart(ctx, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                label: label,
                data: [],
                borderColor: color,
                backgroundColor: bgColor,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y:{
                    beginAtZero: false
                }
            }
        }
    });
}

const tempChart = createChart('chartTemp', 'Temp', '#f97316', 'rgba(249, 115, 22, 0.1)');
const humChart = createChart('chartHum', 'Hum', '#3b82f6', 'rgba(59, 130, 246, 0.1)');
const gasChart = createChart('chartGas', 'Gas', '#8b5cf6', 'rgba(139, 92, 246, 0.1)');


// Fungsi pembantu Update UI Status
function setDeviceStatus(isOnline) {
    if (isOnline) {
        statusText.innerText = "Online";
        statusText.className = "text-xs font-bold uppercase tracking-wider text-green-600 dark:text-green-400";
        statusDot.className = "relative inline-flex rounded-full h-3 w-3 bg-green-500";
        statusPing.className = "animate-ping absolute inline-flex h-full w-full rounded-full opacity-75 bg-green-400";
    } else {
        statusText.innerText = "Offline";
        statusText.className = "text-xs font-bold uppercase tracking-wider text-red-500";
        statusDot.className = "relative inline-flex rounded-full h-3 w-3 bg-red-500";
        statusPing.className = "absolute inline-flex h-full w-full rounded-full opacity-75 bg-red-400";
    }
}

// 1. Listen Status (dari Scheduler)
window.Echo.channel('Device-' + apiKey)
    .listen('.DeviceStatusUpdate', (e) => {
        console.log('Status Event:', e.status);
        setDeviceStatus(e.status);
    });

// 2. Listen Data Sensor (dari ESP32)
window.Echo.channel('Sensor-' + apiKey)
    .listen('.SensorUpdated', (e) => {
        console.log('Sensor Data:', e.logs);
        const now = new Date().toLocaleTimeString('id-ID', { hour12: false });
        const maxPoints = 10;

        // Fungsi untuk push data & geser grafik
        const updateChartData = (chart, newVal) => {
            chart.data.labels.push(now);
            chart.data.datasets[0].data.push(newVal);
            if (chart.data.labels.length > maxPoints) {
                chart.data.labels.shift();
                chart.data.datasets[0].data.shift();
            }
            chart.update('none');
        };

        updateChartData(tempChart, e.logs.temp);
        updateChartData(humChart, e.logs.humid);
        updateChartData(gasChart, e.logs.gas_value);

        if(e.logs.temp) tempDisplay.innerText = `${e.logs.temp}°C`;
        if(e.logs.humid) humDisplay.innerText = `${e.logs.humid}%`;
        if(e.logs.gas_value) gasDisplay.innerText = e.logs.gas_value;

        const getStatusColor = (status) => {
            const dangerStates = ['danger', 'very hot', 'warning'];
            return dangerStates.includes(status.toLowerCase()) ? 'text-red-500' : 'text-green-500';
        };

        if(e.logs.temp_status) {
            tempStatus.innerText = e.logs.temp_status.replace('_', ' ');
            tempStatus.className = `text-[10px] font-bold uppercase ${getStatusColor(e.logs.temp_status)}`;
        }

        if(e.logs.humid_status) {
            humStatus.innerText = e.logs.humid_status.replace('_', ' ');
            humStatus.className = `text-[10px] font-bold uppercase ${getStatusColor(e.logs.humid_status)}`;
        }

        if(e.logs.gas_status) {
            gasStatus.innerText = e.logs.gas_status;
            gasStatus.className = `text-[10px] font-bold uppercase ${getStatusColor(e.logs.gas_status)}`;
        }

        setDeviceStatus(true);
    });
