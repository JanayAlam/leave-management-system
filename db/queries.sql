CREATE DATABASE `leaveboard`;

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
) ENGINE = InnoDB;

CREATE TABLE `leaveboard`.`leaves` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `leave_type` ENUM('unpaid','vacation','sick') NOT NULL,
    `leave_date` DATE NOT NULL,
    `duration` INT NOT NULL,
    `comments` VARCHAR(255) NOT NULL,
    `applier_id` INT NOT NULL,
    `approver_id` INT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

ALTER TABLE `leaves`
ADD CONSTRAINT `approver_fk`
FOREIGN KEY (`approver_id`)
REFERENCES `profiles`(`id`);

ALTER TABLE `leaves`
ADD CONSTRAINT `applier_fk`
FOREIGN KEY (`applier_id`)
REFERENCES `profiles`(`id`);

CREATE TABLE `leaveboard`.`notifications` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `text` VARCHAR(255) NOT NULL,
    `is_read` BOOLEAN NOT NULL DEFAULT false,
    `profile_id` INT NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

ALTER TABLE `notifications`
ADD CONSTRAINT `notification_owner_fk`
FOREIGN KEY (`profile_id`)
REFERENCES `profiles`(`id`);
