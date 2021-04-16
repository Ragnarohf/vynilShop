document.addEventListener("DOMContentLoaded", () => {
  document.forms["uploadMP3"].addEventListener("submit", (e) => {
    e.preventDefault();
    console.log(e);
  });
});
