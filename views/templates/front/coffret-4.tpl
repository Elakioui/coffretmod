<h2>Composer le coffret 4 </h2>
<div>
    <ul>
        {assign var='i' value=1}

        {foreach from=$productsCategories item=arrays }
            <h2>Categorie {$i++} </h2>
            {foreach from=$arrays item= array }
                <li>
                    {print_r($array['name'])}
                </li>

            {/foreach}
           <h2>-------------------------</h2>

        {/foreach}

    </ul>

</div>


{* {print_r($productsCategories)} *}