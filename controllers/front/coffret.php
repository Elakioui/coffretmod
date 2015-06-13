<?php
/**
 * @Author: Elakioui zouhaire
 * @Category: classes
 * Date: 11/06/15
 *
 */

require_once(dirname(__FILE__).'/../../classes/CoffretmodCoffretCategories.php');

class CoffretmodCoffretModuleFrontController extends ModuleFrontController{

    public function initContent()
    {
        parent::initContent();

        $actions_list = array('list' => array('initCoffret'=>'initCoffret') );
        $module_action = Tools::getValue('module_action');
        $coffret_name  = Tools::getValue('coffret_name');

        if( $coffret_name == 'coffret-4' && isset( $actions_list['list'][$module_action] ) ){

            $this->$actions_list['list'][$module_action]($coffret_name);

        }

    }


    public function initCoffret($name){

        $coffretmodCoffretCategories = new CoffretmodCoffretCategories();
        $coffret = $coffretmodCoffretCategories::getCoffret( $name  );



        $idLang = $this->context->language->id;;//get current used language id
        $idShop = $this->context->shop->id;//get current shop id

        $productsCategory1 = $coffretmodCoffretCategories->getProductsByCategory( $coffret->getCategory1(),$idLang, $idShop);
        $productsCategory2 = $coffretmodCoffretCategories->getProductsByCategory( $coffret->getCategory2(),$idLang, $idShop);
        $productsCategory3 = $coffretmodCoffretCategories->getProductsByCategory( $coffret->getCategory3(),$idLang, $idShop);
        $productsCategory4 = $coffretmodCoffretCategories->getProductsByCategory( $coffret->getCategory4(),$idLang, $idShop);


        $productsCategories = array();
        $productsCategories['productsCategory1'] = $productsCategory1;
        $productsCategories['productsCategory2'] = $productsCategory2;
        $productsCategories['productsCategory3'] = $productsCategory3;
        $productsCategories['productsCategory4'] = $productsCategory4;

        var_dump($productsCategory1);
        //var_dump($coffret->getCategory2());
        //var_dump($coffret->getCategory3());
        //var_dump($coffret->getCategory4());
        die();

        if($name == 'coffret-5'){

            $productsCategory5 = $coffretmodCoffretCategories->getProductsByCategory( $coffret->getCategory5(),$idLang, $idShop);
            $productsCategories['productsCategory5'] = $productsCategory5;
        }


        $this->context->smarty->assign('productsCategories', $productsCategories);//assign already submited categories names on smarty object (coffret 5)


        $this->setTemplate("$name.tpl");

    }

    /**
     * add css and js files
     */
    public function setMedia(){
        //call the parent media
        parent::setMedia();
        //save the module path in a variable
        $this->_path= __PS_BASE_URI__.'modules/coffretmod/';
        //add css files
        $this->context->controller->addCss($this->_path.'views/css/jquery.bxslider.css');
        //add jaascript files
        /*$this->context->controller->addCss($this->_path.'views/js/jquery-1.8.2.min.js');
        $this->context->controller->addCss($this->_path.'views/js/jquery.bxslider.js');*/
        $this->context->controller->addCss($this->_path.'views/js/coffret4.js');

    }


}