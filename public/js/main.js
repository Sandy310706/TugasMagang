const modal = document.getElementById("modal");
const showModal = document.getElementById("showModal");
const closeModal = document.getElementById("closeModal");

showModal.addEventListener("click", function () {
    modal.classList.remove("hidden");
    modal.classList.add("animate-showModal");
});
closeModal.addEventListener("click", function () {
    modal.classList.add("hidden");
    modalEdit.classList.add("hidden");
});

function modalEdit(idData) {
    const modalEdit = document.getElementById("modalEdit");
    modalEdit.classList.remove("hidden");
}
function closeEditModal() {
    const modalEdit = document.getElementById("modalEdit");
    modalEdit.classList.add("hidden");
}
