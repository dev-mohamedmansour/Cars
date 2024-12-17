// const singupBtn = document.querySelector(".signupBtn");
// const loginBtn = document.querySelector(".loginBtn");
// const moveBtn = document.querySelector(".moveBtn");
// const singup = document.querySelector(".singup");
// const login = document.querySelector(".login");
// loginBtn.addEventListener("click", () => {
//     moveBtn.classList.add("rightBtn");
//     login.classList.add("loginForm");
//     singup.classList.remove("singupForm");
//     moveBtn.innerHTML = "Login";
// })

// singupBtn.addEventListener("click", () => {
//     moveBtn.classList.remove("rightBtn");
//     login.classList.remove("loginForm");
//     singup.classList.add("singupForm");
//     moveBtn.innerHTML = "Singup";
// })


const detailsBtn = document.querySelector(".detailsBtn");

const orderBtn = document.querySelector(".orderBtn");

const moveBtn = document.querySelector(".moveBtn");

const details = document.querySelector(".details");

const order = document.querySelector(".order");


detailsBtn.addEventListener("click", () => {

    moveBtn.classList.remove("rightBtn");

    order.classList.remove("orderForm");

    details.classList.add("detailsForm");

    moveBtn.innerHTML = "details";
})
orderBtn.addEventListener("click", () => {

    moveBtn.classList.add("rightBtn");

    order.classList.add("orderForm");

    details.classList.remove("detailsForm");

    moveBtn.innerHTML = "order";
})
