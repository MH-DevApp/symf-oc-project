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

const articleContainerElement = document.querySelector(".articles-container")
const createArticles = (articles) => {
  const createArticleDOM = (article) => {
    const articleDOM = document.createElement("div")
    articleDOM.classList.add("article")
    articleDOM.innerHTML = `
	<img
		src="${article.img}"
		alt="profile"
	/>
	<h2>${article.title}</h2>
	<p class="article-author">${article.author} - ${article.category}</p>
	<p class="article-content">
		${article.content}
	</p>
	<div class="article-actions">
		<button class="btn btn-danger" data-id=${article._id}>Supprimer</button>
	</div>
`
    return articleDOM
  }
  const articlesDOM =
    Array.isArray(articles) ?
      articles.map((article) => createArticleDOM(article)) :
      articles ? [createArticleDOM(articles)] : []
  /*
    Si tu n'es pas à l'aise avec les ternaires
    const articlesDOM = []
    if (Array.isArray(articles)) {
      articlesDOM = articles.map((article) => {
        return createArticleDOM(article)
      })
    } else if (articles) {
      articlesDOM = [createArticleDOM(articles)]
    }
   */
  // Je te conseil de check si articlesDOM ne vaut pas vide au cas où il n'y a pas eu de data via la requête
  if (articlesDOM.length) {
    articleContainerElement.innerHTML = ""
    articleContainerElement.append(...articlesDOM)
    const deleteButtons = articleContainerElement.querySelectorAll(".btn-danger")
    deleteButtons.forEach((button) => {
      button.addEventListener("click", async (event) => {
        try {
          const target = event.target
          const articleId = target.dataset.id
          const response = await fetch(
            `https://restapi.fr/api/articles-sam/${articleId}`,
            {
              method: "DELETE",
            }
          )
          const body = await response.json
          console.log(body)
          fetchArticle()
        } catch (e) {
          console.log("e: ", e)
        }
      })
    })
  }
}