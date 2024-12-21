// Select all cards correctly
const cards = document.querySelectorAll(".hov.col-lg-4.wow.animate__slideInUp.card-update");

// Loop through each card and apply functionality
cards.forEach((zip) => {
    const detailsBtn = zip.querySelector(".detailsBtn");
    const orderBtn = zip.querySelector(".orderBtn");
    const moveBtn = zip.querySelector(".moveBtn");
    const details = zip.querySelector(".details");
    const order = zip.querySelector(".order");

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
