

DROP TABLE IF EXISTS `pictures`;

CREATE TABLE `pictures`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`picture_name` VARCHAR(5),
    `ck_up` INTEGER DEFAULT 0,
    `ck_down` INTEGER DEFAULT 0,
    `tk_up` INTEGER DEFAULT 0,
    `tk_down` INTEGER DEFAULT 0,
    `sl_up` INTEGER DEFAULT 0,
    `sl_down` INTEGER DEFAULT 0,
    `kb_up` INTEGER DEFAULT 0,
    `kb_down` INTEGER DEFAULT 0,
    PRIMARY KEY (`id`),
	INDEX `picture_name_FI_1` (`picture_name`)
) ENGINE=InnoDB;

INSERT INTO `pictures` (picture_name, ck_up, ck_down, tk_up, tk_down, sl_up, sl_down, kb_up, kb_down) values ('CK1', 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `pictures` (picture_name, ck_up, ck_down, tk_up, tk_down, sl_up, sl_down, kb_up, kb_down) values ('CK2', 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `pictures` (picture_name, ck_up, ck_down, tk_up, tk_down, sl_up, sl_down, kb_up, kb_down) values ('CK3', 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `pictures` (picture_name, ck_up, ck_down, tk_up, tk_down, sl_up, sl_down, kb_up, kb_down) values ('CK4', 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `pictures` (picture_name, ck_up, ck_down, tk_up, tk_down, sl_up, sl_down, kb_up, kb_down) values ('CK5', 0, 0, 0, 0, 0, 0, 0, 0);

INSERT INTO `pictures` (picture_name, ck_up, ck_down, tk_up, tk_down, sl_up, sl_down, kb_up, kb_down) values ('TK1', 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `pictures` (picture_name, ck_up, ck_down, tk_up, tk_down, sl_up, sl_down, kb_up, kb_down) values ('TK2', 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `pictures` (picture_name, ck_up, ck_down, tk_up, tk_down, sl_up, sl_down, kb_up, kb_down) values ('TK3', 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `pictures` (picture_name, ck_up, ck_down, tk_up, tk_down, sl_up, sl_down, kb_up, kb_down) values ('TK4', 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `pictures` (picture_name, ck_up, ck_down, tk_up, tk_down, sl_up, sl_down, kb_up, kb_down) values ('TK5', 0, 0, 0, 0, 0, 0, 0, 0);

INSERT INTO `pictures` (picture_name, ck_up, ck_down, tk_up, tk_down, sl_up, sl_down, kb_up, kb_down) values ('SL1', 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `pictures` (picture_name, ck_up, ck_down, tk_up, tk_down, sl_up, sl_down, kb_up, kb_down) values ('SL2', 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `pictures` (picture_name, ck_up, ck_down, tk_up, tk_down, sl_up, sl_down, kb_up, kb_down) values ('SL3', 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `pictures` (picture_name, ck_up, ck_down, tk_up, tk_down, sl_up, sl_down, kb_up, kb_down) values ('SL4', 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `pictures` (picture_name, ck_up, ck_down, tk_up, tk_down, sl_up, sl_down, kb_up, kb_down) values ('SL5', 0, 0, 0, 0, 0, 0, 0, 0);

INSERT INTO `pictures` (picture_name, ck_up, ck_down, tk_up, tk_down, sl_up, sl_down, kb_up, kb_down) values ('KB1', 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `pictures` (picture_name, ck_up, ck_down, tk_up, tk_down, sl_up, sl_down, kb_up, kb_down) values ('KB2', 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `pictures` (picture_name, ck_up, ck_down, tk_up, tk_down, sl_up, sl_down, kb_up, kb_down) values ('KB3', 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `pictures` (picture_name, ck_up, ck_down, tk_up, tk_down, sl_up, sl_down, kb_up, kb_down) values ('KB4', 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `pictures` (picture_name, ck_up, ck_down, tk_up, tk_down, sl_up, sl_down, kb_up, kb_down) values ('KB5', 0, 0, 0, 0, 0, 0, 0, 0);