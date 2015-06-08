<?php
/**
 * Created by PhpStorm.
 * User: elakioui zouhaire
 * Date: 06/06/15
 * Time: 23:42
 */
    if (!defined('_PS_VERSION_'))
        exit;

    function upgrade_module_0_2($module)
    {
        return Db::getInstance()->execute('
                CREATE TABLE IF NOT EXISTS'._DB_PREFIX_.'coffretmod_categories
                (
                      id_coffretmod_categories int(11) NOT NULL AUTO_INCREMENT,
                      category_1 VARCHAR (120) NOT NULL,
                      category_2 VARCHAR(120)  NOT NULL,
                      category_3 VARCHAR(120)  NOT NULL,
                      category_4 VARCHAR(120)  NOT NULL,
                      category_5 VARCHAR(120)  DEFAULT  NULL,
                      price  DOUBLE(10,2),
                      PRIMARY KEY (id_coffretmod_categories)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

        ');

    }