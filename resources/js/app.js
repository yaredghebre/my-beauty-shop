import "./bootstrap";

import Alpine from "alpinejs";

import { Datepicker, Input, initTE, Sidenav } from "tw-elements";
initTE({ Datepicker, Input, Sidenav }, { allowReinits: true });

window.Alpine = Alpine;

Alpine.start();

// MODAL Delete
const deleteBtns = document.querySelectorAll(".btn-delete");
const deleteModal = document.getElementById("popup-modal");
const modalTitle = document.getElementById("modal-title");
const confirmDeleteBtn = document.getElementById("confirm-delete");

deleteBtns.forEach((btn) => {
    btn.addEventListener("click", function (event) {
        event.preventDefault();
        const productName = btn.getAttribute("data-product-name");

        modalTitle.innerHTML = `Are you sure you want to delete <span id="product-title">${productName}</span>?`;
        confirmDeleteBtn.addEventListener("click", function () {
            btn.closest("form").submit();
        });

        deleteModal.classList.remove("hidden");
        deleteModal.classList.add("flex");
    });
});

document
    .querySelectorAll('[data-modal-toggle="popup-modal"]')
    .forEach((button) => {
        button.addEventListener("click", () => {
            const modal = button.closest(".modal");
            modal.classList.toggle("hidden");
            modal.classList.toggle("flex");
        });
    });

///////////////////////////////

// TimeOut Message
const messageBanner = document.querySelectorAll(".ms_alert_handle");

if (messageBanner.length > 0) {
    messageBanner.forEach((msgBanner) => {
        setTimeout(function () {
            msgBanner.style.display = "none";
        }, 3000);
    });
}
