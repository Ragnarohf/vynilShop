const themeSwitch = document.getElementById("themeSwitch");

themeSwitch.addEventListener("change", () => {
  window.location.href = "?themeSwitch=" + themeSwitch.checked;
});
