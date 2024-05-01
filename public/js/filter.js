const filters = document.querySelectorAll('.filter');
const btn = document.querySelector('.invisible_btn');
const input = document.querySelector('.invisible_input');

filters.forEach((item) => {
    item.addEventListener('click', () => {
        input.value = item.innerHTML;
        btn.click();
    }); 
});