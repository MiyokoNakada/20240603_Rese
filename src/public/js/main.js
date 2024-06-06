
//drawer menu
const target = document.getElementById("menu");
target.addEventListener("click", () => {
    target.classList.toggle("open");
    const nav = document.getElementById("nav");
    nav.classList.toggle("in");
});

//booking confirmation
document.addEventListener('DOMContentLoaded', () => {
    const dateInput = document.querySelector('.booking-date');
    const timeInput = document.querySelector('.booking-time');
    const numberInput = document.querySelector('.booking-number');

    const displayDate = document.getElementById('display-date');
    const displayTime = document.getElementById('display-time');
    const displayNumber = document.getElementById('display-number');

    dateInput.addEventListener('input', () => {
        displayDate.textContent = dateInput.value || '0000-00-00';
    });

    timeInput.addEventListener('input', () => {
        displayTime.textContent = timeInput.value || '00:00';
    });

    numberInput.addEventListener('input', () => {
        displayNumber.textContent = numberInput.value || '0人';
    });
});
