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