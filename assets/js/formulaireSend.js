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
            document.getElementById("success").innerHTML +=
              result[indice] + "<br>";
          }
        });
      })
      .then((error) => {
        console.log(error);
      });
  });
});
