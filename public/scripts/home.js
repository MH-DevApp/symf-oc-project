// LINK ARTICLE ELEMENT TO VIEW GAME
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
    });
    // TIME NEXT IMAGES IN CARD ON MOUSE OVER
    let timeoutImagesCard = null;
    /** @type {NodeListOf<HTMLImageElement>} */
    const images = article.querySelectorAll('.card-img img[data-picture]');
    let indexShowImage = 0;
    const nextImageInCard = () => {
      images[indexShowImage].classList.add('hidden');
      indexShowImage = indexShowImage < images.length - 1 ? indexShowImage + 1 : 0;
      images[indexShowImage].classList.remove('hidden');
    }
    article.addEventListener('mouseover', () => {
      timeoutImagesCard = setInterval(nextImageInCard, 1000);
    });

    article.addEventListener('mouseout', () => {
      clearInterval(timeoutImagesCard);
    });
  });
}