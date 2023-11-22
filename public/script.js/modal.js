  var modal = document.getElementById("myModal");
  var openModalButton = document.getElementById("openModal");
  var closeButton = document.querySelector(".close");

  openModalButton.addEventListener("click", function () {
      modal.style.display = "block";
  });

  closeButton.addEventListener("click", function () {
      modal.style.display = "none";
  });

  window.addEventListener("click", function (event) {
      if (event.target === modal) {
          modal.style.display = "none";
      }
  });
