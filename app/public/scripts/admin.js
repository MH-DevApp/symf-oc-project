// Go to view game
/** @type {NodeListOf<HTMLDivElement>} */
const games = document.querySelectorAll('div.games-container');

if (games && games.length) {
  games.forEach((game) => {
    /** @type {HTMLAnchorElement} */
    const link = game.querySelector('a[data-view-game]');
    /** @type {HTMLUListElement} */
    const target = game.querySelector('ul[data-target]');

    target.addEventListener('click', () => {
      link.click();
    });
  });
}