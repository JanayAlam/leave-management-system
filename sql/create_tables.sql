CREATE TABLE `leaveboard`.`users` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(150) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `role` ENUM('hr','employee') NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE `email` (`email`)
) ENGINE = InnoDB;

CREATE TABLE `leaveboard`.`profiles` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `first_name` VARCHAR(20) NULL,
    `last_name` VARCHAR(20) NULL,
    `dept` ENUM('hr', 'business','sales_and_marketing','development','test','customer_support') NOT NULL,
    `user_id` INT NOT NULL,
    `inviter_id` INT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`),
    FOREIGN KEY (`inviter_id`) REFERENCES `users`(`id`)
)ENGINE = InnoDB;
