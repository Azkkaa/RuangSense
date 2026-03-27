document.getElementById('generateKey').addEventListener('click', () => {
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    let result = '';

    // Generate tepat 12 karakter
    for (let i = 0; i < 12; i++) {
        result += characters.charAt(Math.floor(Math.random() * characters.length));
    }

    const randomKey = result;
    document.getElementById('api_key').value = randomKey;
});

const alertContainer = document.getElementById('alert-container');
const display = document.getElementById('displayDataSuccess');

function showAlert(message, type) {
    const alertConfig = {
        error: {
            classes: 'bg-red-50 text-red-700 border border-red-200 dark:bg-red-900/30 dark:text-red-300 dark:border-red-800',
            icon: '<i class="fa-solid fa-circle-exclamation"></i>'
        },
        success: {
            classes: 'bg-green-50 text-green-700 border border-green-200 dark:bg-green-900/30 dark:text-green-300 dark:border-green-800',
            icon: '<i class="fa-solid fa-circle-check"></i>'
        }
    }
    const config = type == 'error' ? alertConfig.error : alertConfig.success
    const baseClass = "p-4 mb-4 rounded-lg flex items-center gap-3 shadow-sm animate-fade-in-up";
    alertContainer.innerHTML = `
    <div class="${baseClass} ${config.classes}">
        ${config.icon} <span>${message}</span>
    </div>`;

}

function displaySuccessData(device) {

    display.innerHTML = `
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm p-4">
            <div class="bg-white dark:bg-gray-800 w-[90%] max-w-md rounded-2xl shadow-2xl overflow-hidden animate-fade-in-up">
                <div class="bg-blue-600 p-6 text-center text-white">
                    <i class="fa-solid fa-circle-check text-5xl mb-2"></i>
                    <h2 class="text-xl font-bold">Device Registered!</h2>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex justify-between border-b pb-2 dark:border-gray-700">
                        <span class="text-gray-500">Name:</span>
                        <span class="font-bold dark:text-white">${device.name}</span>
                    </div>
                    <div class="flex justify-between border-b pb-2 dark:border-gray-700">
                        <span class="text-gray-500">API Key:</span>
                        <span class="font-mono text-blue-500">${device.api_key}</span>
                    </div>
                    <button id="closeDisplay" class="w-full py-3 bg-gray-800 text-white rounded-xl hover:bg-gray-900 transition mt-4">
                        Done
                    </button>
                </div>
            </div>
        </div>
    `;
    display.querySelector('#closeDisplay').onclick = () => display.innerHTML = '';
}

document.getElementById('deviceForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const submitBtn = document.getElementById('submitBtn');
    const originalText = submitBtn.innerHTML;
    const route = document.querySelector('meta[name="route"]').content;

    const formData = {
        device_name: document.getElementById('device_name').value,
        api_key: document.getElementById('api_key').value
    };

    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin mr-2"></i> Saving...';

    try {
        const response = await fetch(route, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            },
            body: JSON.stringify(formData)
        });

        const result = await response.json();

        if (response.ok) {
            showAlert(result.message, 'success');
            this.reset();
            displaySuccessData(result.data);
        } else {
            showAlert(result.message || 'Validation Error', 'error');
        }
    } catch (err) {
        showAlert('Server Error: ' + err.message, 'error');
    } finally {
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;
    }
});
