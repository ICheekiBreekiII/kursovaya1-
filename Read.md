## read.php
### Описание
Возвращает список врачей

### Метод
**GET**

### Параметры
Метод не принимает параметров

### Результат 
После успешного выполнения возвращает массив объектов врачей. В случае, если массив пустой - вернет код `404`.
|Название|Тип|Описание|
|--------|---|--------|
|POSITION|varchar(20)|Должность врача|
|NAME|varchar(20)|Имя врача|
|SURNAME|varchar(20)|Фамилия врача|
|MIDDLENAME|varchar(20)|Отчество|
|ROOMNUM|integer|Номер кабинета|


### Пример ответа
`{"records":[{"POSITION":"Терапевт","NAME":"Иван","SURNAME":"Иванов","MIDDLENAME":"Иванович", "ROOMNUM":"302"},{"POSITION":"Педиатр","NAME":"Анна","SURNAME":"Леонова","MIDDLENAME":"Александрова", "ROOMNUM":"101"}}`

