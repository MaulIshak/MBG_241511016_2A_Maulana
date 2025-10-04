// helper untuk set error
function setError(input, message) {
  input.classList.add("is-invalid");
  input.classList.remove("is-valid");

  input.nextElementSibling.textContent = message;
}

function clearError(input) {
  input.classList.remove("is-invalid");
  input.classList.add("is-valid");

  input.nextElementSibling.textContent = "";
}

// const nim = document.getElementById("nim");
// const namaLengkap = document.getElementById("nama_lengkap");
const email = document.getElementById("email");
// const tahunMasuk = document.getElementById("tahun_masuk");
const password = document.getElementById("password");
const passwordOptional = document.getElementById("passwordOptional");
const btnSubmit = document.getElementById("btnSubmit");

function checkFormValidity() {
  const inputs = [email, password];
  let allValid = true;

  inputs.forEach((input) => {
    if (!input.classList.contains("is-valid")) {
      allValid = false;
    }
  });

  btnSubmit.disabled = !allValid;
}

// validasi email
if (email) {
  email.addEventListener("input", () => {
    // const val = email.value.trim();
    // if (val === "") {
    //   setError(email, "email wajib diisi");
    // } else if (!/^[A-Za-z0-9]+$/.test(val)) {
    //   setError(email, "email hanya huruf/angka");
    // } else if (val.length < 5) {
    //   setError(email, "email minimal 5 karakter");
    // } else {
    //   clearError(email);
    //   checkFormValidity();
    // }
    const val = email.value.trim();
    if (val === "") {
      setError(email, "Email wajib diisi");
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val)) {
      setError(email, "Format email tidak valid");
    } else {
      clearError(email);
      checkFormValidity();
    }
  });
  email.addEventListener("change", checkFormValidity);
}

// validasi password opsional
if (passwordOptional) {
  passwordOptional.addEventListener("input", () => {
    const val = passwordOptional.value.trim();
    if (val === "") {
      clearError(passwordOptional);
      checkFormValidity();
    } else if (val.length < 6) {
      setError(passwordOptional, "Password minimal 6 karakter");
    } else {
      clearError(passwordOptional);
      checkFormValidity();
    }
  });
  passwordOptional.addEventListener("change", checkFormValidity);
}
// validasi password
if (password) {
  password.addEventListener("input", () => {
    const val = password.value.trim();
    if (val === "") {
      setError(password, "Password wajib diisi");
    } else if (val.length < 6) {
      setError(password, "Password minimal 6 karakter");
    } else {
      clearError(password);
      checkFormValidity();
    }
  });
  password.addEventListener("change", checkFormValidity);
}

const bahanBakuForm = document.getElementById("bahanBakuForm");
if (bahanBakuForm) {
  const nama = document.getElementById("nama");
  const kategori = document.getElementById("kategori");
  const satuan = document.getElementById("satuan");
  const tanggalMasuk = document.getElementById("tanggal_masuk");
  const tanggalKadaluarsa = document.getElementById("tanggal_kadaluarsa");
  const jumlah = document.getElementById("jumlah");
  // const status = document.getElementById("status");
  const btnSubmitBahanBaku = document.getElementById("btnSubmit");

  function checkBahanBakuFormValidity() {
    const inputs = [nama, kategori, satuan, tanggalMasuk, tanggalKadaluarsa, jumlah];
    let allValid = true;
    inputs.forEach((input) => {
      if (!input.classList.contains("is-valid")) {
        allValid = false;
      }
    });
    btnSubmitBahanBaku.disabled = !allValid;
  }
  // validasi nama
  nama.addEventListener("input", () => {
    const val = nama.value.trim();
    if (val === "") {
      setError(nama, "Nama wajib diisi");
    } else {
      clearError(nama);
      checkBahanBakuFormValidity();
    }
  });
  nama.addEventListener("change", checkBahanBakuFormValidity);
  // validasi kategori
  kategori.addEventListener("input", () => {
    const val = kategori.value.trim();
    if (val === "") {
      setError(kategori, "Kategori wajib diisi");
    } else {
      clearError(kategori);
      checkBahanBakuFormValidity();
    }
  });
  kategori.addEventListener("change", checkBahanBakuFormValidity);
  // validasi satuan
  satuan.addEventListener("input", () => {
    const val = satuan.value.trim();
    if (val === "") {
      setError(satuan, "Satuan wajib diisi");
    } else {
      clearError(satuan);
      checkBahanBakuFormValidity();
    }
  });
  satuan.addEventListener("change", checkBahanBakuFormValidity);

  // validasi jumlah
  jumlah.addEventListener("input", () => {
    const val = jumlah.value.trim();
    if (val === "") {
      setError(jumlah, "Jumlah wajib diisi");
    } else if (isNaN(val) || parseInt(val) < 0) {
      setError(jumlah, "Jumlah harus berupa angka positif");
    } else {
      clearError(jumlah);
      checkBahanBakuFormValidity();
    }
  });
  jumlah.addEventListener("change", checkBahanBakuFormValidity);
  // validasi tanggal masuk
  tanggalMasuk.addEventListener("input", () => {
    const val = tanggalMasuk.value.trim();
    if (val === "") {
      setError(tanggalMasuk, "Tanggal masuk wajib diisi");
    } else {
      clearError(tanggalMasuk);
      checkBahanBakuFormValidity();
    }
  });
  tanggalMasuk.addEventListener("change", checkBahanBakuFormValidity);
  // validasi tanggal kadaluarsa
  tanggalKadaluarsa.addEventListener("input", () => {
    const val = tanggalKadaluarsa.value.trim();
    if (val === "") {
      setError(tanggalKadaluarsa, "Tanggal kadaluarsa wajib diisi");
    } else {
      clearError(tanggalKadaluarsa);
      checkBahanBakuFormValidity();
    }
  });
  tanggalKadaluarsa.addEventListener("change", checkBahanBakuFormValidity);
}

