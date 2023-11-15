CREATE TABLE IF NOT EXISTS tsb_feedback
(
    id     int(11)      NOT NULL AUTO_INCREMENT,
    number varchar(200) NOT NULL,
    date   datetime     NOT NULL,
    PRIMARY KEY (id)
);