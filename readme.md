инструкция по установке<br>
1)git clone https://github.com/bogdantarasenko/task.ru.git <br>
2)заходим в папку и делаем composer update<br>
3)заходим в phpmyadmin создаем бд test_task и загружаем дамп (или запускаем миграцию php artisan migrate)<br>
4)если у вас не open server или просто другие параметры подключения к mysql то заходим в /app/config/database.php ищем mysql <br>
и пишем ваши настройки<br>
