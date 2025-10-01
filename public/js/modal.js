document.addEventListener("DOMContentLoaded", () => {
  const modalEl = document.getElementById("confirmationModal");
  const modalTitle = modalEl.querySelector(".modal-title");
  const modalBody = modalEl.querySelector(".modal-body");
  const modalBtn = document.getElementById("confirmationModalBtn");
  const bootstrapModal = new bootstrap.Modal(modalEl);

  // function show modal with dynamic content
  window.showModal = function ({ title = "Title", body = "", confirmText = "OK", onConfirm = null }) {
    modalTitle.textContent = title;
    modalBody.innerHTML = body;
    modalBtn.textContent = confirmText;

    // clear old handler
    modalBtn.replaceWith(modalBtn.cloneNode(true));
    const newBtn = document.getElementById("confirmationModalBtn");
    if (typeof onConfirm === "function") {
      newBtn.addEventListener("click", () => {
        onConfirm();
        bootstrapModal.hide();
      });
    }

    bootstrapModal.show();
  };
});

// example
// document.querySelectorAll(".btn-delete").forEach(btn => {
//   btn.addEventListener("click", function(e) {
//     e.preventDefault();
//     const url = this.getAttribute("href");
//     const id = this.dataset.id;

//     showModal({
//       title: "Confirm Delete",
//       body: `<p>Yakin ingin menghapus user dengan ID <b>${id}</b>?</p>`,
//       confirmText: "Delete",
//       onConfirm: () => {
//         window.location.href = url; // Aksi yang dilakukan setelah klik "confirm"
//       }
//     });
//   });
// });

// document.getElementById("btnLogout").addEventListener("click", () => {
//   showModal({
//     title: "Add New User",
//     body: `<p> Yakin ingin keluar dari sistem? </p>`,
//     confirmText: "Keluar",
//     onConfirm: () => {

//     },
//   });
// });
