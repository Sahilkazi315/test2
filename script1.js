let sidebarNavigationEl = document.getElementById("sidebar-container-navigation");
let sidebarOpen = document.getElementById("open");
let sidebarclose = document.getElementById("slidebar-close");


sidebarOpen.addEventListener("click", () => {
    sidebarNavigationEl.classList.toggle("sidebar-show");
});

sidebarclose.addEventListener("click", () => {
    sidebarNavigationEl.classList.toggle("sidebar-show");
});




