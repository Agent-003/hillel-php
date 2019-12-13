1) Список всех клиентов
SELECT first_name, last_name, email, company_name, age FROM clients ;

2) Список клиентов который активны (поле is_active)
SELECT first_name, last_name, email, company_name, age FROM clients WHERE is_active=1;

3) Список клиентов возраст которых больше или равно 30
SELECT first_name, last_name, email, company_name, age FROM clients WHERE age>=30;

4) Список клиентов имя которых начинается на В (Вася, Владимир) .
SELECT first_name, last_name, email, company_name, age FROM clients WHERE first_name LIKE 'В%';

5) Сколько клиентов у вас в базе всего
SELECT COUNT(id) FROM clients;

6) Самого старого (по возрасту клиента)
SELECT first_name, last_name, email, company_name, age FROM clients WHERE age=(SELECT MAX(age) FROM clients);

7) Сколько у вас активных клиентов
SELECT COUNT(id) FROM clients WHERE is_active=1;

8) Получить и отсортировать всех клиентов по возрасту
SELECT first_name, last_name, email, company_name, age FROM clients ORDER BY age ASC;

9) Получить и отсортировать всех клиентов по имени
SELECT first_name, last_name, email, company_name, age FROM clients ORDER BY first_name ASC;

10) Посчитать сколько у вас активных клиентов старше 25.
SELECT COUNT(id) FROM clients WHERE age>25;

-----------------------------------------------------------------------------------------------------------------------

Практика на UPDATE и DELETE

1) Изменить возраст на 45 для клиента номер 2 :
UPDATE clients SET age = 45 WHERE id=2;

2) Изменит имя клиенту с номером 1 :
UPDATE clients SET first_name='Антон' WHERE id=1;

3) Деактивировать клиента номер 3 (подсказка - см. поле is_active) :
UPDATE clients SET is_active=0 WHERE id=3;

4) Удалить всех не активных клиентов:
DELETE FROM clients WHERE is_active=0;

5) Удалить всех созданных вами клиентов:
DELETE FROM clients;
или
TRUNCATE TABLE clients;
