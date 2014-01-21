# ADD "type" column to "raid" table

ALTER TABLE raid ADD `type` VARCHAR(45) NULL COMMENT 'Raid type: Normal, Heroic, Flex, ecc' AFTER color;