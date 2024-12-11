document.addEventListener('DOMContentLoaded', function() {
    const toggleButton = document.getElementById('toggleButton');
    const updateButton = document.getElementById('updateButton');

    const slideBlock = document.getElementById('slideBlock');
    const clearButton = document.getElementById('clearButton');
    const submitButton = document.getElementById('submitButton');

    const rows = document.querySelectorAll('tr.list-items');
    const loginUserInput = document.getElementById('loginUser');
    const passwordInput = document.getElementById('password');
    const emailInput = document.getElementById('email');
    const accessInput = document.getElementById('access');
    const userId = document.getElementById('userId');
    const whosend = document.getElementById('whosend');
    const message = document.getElementById('message');


    toggleButton.addEventListener('click', function () {
        slideBlock.classList.toggle('active');

        if (slideBlock.classList.contains('active')) {
            submitButton.classList.add('active');
            updateButton.classList.remove('active');
            userId.value = "";
            loginUserInput.value = "";
            passwordInput.value = "";
            emailInput.value = "";
            accessInput.value = "";
            wishesId.value = "";
            whosend.value = "";
            message.value = "";

        } else {
            submitButton.classList.remove('active');
            updateButton.classList.remove('active');
        }
    });

    rows.forEach(row => {
        row.addEventListener('click', function () {
            slideBlock.classList.add('active');

            updateButton.classList.add('active');
            submitButton.classList.remove('active');

            const cells = row.querySelectorAll('td');
            userId.value = cells[0].textContent.trim();

            whosend.value = cells[2].textContent.trim();
            message.value = cells[1].textContent.trim();

            
            loginUserInput.value = cells[1].textContent.trim();
            passwordInput.value = cells[2].textContent.trim();
            emailInput.value = cells[3].textContent.trim();
            accessInput.value = cells[4].textContent.trim();
        });
    });

    document.addEventListener('click', function (event) {
        const isClickInsideRow = Array.from(rows).some(row => row.contains(event.target));

        if (
            !slideBlock.contains(event.target) &&
            event.target !== toggleButton &&
            !isClickInsideRow
        ) {
            slideBlock.classList.remove('active');

            submitButton.classList.remove('active');
            updateButton.classList.remove('active');
        }
    });



    clearButton.addEventListener('click', function() {
        document.getElementById('slideForm').reset();
    });
});