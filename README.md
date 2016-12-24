### Задание 1 
Реализация в папке: [Geometry(case_1)](tree/master/Geometry(case_1))
### Задание 2
Можно использовать ФИО как уникальный ключ, но есть будет только Фамилия и Имя - можно получить повторение.

![N|Solid](http://www.imgzilla.ru/image.uploads/2016-12-25/original-9a576adc520beaa0bf7eaa2b2384c69f.png)

### Задание 3
```sh
SELECT type, MAX(date) as date 
FROM data 
GROUP BY type
```

Тест:

![N|Solid](http://www.imgzilla.ru/image.uploads/2016-12-25/original-6a35893543f974ba190fc025b6404775.png)
Результат:

![N|Solid](http://www.imgzilla.ru/image.uploads/2016-12-25/original-6b96b0c1ddb3bc83582d61164b239f17.png)
