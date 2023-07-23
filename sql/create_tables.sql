CREATE TABLE `leaveboard`.`user` (
    `userId` INT NOT NULL AUTO_INCREMENT,
    `firstName` VARCHAR(20) NOT NULL,
    `lastName` VARCHAR(20) NOT NULL,
    `email` VARCHAR(150) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `role` ENUM('hr','employee') NOT NULL,
    PRIMARY KEY (`userId`),
    UNIQUE `email` (`email`)
) ENGINE = InnoDB;