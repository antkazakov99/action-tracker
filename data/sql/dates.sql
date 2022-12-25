CREATE TABLE IF NOT EXISTS Dates (
    id       INTEGER NOT NULL AUTO_INCREMENT,
    date     DATE    NOT NULL,
    dateType INTEGER NOT NULL, /* 1 - holiday, 2 - workday, 3 - sick day */

    CONSTRAINT PRIMARY KEY (id DESC),
    CONSTRAINT UNIQUE KEY (date DESC)
);