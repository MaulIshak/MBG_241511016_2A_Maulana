document.addEventListener("DOMContentLoaded", () => {
  const forms = document.querySelectorAll(".delete-form");

  forms.forEach((form) => {
    form.addEventListener("submit", async (e) => {
      e.preventDefault();

      const userId = form.getAttribute("data-id");
      const userName = form.getAttribute("data-name");
      const confirmDelete = confirm(`Apakah Anda yakin ingin menghapus ${userName}?`);
      if (!confirmDelete) return;

      try {
        const response = await fetch(`/users/delete/${userId}`, {
          method: "DELETE",
          headers: {
            "X-Requested-With": "XMLHttpRequest",
            "Content-Type": "application/json",
          },
        });

        if (response.ok) {
          form.closest("tr").remove();
        }

        // Gunakan showAlert bawaan
        showAlert(response, `<strong>${userName}</strong> berhasil dihapus!`, "Gagal menghapus data!");
      } catch (err) {
        // Jika fetch error (misalnya network issue)
        const fakeResponse = { ok: false };
        showAlert(fakeResponse, "", "Terjadi kesalahan: " + err.message);
      }
    });
  });

  //   // Menambahkan event listener ke semua form yang memiliki action delete
  // document.body.addEventListener("submit", async function (e) {
  //   if (e.target && e.target.matches('form[action*="/delete"]') && e.target.id !== "deleteForm") {
  //     e.preventDefault(); // Mencegah form submit secara langsung
  //     deleteButton.disabled = true;
  //     const form = e.target;
  //     const nama = form.dataset.nama || "data ini";
  //     const info = "Data yang dihapus tidak dapat dikembalikan";
  //     // Menyiapkan modal dengan informasi yang relevan
  //     deleteModalBody.innerHTML = `Apakah Anda yakin ingin menghapus <strong>${nama}</strong>?<br><small class="text-muted">${info}</small>`;
  //     deleteForm.action = form.action;
  //     deleteForm.dataset.targetRowSelector = `form[action='${form.getAttribute("action")}']`;
  //     deleteConfirmModal.show();

  //     // Simpan teks asli
  //     const originalText = deleteButton.textContent;
  //     deleteButton.textContent = `${originalText} (menunggu 3 detik...)`;

  //     // Setelah 3 detik, enable kembali
  //     deleteButton.textContent = `${originalText} (3)`;
  //     setTimeout(() => {
  //       deleteButton.textContent = `${originalText} (2)`;
  //       setTimeout(() => {
  //         deleteButton.textContent = `${originalText} (1)`;
  //         setTimeout(() => {
  //           deleteButton.disabled = false;
  //           deleteButton.textContent = originalText;
  //         }, 1000);
  //       }, 1000);
  //     }, 1000);
  //   }
  // });

  // // Event submit pada form konfirmasi
  // deleteForm.addEventListener("submit", async function (e) {
  //   e.preventDefault(); // cegah reload halaman

  //   const url = deleteForm.action;
  //   const targetRow = document.querySelector(deleteForm.dataset.targetRowSelector)?.closest("tr");
  //   try {
  //     const response = await fetch(url, {
  //       method: "DELETE",
  //       headers: {
  //         "Content-Type": "application/json",
  //         "X-Requested-With": "XMLHttpRequest",
  //         "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')?.content || "",
  //       },
  //     });

  //     if (!response.ok) {
  //       throw new Error(`Gagal delete: ${response.status}`);
  //     }
  //     showAlert(response, "Data berhasil dihapus", "Data gagal dihapus");

  //     // Tutup modal
  //     deleteConfirmModal.hide();

  //     // Bisa hapus elemen row dari tabel
  //     // const deletedRow = document.querySelector(`form[action="${url}"]`)?.closest("tr");
  //     if (targetRow) targetRow.remove();

  //     // Atau tampilkan notifikasi
  //     console.log("Delete berhasil");
  //   } catch (err) {
  //     console.error("Error delete:", err);
  //     alert("Terjadi kesalahan saat menghapus data.");
  //     // showAlert(response, "Data berhasil dihapus", "Data gagal dihapus");
  //   }
  // });

  // CONTOH FORM NYA
        //     <form data-nama="${mhs.nama_lengkap}" data-nim="${mhs.nim}" action="/admin/mahasiswa/delete/${mhs.nim}" method="post">
        //     <input type="hidden" name="_method" value="DELETE">
        //     <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Delete</button>
        //   </form>
        // </div>
});
