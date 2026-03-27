const searchInput = document.getElementById('searchInput');
const searchForm = document.getElementById('searchForm');
const resultsContainer = document.getElementById('resultsContainer');

function createDeviceCard(device) {
    return `
        <div class="col-span-full text-center">
            <div class="w-20 h-20 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mx-auto mb-4 text-green-600">
                <i class="ph-fill ph-check-circle text-4xl"></i>
            </div>

            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                Device ditemukan
            </h2>

            <p class="text-gray-500 dark:text-gray-400 mt-1">
                Apakah kamu ingin menambahkan device ini ke daftar kamu?
            </p>

            <div class="mt-6 flex justify-center gap-3">
                <a href="/dashboard/device/${device.api_key}" class="px-5 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white font-medium transition">
                    Tambahkan
                </a>

                <button
                    id="btnCancel"
                    class="px-5 py-2 rounded-lg bg-gray-200 hover:bg-gray-300
                        dark:bg-gray-700 dark:hover:bg-gray-600
                        text-gray-700 dark:text-gray-200 transition">
                    Batal
                </button>
            </div>
        </div>
    `;
}

function normalResultContainer() {
    return `
        <div class="col-span-full py-20 text-center">
            <div class="w-20 h-20 bg-gray-200 dark:bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-400">
                <i class="fa-solid fa-microchip text-3xl"></i>
            </div>
            <p class="text-gray-500 dark:text-gray-400 font-medium">Start searching for your device</p>
        </div>
    `;
}

let timeout = null;
const csrf = document.querySelector('meta[name="csrf-token"]').content;

searchForm.addEventListener('submit', async function(e) {
    e.preventDefault();

    resultsContainer.innerHTML = `
        <div class="py-20 text-center">
            <div class="w-20 h-20 bg-gray-200 dark:bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-400">
                <i class="ph-bold ph-gear text-3xl animate-spin"></i>
            </div>
            <p class="text-gray-500 dark:text-gray-400 font-medium">Searching for device</p>
        </div>
    `;

    if (searchInput.length <= 0) {

    }

    const query = searchInput.value;
    await fetch(`api/device/search?q=${query}`, {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'X-CSRF-Token': csrf
        }
    })
    .then(async res => {
        const response = await res.json();

        if (!res.ok) {
            resultsContainer.innerHTML = `
                <div class="col-span-full py-20 text-center">
                    <div class="w-20 h-20 bg-red-100 dark:bg-red-900/30 rounded-full flex items-center justify-center mx-auto mb-4 text-red-500">
                        <i class="ph-fill ph-x-circle text-4xl"></i>
                    </div>

                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                        Device tidak ditemukan
                    </h2>

                    <p class="text-gray-500 dark:text-gray-400 font-medium mt-1">
                        ${response.message}
                    </p>
                </div>
            `;
        } else {
            resultsContainer.innerHTML = createDeviceCard(response.data)
        }
    })
    .catch(e => {
        console.error(e)
    })
})
