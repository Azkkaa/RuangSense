const sidebarWrap = document.getElementById('sidebar')

const sidebarMain = sidebarWrap.querySelector('aside#main')

checkingElement();

function checkingElement () {
    if (sidebarMain.classList.contains('-translate-x-full')) {
        createElement()
    } else {
        deleteElement()
    }
}

const sidebarMenu = sidebarMain.querySelector('button#menuButton')
sidebarMenu.addEventListener('click', () => {
    sidebarMain.classList.toggle('-translate-x-full')
    checkingElement()
})

function createElement () {
    const element = document.createElement('aside')
    element.classList.add('fixed', 'left-0', 'top-0', 'z-40', 'h-screen', 'w-16', 'transition-transform', 'bg-white', 'border-r', 'border-gray-200', 'dark:bg-gray-800', 'dark:border-gray-700', 'py-5', 'flex', 'justify-center')
    element.id = 'display'
    element.innerHTML = `
        <div>
            <button
                class="ph-bold ph-list text-2xl dark:text-white hover:bg-blue-800 rounded-full px-1"
            ></button>
        </div>
    `;

    setTimeout(() => {
        sidebarWrap.append(element)
    }, 80);

    element.querySelector('button').addEventListener('click', () => {
        sidebarMain.classList.toggle('-translate-x-full')
        checkingElement()
    })
}

function deleteElement () {
    const sidebarDisplay = sidebarWrap.querySelector('aside#display')

    if (sidebarDisplay) {
        sidebarDisplay.remove()
    }
}
