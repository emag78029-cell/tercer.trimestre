let indice = 0;
const slides = document.querySelector('.slides');
const total = document.querySelectorAll('.slides img').length;

function moverCarrusel(direccion) {
  indice += direccion;
  if (indice < 0) indice = total - 1;
  if (indice >= total) indice = 0;
  slides.style.transform = `translateX(-${indice * 100}%)`;
}

setInterval(() => moverCarrusel(1), 5000);


function mostrarInfo(id) {
  const info = document.getElementById(id);
  info.style.display = info.style.display === "block" ? "none" : "block";
}
