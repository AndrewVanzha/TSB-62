CREATE TABLE IF NOT EXISTS verification_users
(
    id     int(11) NOT NULL AUTO_INCREMENT,
    abs_id int(12) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS verification_orders
(
    id             int(11)     NOT NULL AUTO_INCREMENT,
    user_id        int(11)     NOT NULL,
    date           datetime    NOT NULL,
    type           varchar(10) NOT NULL,
    email          varchar(255)         DEFAULT '',
    phone_number   varchar(10) NOT NULL,
    status_email   int(1)               DEFAULT 0,
    status_captcha int(1)               DEFAULT 0,
    status_phone   int(1)      NOT NULL DEFAULT 0,
    status         int(1)      NOT NULL DEFAULT 0,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS verification_code
(
    id           int(11)      NOT NULL AUTO_INCREMENT,
    order_id     int(11)      NOT NULL,
    date         datetime     NOT NULL,
    date_expired datetime     NOT NULL,
    type         varchar(30)  NOT NULL,
    code         varchar(255) NOT NULL,
    attempts     int(3)       NOT NULL DEFAULT 0,
    status       int(1)       NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS verification_event
(
    id       int(11)     NOT NULL AUTO_INCREMENT,
    order_id int(11)     NOT NULL,
    date     datetime    NOT NULL,
    name     varchar(50) NOT NULL,
    message  text        NOT NULL,
    PRIMARY KEY (id)
);