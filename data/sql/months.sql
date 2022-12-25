CREATE TABLE IF NOT EXISTS Months (
    id          INTEGER NOT NULL AUTO_INCREMENT,
    year        INTEGER NOT NULL,
    month       INTEGER NOT NULL,
    salary      INTEGER NOT NULL,
    targetHours INTEGER NOT NULL,
    avgSalary   INTEGER NOT NULL,

    CONSTRAINT PRIMARY KEY (id DESC),
    CONSTRAINT UNIQUE KEY (year DESC, month DESC)
);
