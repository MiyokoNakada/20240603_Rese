
//drawer menu
const target = document.getElementById("menu");
target.addEventListener("click", () => {
    target.classList.toggle("open");
    const nav = document.getElementById("nav");
    nav.classList.toggle("in");
});

//search function
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.search__option').forEach(function(element) {
        element.addEventListener('change', function() {
            document.querySelector('.admin__search-form').submit();
        });
    });
});


//favourite function
document.addEventListener('DOMContentLoaded', function() {
    const favouriteButtons = document.querySelectorAll('.shops-cards__favourite');

    favouriteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const userId = this.dataset.userId;
            const shopId = this.dataset.shopId;
            const isFavourited = this.classList.contains('favourited');

            const url = isFavourited ? '/unfavourite' : '/favourite';

            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    user_id: userId,
                    shop_id: shopId
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    this.classList.toggle('favourited');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
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
-
    timeInput.addEventListener('input', () => {
        displayTime.textContent = timeInput.value || '00:00';
    });

    numberInput.addEventListener('input', () => {
        displayNumber.textContent = numberInput.value || '0人';
    });
});

