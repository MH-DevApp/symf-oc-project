/** @type {HTMLFormElement|null} */
const formPicture = document.querySelector('form[name=picture]');
/** @type {HTMLInputElement|null} */
const inputFilePicture = formPicture && formPicture.querySelector('input[name=\'picture[file]\']');
/** @type {HTMLButtonElement} */
const btnAddPicture = document.querySelector('button[id=\'btn-add-picture\']');

if (inputFilePicture && btnAddPicture) {
  btnAddPicture.addEventListener('click', () => {
    inputFilePicture.click();
  });
  inputFilePicture.addEventListener('change', () => {
    formPicture.submit();
  });
}

/** @type {HTMLImageElement} */
const pictureHeaderSelected = document.querySelector('div.game-header-picture-selected img');
/** @type {NodeListOf<HTMLImageElement>} */
const picturesMinHeader = document.querySelectorAll('div.game-header-pictures-min img');

picturesMinHeader.forEach((img) => {

  img.addEventListener('click',
    (event) => {
    picturesMinHeader.forEach((img) => {
      img.classList.remove('active');
    });
    /** @type {HTMLImageElement} */
    const imgSelected = event.currentTarget;
    imgSelected.classList.add('active');
    pictureHeaderSelected.src = imgSelected.src;
  });
});

// TABS
/** @type {NodeListOf<HTMLLinkElement>} */
/*const btnTabs = document.querySelectorAll('a[data-tabs="tab"]');

btnTabs.forEach((btn) => {
  btn.addEventListener('click', (e) => {
    /!** @type {HTMLLinkElement} *!/
    const button = e.currentTarget;
    if (!button.classList.contains('active')) {
      btnTabs.forEach((btn) => {
        btn.classList.remove('active');
        document.querySelector(
          `.game .game-body-tabs div#${btn.dataset.show}`
        ).classList.remove('active');
      });
      button.classList.add('active');
      document.querySelector(
        `.game .game-body-tabs div#${button.dataset.show}`
      ).classList.add('active');
    }
  });
});*/

// TABS RATING USER
/** @type {NodeListOf<HTMLImageElement>} */
const imgsRating = document.querySelectorAll(
  '#tab-comments .tab-comment-user .rating-score img[data-value]'
);
/** @type {HTMLFormElement} */
const formRating = document
  .querySelector('form[name="comment"]');

/** @type{HTMLInputElement} */
const inputRatingScore = formRating
  .querySelector('input[name="comment[score]"]');

/** @type {HTMLButtonElement} */
const btnCancelEditComment = formRating.querySelector(
  'button#btn-cancel-edit-comment'
);

/** @type {HTMLButtonElement} */
const btnEditComment = document.querySelector(
  '#tab-comments .comments .comment-action button#btn-edit-comment'
);

/** @param value: {number} */
const updateStars = (value) => {
  for (let i=0; i<imgsRating.length; i++) {
    imgsRating[i].src = imgsRating[i]
      .src
      .replace(
        i <= value - 1 ? 'empty' : 'full',
        i <= value - 1 ? 'full' : 'empty'
      );
  }
};

imgsRating.forEach((img) => {
  img.addEventListener('mouseover', (e) => {
    /** @type {HTMLImageElement} */
    const current = e.currentTarget;
    updateStars(parseInt(current.dataset.value));
  });

  img.addEventListener('mouseout', () => {
    updateStars(parseInt(inputRatingScore.value));
  });

  img.addEventListener('click', (e) => {
    /** @type {HTMLImageElement} */
    const current = e.currentTarget;
    inputRatingScore.value = current.dataset.value;
  });
});

if (btnEditComment) {
  btnEditComment.addEventListener('click', () => {
    formRating.classList.remove('hidden');
    btnEditComment.classList.add('hidden');
  });
}

if (btnCancelEditComment) {
  btnCancelEditComment.addEventListener('click', () => {
    formRating.classList.add('hidden');
    btnEditComment.classList.remove('hidden');
  });
}
