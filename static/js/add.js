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


    toggleButton.addEventListener('click', function () {
        // Переключаем состояние блока
        slideBlock.classList.toggle('active');

        // Если форма активирована через toggleButton, показываем "Submit", скрываем "Update"
        if (slideBlock.classList.contains('active')) {
            submitButton.classList.add('active');
            updateButton.classList.remove('active');
            // Очищаем инпуты от данных
            userId.value = "";
            loginUserInput.value = "";
            passwordInput.value = "";
            emailInput.value = "";
            accessInput.value = "";
        } else {
            // Если форма закрывается, обе кнопки скрыты
            submitButton.classList.remove('active');
            updateButton.classList.remove('active');
        }
    });

    rows.forEach(row => {
        row.addEventListener('click', function () {
            // Открываем форму, если она скрыта
            slideBlock.classList.add('active');

            // Показываем "Update", скрываем "Submit"
            updateButton.classList.add('active');
            submitButton.classList.remove('active');

            // Заполняем данные формы из строки
            const cells = row.querySelectorAll('td');
            userId.value = cells[0].textContent.trim();
            loginUserInput.value = cells[1].textContent.trim();
            passwordInput.value = cells[2].textContent.trim();
            emailInput.value = cells[3].textContent.trim();
            accessInput.value = cells[4].textContent.trim();
        });
    });

    document.addEventListener('click', function (event) {
        const isClickInsideRow = Array.from(rows).some(row => row.contains(event.target));

        // Если клик не внутри формы, кнопки или строки, закрываем форму
        if (
            !slideBlock.contains(event.target) &&
            event.target !== toggleButton &&
            !isClickInsideRow
        ) {
            slideBlock.classList.remove('active');

            // Скрываем обе кнопки
            submitButton.classList.remove('active');
            updateButton.classList.remove('active');
        }
    });



    clearButton.addEventListener('click', function() {
        document.getElementById('slideForm').reset();
    });
});