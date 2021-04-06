-- Создание таблиц
CREATE TABLE IF NOT EXISTS `users`
(
    `id`   INT         NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(67) NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE = InnoDB
    DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS users_contact
(
    user_id    INT NOT NULL,
    contact_id INT NOT NULL
)
    ENGINE = InnoDB
    DEFAULT CHARSET = utf8;

CREATE UNIQUE INDEX users_contact_user_id_contact_id_uindex
	ON users_contact (user_id, contact_id);

-- Заполняем таблицы
INSERT INTO users (id, name)
VALUES (1, 'vlad'),
       (2, 'oleg'),
       (3, 'dima'),
       (4, 'slava'),
       (5, 'nastya'),
       (6, 'olga'),
       (7, 'katya'),
       (8, 'max');

INSERT INTO users_contact (user_id, contact_id)
VALUES (1, 2)
     , (1, 3)
     , (7, 2)
     , (2, 6)
     , (2, 7)
     , (2, 8)
     , (3, 2)
     , (3, 4)
     , (3, 7)
     , (3, 8)
     , (6, 1)
     , (5, 1)
     , (3, 1)
     , (2, 3)
     , (2, 4)
     , (2, 1)
     , (1, 5)
     , (1, 4)
     , (1, 6)
     , (1, 7);


-- Задание 1.1
SELECT u.name, COUNT(uc.user_id)
FROM users u
         LEFT JOIN users_contact uc ON u.id = uc.user_id
GROUP BY u.name
HAVING COUNT(uc.user_id) > 5;

-- Задание 1.2
SELECT u1.name,
       u2.name
FROM users_contact uc
         JOIN users AS u1 ON u1.id = uc.contact_id
         JOIN users AS u2 ON u2.id = uc.user_id
