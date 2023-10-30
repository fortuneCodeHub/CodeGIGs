/**
 * Offcanvas Navbar
 */
const navbarBtns = document.querySelectorAll('#offCanvasBtn');
const navBg = document.querySelector('.offcanvas-collapse');
const toggle = (function () {
    return function toggle() {
        navbarBtns.forEach(navbarBtn => {
            navbarBtn.addEventListener('click', function () {
                navBg.classList.toggle('open');
            });
        });
    }
})();
toggle();
/**
 * Navbar Active selector and deselector
 */

const navlink = document.querySelectorAll("#nav-link");

function unsetActive(value) {
    for (let i = 0; i < value.length; i++) {
        const valueArray = value[i].classList;
        for (let a = 0; a < valueArray.length; a++) {
            if (valueArray[a] == "active") {
                valueArray.remove("active");
            }
        }
    }
}

for (let i = 0; i < navlink.length; i++) {
    navlink[i].addEventListener("click", function () {
        const navArray = navlink[i].classList;
        unsetActive(navlink);
        for (let a = 0; a < navArray.length; a++) {
            if (navArray[a] != "active") {
                navArray.add("active");
            }
        }
    });
}
