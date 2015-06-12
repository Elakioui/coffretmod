<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07/06/15
 * Time: 00:08
 */
require_once(dirname(__FILE__).'/classes/CoffretmodCoffretCategories.php');

class coffretmod extends Module{

     public function __construct()
     {
         $this->name        = 'coffretmod';
         $this->displayName = 'Coffret  4/5';
         $this->description = 'Coffret de 4 et 5 description';
         $this->version     = '0.1';
         $this->author      = 'El akioui zouhaire';
         $this->tab         = 'front_office_features';
         $this->bootstrap   = 'true';
         parent::__construct();

     }

     public function install(){

         parent::install();
         $this->registerHook('displayLeftColumn');

         return true;
     }

    /**
     * displaying in the hook
     * @param $params
     */

    public function hookdisplayLeftColumn($params)
    {
        return $this->display(__FILE__,'displayLeftColumn.tpl');
    }

    /**
     * This function serve to configure the module
     * @return mixed
     */

    public function getContent(){

        $this->assignConfiguration();
        $this->processConfiguration();
        $this->assignConfiguration();
        return $this->display(__FILE__,'getContent.tpl');
    }

    /**
     * Initialise the module configuration content
     */

    public function assignConfiguration(){

         $categoriesNames            = DB::getInstance()->executeS('select '._DB_PREFIX_.'category_lang.name from '._DB_PREFIX_.'category_lang');//get categories names from  database
         $categoriesNames            = $this->deleteDuplicateValues($categoriesNames);//eliminate duplicated values

      //  var_dump($categoriesNames);
        //die();

         $categoriesNamesOldCoffret4 = DB::getInstance()->executeS("select * from ps_coffretmod_categories cc where cc.coffret_name = 'coffret-4' ");//get already submited values for coffret 4
         $categoriesNamesOldCoffret5 = DB::getInstance()->executeS("select * from ps_coffretmod_categories cc where cc.coffret_name = 'coffret-5' ");//get already submited values for coffret 4

        $this->context->smarty->assign('categoriesNames', $categoriesNames);//assign categories names on smarty object
        $this->context->smarty->assign('categoriesNamesOldCoffret4', $categoriesNamesOldCoffret4);//assign already submited categories names on smarty object (coffret 4)
        $this->context->smarty->assign('categoriesNamesOldCoffret5', $categoriesNamesOldCoffret5);//assign already submited categories names on smarty object (coffret 5)

         //var_dump($categoriesNamesOldCoffret5[0]['price']);
         //die();

    }

    /**
     * Add new configuration to database
     */

    public function processConfiguration(){

        if(Tools::isSubmit('coffretmod_coffret_4')){
            $this->addCoffret4();
        }
        elseif(Tools::isSubmit('coffretmod_coffret_5')){
             $this->addCoffret5();
        }
    }

    /**
     * Add coffret 4
     */

    public function addCoffret4()
    {

        $this->context->smarty->assign('confirmationInsertion', 'L\'insertion a été effectué avec succé ');//assign already submited categories names on smarty object (coffret 5)
        $this->context->smarty->assign('badUpdate', 'error lors de validation !!! ');//assign already submited categories names on smarty object (coffret 5)

        $tablevalues     = $this->get4categories('4');//Get first four categories of coffret 4 
        $price_coffret_1 = Tools::getValue('price_coffret_1');//Get price

        $tablevalues['price']        = $price_coffret_1;
        $tablevalues['coffret_name'] = 'coffret-4';

        $existed = $this->coffret4isExisted();//knowing if the coffret exist already

        if(Validate::isFloat($tablevalues['price']) )
        {
            $tablevalues['price']= (float) $tablevalues['price'];

            if ($existed == 0 or $existed == '0')
            {


                if (DB::getInstance()->insert('coffretmod_categories', $tablevalues)) {
                    // $this->context->smarty->assign('confirmationInsertion', 'L\'insertion a été effectué avec succé ');//assign already submited categories names on smarty object (coffret 5)


                } else {
                    //$this->context->smarty->assign('badInsertion', 'error lors de validation !!! ');//assign already submited categories names on smarty object (coffret 5)
                    //echo 'KO';
                    //die();

                }


            } else if ($existed == 1 or $existed == '1')//if existed
            {

                if (DB::getInstance()->update('coffretmod_categories', $tablevalues, "coffret_name = 'coffret-4' ")) {

                    $this->context->smarty->assign('confirmationUpdate', 'La mise à jour a été éffectué avec succée ');//assign already submited categories names on smarty object (coffret 5)


                } else {

                    $this->context->smarty->assign('badUpdate', 'La mise à jour n\'a pas été éffectué avec succée ');//assign already submited categories names on smarty object (coffret 5)

                }

            }
        }  else{

            $this->context->smarty->assign('error_price', 'veuiller saisir un bon prix ');//assign already submited categories names on smarty object (coffret 5)

        }

    }
    /**
     * Check if coffret 4 existed
     */

