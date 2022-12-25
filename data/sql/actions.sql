CREATE TABLE IF NOT EXISTS Actions (
    id        INTEGER      NOT NULL AUTO_INCREMENT,
    taskUrl   VARCHAR(255) NOT NULL,
    date      DATE         NOT NULL,
    startTime TIME         NOT NULL,
    endTime   TIME         NOT NULL,

    CONSTRAINT PRIMARY KEY (id DESC)
);