  // Ambil elemen modal dan tombol yang akan membukanya
  var modal = document.getElementById("myModal");
  var openModalButton = document.getElementById("openModal");
  var closeButton = document.querySelector(".close");

  // Tampilkan modal saat tombol dibuka
  openModalButton.addEventListener("click", function () {
      modal.style.display = "block";
  });

  // Sembunyikan modal saat tombol close diklik atau latar belakang modal diklik
  closeButton.addEventListener("click", function () {
      modal.style.display = "none";
  });

  // Sembunyikan modal saat latar belakang modal diklik
  window.addEventListener("click", function (event) {
      if (event.target === modal) {
          modal.style.display = "none";
      }
  });