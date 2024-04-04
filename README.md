# Сайт с использованием компонента Bitrix «Получение сертификата»

Шаблон сайта размещен в /main/local/templates.

Авторизация пользователя выполнена на стандартном компоненте bitrix:system.auth.form.

# Компонент «Получение сертификата»

Компонент доступен только авторизованным пользователям.
Пользователю отображаются все ранее им активированные сертификаты с датой активации.

Активация сертификата производится путем ввода номера сертификата в поле. При нажатии кнопки "Активировать" происходит отправка POST-запроса. 
Производится проверка наличия введенного номера сертификата в инфоблоке "Сертификаты" и его статуса. По факту проверки возвращается соответствующий результату пользовательский ответ.
