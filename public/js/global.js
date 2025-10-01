// Buat alert untuk keberhasilan mengambil
function showAlert(response, succMsg, errMsg) {
  const exisistingAlert = document.querySelector(".alert");
  if (exisistingAlert) exisistingAlert.remove();

  const main = document.querySelector("main");
  const alert = document.createElement("div");
  alert.classList.add("alert");
  if (response.ok) {
    alert.classList.add("alert-success");
    alert.innerHTML = succMsg;
  } else {
    alert.classList.add("alert-danger");
    alert.innerHTML = errMsg;
  }
  main.prepend(alert);
}
