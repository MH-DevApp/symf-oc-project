/** @type {HTMLFormElement|null} */
const formPicture = document.querySelector('form[name=picture]');
/** @type {HTMLInputElement|null} */
const inputFilePicture = formPicture && formPicture.querySelector('input[name=\'picture[file]\']');
/** @type {HTMLButtonElement} */
const btnAddPicture = document.querySelector('button[id=\'btn-add-picture\']');
/** @type {HTMLLinkElement} */
const btnDeletePicture = document.querySelector('a[id=\'btn-delete-picture\']');

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
    btnDeletePicture.href = btnDeletePicture.dataset.prototype.replace('idPicture', imgSelected.dataset.picture);
  });
});

// EDIT GAME (Name, Platforms, Description)
/** @type {HTMLDivElement} */
const formNamePlatforms = document.querySelector('div#form_game_edit_name_platforms');
/** @type {HTMLDivElement} */
const formDescription = document.querySelector('div#form_game_edit_description');

if (formNamePlatforms && formDescription) {
  /** @type {HTMLDivElement} */
  const divEditNamePlatformsContent =  document.querySelector('div.game-header-title-content');
  /** @type {HTMLButtonElement} */
  const btnEditNamePlatforms = divEditNamePlatformsContent.querySelector('.game-header-title-content button#btn-edit-name-platforms');
  /** @type {HTMLButtonElement} */
  const btnEditCancelNamePlatforms = formNamePlatforms.querySelector('button#btn-edit-cancel-title-platforms');
  /** @type {HTMLInputElement} */
  const inputName = formNamePlatforms.querySelector('input[name="game[name]"]');
  /** @type {NodeListOf<HTMLInputElement>} */
  const inputPlatforms = formNamePlatforms.querySelectorAll('input[name="game[platformsSelected][]"]');
  /** @type {boolean[]} */
  let oldPlatforms = [];
  /** @type {string} */
  let oldName = inputName.value;

  /** @type {HTMLDivElement} **/
  const divTabAboutContent = document.querySelector('.game .game-body-tabs #tab-about .tab-about-content');
  /** @type {HTMLButtonElement} */
  const btnEditDescription = divTabAboutContent.querySelector('button#btn-edit-description');
  /** @type {HTMLButtonElement} */
  const btnCancelEditDescription = formDescription.querySelector('button#btn-cancel-edit-description')
  /** @type {HTMLInputElement} */
  const inputDescription = formDescription.querySelector('textarea[name="game[description]"]');
  /** @type {string} */
  let oldDescription = inputDescription.value;

  inputPlatforms.forEach((p) => oldPlatforms.push(p.checked));

  btnEditNamePlatforms.addEventListener('click', () => {
    divEditNamePlatformsContent.classList.add('hidden');
    formNamePlatforms.classList.remove('hidden');
    if (!formDescription.classList.contains('hidden')) {
      btnCancelEditDescription.click();
    }
  });

  btnEditCancelNamePlatforms.addEventListener('click', () => {
    inputName.value = oldName;
    inputPlatforms.forEach((p, index) => {
      p.checked = oldPlatforms[index];
    });
    divEditNamePlatformsContent.classList.remove('hidden');
    formNamePlatforms.classList.add('hidden');
  });

  btnEditDescription.addEventListener('click', () => {
    divTabAboutContent.classList.add('hidden');
    formDescription.classList.remove('hidden');
    if (!formNamePlatforms.classList.contains('hidden')) {
      btnEditCancelNamePlatforms.click();
    }
  });

  btnCancelEditDescription.addEventListener('click', () => {
    inputDescription.value = oldDescription;
    divTabAboutContent.classList.remove('hidden');
    formDescription.classList.add('hidden');
  });
}

// TABS RATING USER
/** @type {HTMLFormElement} */
const formRating = document
  .querySelector('form[name="comment"]');

if (formRating) {
  /** @type {NodeListOf<HTMLImageElement>} */
  const imgsRating = document.querySelectorAll(
    '#tab-comments .tab-comment-user .rating-score img[data-value]'
  );

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
}
