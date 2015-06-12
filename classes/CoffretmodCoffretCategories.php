<?php
/**
 *
 * @author  El akioui zouhaire
 * @version  0.1
 * @category classes
 * @Date: 12/06/15
 */

class CoffretmodCoffretCategories  extends ObjectModel{

    /* @var CoffretmodCoffretCategories's id */
    public $idCoffretmodCategories;
    /*@var category 1 */
    public $category1;
    /*@var category 2 */
    public $category2;
    /*@var category 3 */
    public $category3;
    /*@var category 4 */
    public $category4;
    /*@var category 5 */
    public $category5;
    /*@var coffret's price */
    public $price;
    /*@var coffret's name  */
    public $coffretName;

    /**
     * @var array defintion's object corresponding table in database
     */

    public static $definition = array(

            'table'   => 'coffretmod_categories',
            'primary' => 'id_coffretmod_categories',
            'fields'  =>  array(
                'category_1' => array('type' => self::TYPE_STRING,'validate'=> 'isName','required' => true),
                'category_2' => array('type' => self::TYPE_STRING,'validate'=> 'isName','required' => true),
                'category_3' => array('type' => self::TYPE_STRING,'validate'=> 'isName','required' => true),
                'category_4' => array('type' => self::TYPE_STRING,'validate'=> 'isName','required' => true),
                'category_1' => array('type' => self::TYPE_STRING,'validate'=> 'isName','required' => false),
                'price' => array('type' => self::TYPE_FLOAT,'validate'=> 'isFloat','required' => true),
                'coffret_name' => array('type' => self::TYPE_STRING,'validate'=> 'isName','required' => true)
            )
    );

    /**
     * Get coffret object
     * @param $name
     * @return this object
     */
    public static function getCoffret($name){

         return  DB::getInstance()->getRow("select * from "._DB_PREFIX_."coffretmod_categories  where coffret_name = '$name' ");

    }





}