/** @type {NodeListOf<HTMLDivElement>} */
const articles = document.querySelectorAll('article.card');

if (articles) {
  articles.forEach((article) => {
    article.addEventListener('click', () => {
      /** @type {HTMLLinkElement} */
      const link = article.querySelector('a[data-link]');
      if (link) {
        link.click();
      }
    })
  });
}