// Select all cards correctly
const cards = document.querySelectorAll(".hov.col-lg-4.wow.animate__slideInUp.card-update");

// Loop through each card and apply functionality
cards.forEach((hov) => {
    const detailsBtn = hov.querySelector(".detailsBtn");
    const orderBtn = hov.querySelector(".orderBtn");
    const moveBtn = hov.querySelector(".moveBtn");
    const details = hov.querySelector(".details");
    const order = hov.querySelector(".order");

    detailsBtn.addEventListener("click", () => {
        moveBtn.classList.remove("rightBtn");
        order.classList.remove("orderForm");
        details.classList.add("detailsForm");
        moveBtn.innerHTML = "details";
    });

    orderBtn.addEventListener("click", () => {
        moveBtn.classList.add("rightBtn");
        order.classList.add("orderForm");
        details.classList.remove("detailsForm");
        moveBtn.innerHTML = "order";
    });
});