    public function coffret4isExisted(){

       return  DB::getInstance()->getValue("select count(*) from "._DB_PREFIX_."coffretmod_categories cc where cc.coffret_name = 'coffret-4' " );

    }

    /**
     * Add coffret 5
     */
    public function addCoffret5(){

        $tablevalues                 = $this->get4categories('5');//get first four categories
        $price_coffret_2             = Tools::getValue('price_coffret_2');//get coffret price 2
        $category5                   = Tools::getValue('category_5_5');//get category 5

        $tablevalues['category_5']   = $category5;
        $tablevalues['price']        = $price_coffret_2;
        $tablevalues['coffret_name'] = 'coffret-5';

        $existed = $this->coffret5isExisted();

        if(Validate::isFloat($tablevalues['price']) ) {

            $tablevalues['price']= (float)$tablevalues['price'];

            if ($existed == 0 or $existed == '0') {
                if (DB::getInstance()->insert('coffretmod_categories', $tablevalues)) {


                    //Action to do when a request is executed corectly
                    //echo 'ok';
                    //die();
                } else {
                    //echo 'KO';
                    //die();
                }
            } else if ($existed == 1 or $existed == '1') {

                if (DB::getInstance()->update('coffretmod_categories', $tablevalues, "coffret_name = 'coffret-5' ")) {

                    $this->context->smarty->assign('confirmationUpdate', 'La mise à jour a été éffectué avec succée ');//assign already submited categories names on smarty object (coffret 5)


                } else {

                    $this->context->smarty->assign('badUpdate', 'La mise à jour n\'a pas été éffectué avec succée ');//assign already submited categories names on smarty object (coffret 5)

                }

            }
        }else{

            $this->context->smarty->assign('error_price', 'veuiller saisir un bon prix ');//assign already submited categories names on smarty object (coffret 5)

        }


    }

    /** Knowing if coffret 5 exited
     * @return mixed
     */

    public function coffret5isExisted(){
        return  DB::getInstance()->getValue(" select count(*) from "._DB_PREFIX_."coffretmod_categories cc where cc.coffret_name = 'coffret-5' " );

    }

    /**
     * Get the first four categories
     * @return array
     */
    public function get4categories($coffretNumber)
    {

        $category1       = Tools::getValue('category_1_'.$coffretNumber);
        $category2       = Tools::getValue('category_2_'.$coffretNumber);
        $category3       = Tools::getValue('category_3_'.$coffretNumber);
        $category4       = Tools::getValue('category_4_'.$coffretNumber);

        return  $tablevalues = array(
                                        'category_1'     => $category1,
                                        'category_2'     => $category2,
                                        'category_3'     => $category3,
                                        'category_4'     => $category4
                                    );
    }

    /**
     *  Delete duplicated values in array
     * @param $array
     * @return array
     */

    public function deleteDuplicateValues($array){

        $array_2 = array();
        $i= 1;

        foreach($array as $value){

            $array_2['category_'.$i] =   $value['name'];
            $i++;

        }

        return array_unique($array_2);

    }





}