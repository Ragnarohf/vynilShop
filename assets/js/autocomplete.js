const recherche = document.getElementById("recherche");
let valRecherche;
recherche.addEventListener("keyup", () => {
  valRecherche = recherche.value;
  let data = "recherche=" + valRecherche;
  fetch("./inc/recherche.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: data,
  }).then((response) => {
    return response.json().then((monText) => {
      console.log(monText);
      if (monText.length > 0) {
        monText.forEach((element) => {
          console.dir(element);
        });
      }
    });
  });
});
