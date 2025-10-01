document.addEventListener("DOMContentLoaded", () => {
  const navlinks = document.querySelectorAll(".nav-link");
  console.log(window.location.href);

  navlinks.forEach((link) => {
    console.log(link.href);
    if (link.href === window.location.href) {
      link.classList.add("active");
    } else {
      link.classList.remove("active");
    }
  });
});
