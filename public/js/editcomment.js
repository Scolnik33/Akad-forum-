const text = document.querySelector('.comment_text');
const area = document.querySelector('.comment_edit');
const btn_edit = document.querySelector('.comment_btn_edit');
const btn_ready = document.querySelector('.comment_btn_ready');
const area_comment = document.querySelector('.area_comment');
const input_comment = document.querySelector('.input_comment');

btn_edit.addEventListener('click', () => {
    area.classList.toggle('active');
    text.classList.toggle('active');
    btn_edit.classList.toggle('active');
    btn_ready.classList.toggle('active');
});

btn_ready.addEventListener('click', () => {
    input_comment.value = area_comment.value;
});