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
