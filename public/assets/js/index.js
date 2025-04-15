/*===== SHOW NAVBAR  =====*/ 
const showNavbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)

    // Validate that all variables exist
    if(toggle && nav && bodypd && headerpd){
        toggle.addEventListener('click', ()=>{
            // show navbar
            nav.classList.toggle('show')
            // change icon
            toggle.classList.toggle('bx-x')
            // add padding to body
            bodypd.classList.toggle('body-pd')
            // add padding to header
            headerpd.classList.toggle('body-pd')
        })
    }
}

showNavbar('menu-toggle','nav-bar','body-pd','header')

/*===== LINK ACTIVE  =====*/ 
document.addEventListener("DOMContentLoaded", function () {
    const linkColor = document.querySelectorAll(".nav__link");
    const currentPath = window.location.pathname.split("/").pop(); // Ambil nama file dari URL

    linkColor.forEach(link => {
        if (link.getAttribute("href") === currentPath) {
            link.classList.add("active");
        }

        link.addEventListener("click", function () {
            linkColor.forEach(l => l.classList.remove("active"));
            this.classList.add("active");
        });
    });
});
