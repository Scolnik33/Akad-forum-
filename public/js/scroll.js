window.addEventListener('scroll', () => {
    window.localStorage.setItem('scroll', window.scrollY);
});

window.onload = () => {
    window.scrollTo(0, window.localStorage.getItem('scroll'));
};