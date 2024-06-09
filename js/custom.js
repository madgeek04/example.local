$(document).ready(function() {
            $('#contact-form').submit(function(e) {
                e.preventDefault(); // Предотвращаем стандартное поведение отправки формы
                
                // Получаем данные из формы
                var formData = $(this).serialize();

                // Валидация формы
                var name = $('input[name=name]').val();
                var email = $('input[name=email]').val();
                var message = $('input[name=message]').val();

                if (name == '' || email == '' || message == '') {
                    alert('Пожалуйста, заполните все поля формы');
                    return false;
                }

                // Отправка данных с использованием AJAX
                $.ajax({
                    type: 'POST',
                    url: 'submit.php',
                    data: formData,
                    success: function(response) {
                        // Выводим сообщение об успешной отправке или об ошибке
                        if (response == 'success') {
                            alert('Сообщение успешно отправлено');
                            $('#contact-form')[0].reset(); // Очищаем форму
                        } else {
                            alert('Ошибка при отправке сообщения');
                        }
                    }
                });
            });
        });