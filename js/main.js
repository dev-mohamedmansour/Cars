// responsive header 768px user page
let barn = document.querySelector(".barn");
if (barn) {
    barn.onclick = function () {
        let navbar = document.querySelector(".header .navbar");
        navbar.classList.toggle("open");
    };
}
// page login
window.onload = function () {
    const sign_in_btn = document.querySelector("#sign-in-btn");
    const sign_up_btn = document.querySelector("#sign-up-btn");
    const container = document.querySelector(".container");
    if (sign_up_btn) {
        sign_up_btn.addEventListener("click", () => {
            container.classList.add("sign-up-mode");
        });
    }
    if (sign_in_btn) {
        sign_in_btn.addEventListener("click", () => {
            container.classList.remove("sign-up-mode");
        });
    }
};

// responsive header 768px admin page

let bars = document.querySelector(".btn_bars");
if (bars) {
    bars.onclick = function () {
        let header = document.querySelector(".header .container ul");
        header.classList.toggle("open_2");
    };
}
