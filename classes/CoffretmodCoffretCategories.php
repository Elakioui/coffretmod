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
    private $idCoffretmodCategories;
    /*@var category 1 */
    private $category1;
    /*@var category 2 */
    private $category2;
    /*@var category 3 */
    private $category3;
    /*@var category 4 */
    private $category4;
    /*@var category 5 */
    private $category5;
    /*@var coffret's price */
    private $price;
    /*@var coffret's name  */
    private $coffretName;

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

          $coffretArray = DB::getInstance()->getRow("select * from "._DB_PREFIX_."coffretmod_categories  where coffret_name = '$name' ");
          $coffret = new CoffretmodCoffretCategories();

          $coffret->setIdCoffretmodCategories($coffretArray['id_coffretmod_categories']);
          $coffret->setCategory1($coffretArray['category_1']);
          $coffret->setCategory2($coffretArray['category_2']);
          $coffret->setCategory3($coffretArray['category_3']);
          $coffret->setCategory4($coffretArray['category_4']);

           //test if it is coffret 4 or coffret 5
          if(isset($coffretArray['category_5'])){
              $coffret->setCategory5($coffretArray['category_5']);
          }

          $coffret->setPrice( $coffretArray['price'] );
          $coffret->setCoffretName($coffretArray['coffret_name']);

          return $coffret;

    }

    /** Get products category
     * @param $category
     */
    public function getProductsByCategory($category,$idLang, $idShop){

        $sql = "
                select pl.name,pl.description_short
                 from ps_product p ,ps_category c ,ps_category_product cp ,ps_category_lang cl,ps_product_lang pl
                    where p.id_product    =  cp.id_product
                    and   cp.id_category  =  cp.id_category
                    and   c.id_category   =  cl.id_category
                    and   pl.id_product   =  p.id_product
                    and   cl.name         = '$category'
                    and   cl.id_lang      = '$idLang'
                    and   cl.id_shop      = '$idShop'
                    and   pl.id_lang      = '$idLang'
                    and   pl.id_shop      = '$idShop'
               ";

        $products  = DB::getInstance()->executeS($sql);

        return $products;
    }

    /**
     * @return CoffretmodCoffretCategories
     */
    public function getIdCoffretmodCategories()
    {
        return $this->idCoffretmodCategories;
    }

    /**
     * @param CoffretmodCoffretCategories $idCoffretmodCategories
     */
    public function setIdCoffretmodCategories($idCoffretmodCategories)
    {
        $this->idCoffretmodCategories = $idCoffretmodCategories;
    }



    /**
     * @return mixed
     */
    public function getCoffretName()
    {
        return $this->coffretName;
    }

    /**
     * @param mixed $coffretName
     */
    public function setCoffretName($coffretName)
    {
        $this->coffretName = $coffretName;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getCategory5()
    {
        return $this->category5;
    }

    /**
     * @param mixed $category5
     */
    public function setCategory5($category5)
    {
        $this->category5 = $category5;
    }

    /**
     * @return mixed
     */
    public function getCategory4()
    {
        return $this->category4;
    }

    /**
     * @param mixed $category4
     */
    public function setCategory4($category4)
    {
        $this->category4 = $category4;
    }

    /**
     * @return mixed
     */
    public function getCategory3()
    {
        return $this->category3;
    }

    /**
     * @param mixed $category3
     */
    public function setCategory3($category3)
    {
        $this->category3 = $category3;
    }

    /**
     * @return mixed
     */
    public function getCategory2()
    {
        return $this->category2;
    }

    /**
     * @param mixed $category2
     */
    public function setCategory2($category2)
    {
        $this->category2 = $category2;
    }

    /**
     * @return mixed
     */
    public function getCategory1()
    {
        return $this->category1;
    }

    /**
     * @param mixed $category1
     */
    public function setCategory1($category1)
    {
        $this->category1 = $category1;
    }






}