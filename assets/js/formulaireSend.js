document.addEventListener("DOMContentLoaded", () => {
  document.forms["uploadMP3"].addEventListener("submit", function (e) {
    e.preventDefault();
    //console.log(e);
    //console.dir(document.forms["uploadMP3"]); //  document.forms["uploadMP3"] = this ici mais on prefere prendre le premierr
    const formData = new FormData(document.forms["uploadMP3"]);
    //console.dir(formData);
    fetch("./validator.php", {
      method: "POST",
      body: formData,
    })
      .then(function (response) {
        response.json().then(function (result) {
          for (let indice in result) {
            if (document.querySelector("#" + indice + "Msg")) {
              document.querySelector("#" + indice + "Msg").remove();
              document.querySelector("#" + indice).style.border =
                "1px solid black";
            }
            // conditions pour evitez que a div se repete
            let divErreur = document.createElement("div");
            divErreur.classList.add("error");
            divErreur.id = indice + "Msg";
            divErreur.innerText = result[indice];
            document.querySelector("#" + indice).after(divErreur);
            document.querySelector("#" + indice).style.border = "1px solid red";
          }
        });
      })
      .then((error) => {
        console.log(error);
      });
  });
});
