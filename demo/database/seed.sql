CREATE TABLE `configs`(
    `id` varchar(64) not null primary key,
    `value` varchar(128) null,
    `ts_created_on` timestamp not null default CURRENT_TIMESTAMP,
    `ts_created_on` timestamp null,
    `ts_created_on` timestamp null
);

CREATE TABLE `users` (
    `id` CHAR(36) not null primary key default (UUID()),
    `username` varchar(128) not null unique index,
    `password_bcrypt` char(255) not null,
    `ts_created_on` timestamp not null default CURRENT_TIMESTAMP,
    `ts_created_on` timestamp null,
    `ts_created_on` timestamp null
);

CREATE TABLE `celebrities` (
    `id` CHAR(36) not null primary key default (UUID()),
    `first_name` varchar(128) not null,
    `last_name` varchar(128) not null,
    `alias` varchar(128) not null,
    `birth_date` date default (null),
    `ts_created_on` timestamp not null default CURRENT_TIMESTAMP,
    `ts_created_on` timestamp null,
    `ts_created_on` timestamp null
);

