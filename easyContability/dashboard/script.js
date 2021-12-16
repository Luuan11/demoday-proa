const loadPage = page => { 
    [...document.querySelectorAll('.page')].map(el => el.classList.remove('active'));

    document.querySelector(`#${page}`).classList.add('active');
}

[...document.querySelectorAll('.page-link')].map(el => el.addEventListener('click', e => {
    const page = e.currentTarget.href.split('#').pop();

    loadPage(page);
}));

if (location.hash) {
    loadPage(location.hash.split('#').pop());
}
