const profil = document.querySelector('header nav .profil');

if (profil) {
  /** @type {HTMLDivElement} */
  const profilDropdown = profil.querySelector('.profil-dropdown');
  /** @type {HTMLImageElement} */
  const arrowCircle = profilDropdown.querySelector('img.arrow-circle');
  /** @type {HTMLDivElement} */
  const profilMenu = profil.querySelector('.profil-menu');

  profilDropdown.addEventListener('click', (e) => {
    e.stopPropagation();
    if (arrowCircle.classList.contains('active')) {
      arrowCircle.classList.remove('active');
      profilMenu.classList.remove('active');
    } else {
      arrowCircle.classList.add('active');
      profilMenu.classList.add('active');
    }
  });

  profilMenu.addEventListener('click', (e) => {
    e.stopPropagation();
  });

  window.addEventListener('click', () => {
    if (
      arrowCircle.classList.contains('active') &&
      profilMenu.classList.contains('active')
    ) {
      arrowCircle.classList.remove('active');
      profilMenu.classList.remove('active');
    }
  });
}