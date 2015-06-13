{assign var=params value=['module_action' => 'initCoffret',
                             'coffret_name' => 'coffret-4'
                             ]
}

<div>
    <ul>
        <li>
            <a href="{$link->getModuleLink('coffretmod','coffret',$params)}"> coffret 4</a>
        </li>
        <li>
            <a href="http://localhost/prestashop/index.php?fc=module&module=coffretmod&controller=coffret5" >coffret 5 </a>
        </li>

    </ul>

</div>
{* <a href="http://localhost/prestashop/index.php?fc=module&module=coffretmod&controller=coffret4">coffret 4</a>*}