const permintaanForm = document.getElementById("permintaanForm");
if (permintaanForm) {
  const tanggalMasak = document.getElementById("tanggal_masak");
  const namaMenu = document.getElementById("menu");
  const jumlahPorsi = document.getElementById("jumlah_porsi");
  const bahanBaku = document.querySelectorAll("select[name='bahan_baku[]']");
  const jumlahBahan = document.querySelectorAll("input[name='jumlah_bahan[]']");
  // console.log(bahanBaku);
  // console.log(jumlahBahan);
  const btnSubmitPermintaan = document.getElementById("btnSubmit");

  function checkPermintaanFormValidity() {
    const inputs = [tanggalMasak, namaMenu, jumlahPorsi, ...bahanBaku, ...jumlahBahan];
    let allValid = true;
    inputs.forEach((input) => {
      if (!input.classList.contains("is-valid")) {
        allValid = false;
      }
    });
    btnSubmitPermintaan.disabled = !allValid;
  }
  // validasi tanggal masak
  tanggalMasak.addEventListener("input", () => {
    const val = tanggalMasak.value.trim();
    if (val === "") {
      setError(tanggalMasak, "Tanggal masak wajib diisi");
    } else {
      clearError(tanggalMasak);
      checkPermintaanFormValidity();
    }
  });
  tanggalMasak.addEventListener("change", checkPermintaanFormValidity);
  // validasi nama menu
  namaMenu.addEventListener("input", () => {
    const val = namaMenu.value.trim();
    if (val === "") {
      setError(namaMenu, "Nama menu wajib diisi");
    } else {
      clearError(namaMenu);
      checkPermintaanFormValidity();
    }
  });
  namaMenu.addEventListener("change", checkPermintaanFormValidity);
  // validasi jumlah porsi
  jumlahPorsi.addEventListener("input", () => {
    const val = jumlahPorsi.value.trim();
    if (val === "") {
      setError(jumlahPorsi, "Jumlah porsi wajib diisi");
    } else if (isNaN(val) || parseInt(val) <= 0) {
      setError(jumlahPorsi, "Jumlah porsi harus berupa angka positif");
    } else {
      clearError(jumlahPorsi);
      checkPermintaanFormValidity();
    }
  });
  jumlahPorsi.addEventListener("change", checkPermintaanFormValidity);

  // validasi bahan baku dan jumlah bahan
  bahanBaku.forEach((input, index) => {
    input.addEventListener("input", () => {
      const val = input.value.trim();
      if (val === "") {
        setError(input, "Bahan baku wajib diisi");
      } else {
        clearError(input);
        checkPermintaanFormValidity();
      }
    });
    input.addEventListener("change", checkPermintaanFormValidity);
    // validasi jumlah bahan
    jumlahBahan[index].addEventListener("input", () => {
      const val = jumlahBahan[index].value.trim();
      if (val === "") {
        setError(jumlahBahan[index], "Jumlah bahan wajib diisi");
      } else if (isNaN(val) || parseInt(val) <= 0) {
        setError(jumlahBahan[index], "Jumlah bahan harus berupa angka positif");
      } else {
        clearError(jumlahBahan[index]);
        checkPermintaanFormValidity();
      }
    });
    jumlahBahan[index].addEventListener("change", checkPermintaanFormValidity);
  });
}
