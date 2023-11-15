CREATE TABLE `webtu_catalog_favourites` (
    `USER_ID` int(18) NOT NULL,
    `PRODUCT_ID` int(18) NOT NULL,
    KEY `USER_ID` (`USER_ID`),
    KEY `PRODUCT_ID` (`PRODUCT_ID`),
    CONSTRAINT `b_catalog_favourites_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `b_user` (`ID`),
    CONSTRAINT `b_catalog_favourites_ibfk_2` FOREIGN KEY (`PRODUCT_ID`) REFERENCES `b_iblock_element` (`ID`)
);