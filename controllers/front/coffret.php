<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/06/15
 * Time: 18:42
 */

require_once(dirname(__FILE__).'/../../classes/CoffretmodCoffretCategories.php');

class CoffretmodCoffretModuleFrontController extends ModuleFrontController{

    public function initContent()
    {
        parent::initContent();
        $actions_list = array('list' => array('initCoffret4'=>'initCoffret4') );

        $module_action = Tools::getValue('module_action');
        $coffret_name  = Tools::getValue('coffret_name');

       if( $coffret_name == 'coffret4' && isset( $actions_list['list'][$module_action] ) ){
            $this->$actions_list['list'][$module_action]();
        }

    }


    public function initCoffret4($params){

        $coffretmodCoffretCategories = new CoffretmodCoffretCategories();
        $coffret = $coffretmodCoffretCategories::getCoffret('coffret-4');

        $this->context->smarty->assign('coffret', $coffret);//assign already submited categories names on smarty object (coffret 5)

        $this->setTemplate('coffret4.tpl');

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