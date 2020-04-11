

DROP TABLE IF EXISTS `pictures`;

CREATE TABLE `pictures`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`picture_name` VARCHAR(5),
	`version` INTEGER DEFAULT 0,
    `CK_UP` INTEGER DEFAULT 0,
    `CK_DOWN` INTEGER DEFAULT 0,
    `TK_UP` INTEGER DEFAULT 0,
    `TK_DOWN` INTEGER DEFAULT 0,
    `SL_UP` INTEGER DEFAULT 0,
    `SL_DOWN` INTEGER DEFAULT 0,
    `KB_UP` INTEGER DEFAULT 0,
    `KB_DOWN` INTEGER DEFAULT 0,
    PRIMARY KEY (`id`),
	INDEX `picture_name_FI_1` (`picture_name`)
) ENGINE=InnoDB;

INSERT INTO `pictures`
(picture_name, version, CK_UP, CK_DOWN, TK_UP, TK_DOWN, SL_UP, SL_DOWN, KB_UP, KB_DOWN) values
('CK1', 1, 0, 0, 0, 0, 0, 0, 0, 0),
('CK2', 2, 0, 0, 0, 0, 0, 0, 0, 0),
('CK3', 3, 0, 0, 0, 0, 0, 0, 0, 0),
('CK4', 4, 0, 0, 0, 0, 0, 0, 0, 0),
('CK5', 5, 0, 0, 0, 0, 0, 0, 0, 0),

('TK1', 1, 0, 0, 0, 0, 0, 0, 0, 0),
('TK2', 2, 0, 0, 0, 0, 0, 0, 0, 0),
('TK3', 3, 0, 0, 0, 0, 0, 0, 0, 0),
('TK4', 4, 0, 0, 0, 0, 0, 0, 0, 0),
('TK5', 5, 0, 0, 0, 0, 0, 0, 0, 0),

('SL1', 1, 0, 0, 0, 0, 0, 0, 0, 0),
('SL2', 2, 0, 0, 0, 0, 0, 0, 0, 0),
('SL3', 3, 0, 0, 0, 0, 0, 0, 0, 0),
('SL4', 4, 0, 0, 0, 0, 0, 0, 0, 0),
('SL5', 5, 0, 0, 0, 0, 0, 0, 0, 0),

('KB1', 1, 0, 0, 0, 0, 0, 0, 0, 0),
('KB2', 2, 0, 0, 0, 0, 0, 0, 0, 0),
('KB3', 3, 0, 0, 0, 0, 0, 0, 0, 0),
('KB4', 4, 0, 0, 0, 0, 0, 0, 0, 0),
('KB5', 5, 0, 0, 0, 0, 0, 0, 0, 0);