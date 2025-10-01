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
const username = document.getElementById("username");
// const tahunMasuk = document.getElementById("tahun_masuk");
const password = document.getElementById("password");
const passwordOptional = document.getElementById("passwordOptional");
const btnSubmit = document.getElementById("btnSubmit");

function checkFormValidity() {
  const inputs = [username, password];
  let allValid = true;

  inputs.forEach((input) => {
    if (!input.classList.contains("is-valid")) {
      allValid = false;
    }
  });

  btnSubmit.disabled = !allValid;
}

// validasi username
username.addEventListener("input", () => {
  const val = username.value.trim();
  if (val === "") {
    setError(username, "Username wajib diisi");
  } else if (!/^[A-Za-z0-9]+$/.test(val)) {
    setError(username, "Username hanya huruf/angka");
  } else if (val.length < 5) {
    setError(username, "Username minimal 5 karakter");
  } else {
    clearError(username);
    checkFormValidity();
  }
});
username.addEventListener("change", checkFormValidity);

// validasi password opsional
if (passwordOptional) {
  passwordOptional.addEventListener("input", () => {
    const val = passwordOptional.value.trim();
    if (val === "") {
      clearError(passwordOptional);
      checkFormValidity();
    } else if (val.length < 8) {
      setError(passwordOptional, "Password minimal 8 karakter");
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
  } else if (val.length < 8) {
    setError(password, "Password minimal 8 karakter");
  } else {
    clearError(password);
    checkFormValidity();
  }
});
password.addEventListener("change", checkFormValidity);
