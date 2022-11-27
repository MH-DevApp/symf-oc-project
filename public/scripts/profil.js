/** @type {NodeListOf<HTMLLIElement>} */
const listOfRowsMenu = document.querySelectorAll('.panel .panel-left ul li');

if (listOfRowsMenu.length) {
  listOfRowsMenu.forEach((row) => {
    /** @type {HTMLAnchorElement} */
    const link = row.querySelector('a');
    if (link) {
      row.addEventListener('click', () => {
        link.click();
      });
    }
  });
}

/** @type {NodeListOf<HTMLUListElement>} */
const ratingsContainer = document.querySelectorAll('.panel .panel-right ul.rating');

if (ratingsContainer.length) {
  ratingsContainer.forEach((ratingContainer) => {
    /** @type {HTMLAnchorElement} */
    const link = ratingContainer.querySelector('a[data-link-game]');
    ratingContainer.addEventListener('click', () => {
      link.click();
    });
  });
}

/** @type {HTMLFormElement} */
const avatarForm = document.querySelector('form[name=picture]');
if (avatarForm) {
  /** @type {HTMLDivElement} */
  const avatar = document.querySelector('.panel-right .avatar');
  /** @type {HTMLInputElement} */
  const inputFile = avatarForm.querySelector('input#picture_file');
  avatar.addEventListener('click', () => {
    inputFile.click();
  });

  inputFile.addEventListener('change', () => {
    avatarForm.submit();
  });
}