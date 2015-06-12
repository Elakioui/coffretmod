<fieldset>
    <h2>Configuration du coffret </h2>
    <!-- coffret 4 form configuration-->
    <div class="panel">

        {if isset($confirmationUpdate) }

            <div>
                <div class="alert alert-success">Mise à jours réussis</div>
            </div>

         {/if}

      <div class="pannel-heading">
          <legend><img src="../img/admin/cog.gif" alt="configuration" width="16"> Configuration du coffret 4</img></legend>
      </div>

        <form action="" method="post">
            {for $i=1 to 4}
                <div class="form-group clearfix">
                    <label class="col-lg-3">Choisir la Catégorie {$i}:</label>
                    <div class="col-lg-4">
                        <select class="form-control" name="category_{$i}_4">

                            {foreach from=$categoriesNames item=categoryName }

                                    {if $categoryName != 'Accueil'}

                                       {if  $categoryName  eq $categoriesNamesOldCoffret4[0].{"category_$i"}}

                                            <option value="{$categoryName}" selected> {$categoryName}  </option>
                                          {else}

                                           <option value="{$categoryName}"> {$categoryName} </option>
                                       {/if}
                                    {/if}


                            {/foreach}

                        </select>
                    </div>
                </div>
            {/for}



                {if isset( $error_price ) }
                    <div class="col-lg-offset-3 col-lg-7  alert alert-danger">
                        Mauvais prix !!
                    </div>

                {/if}


            <div class="form-group clearfix">
                <label class="col-lg-3">Prix du coffret 1 en Euro:</label>
                <div class="col-lg-2">

                    <input type="text" name="price_coffret_1" placeholder="Saisir le prix en Euro" class="'form-control" value="{$categoriesNamesOldCoffret4[0].price}" />



                </div>
            </div>

            <div class="form-group clearfix">
                <div class="col-lg-offset-4 col-lg-2">
                    <input  type="submit" value="Valider" class="form-control" name="coffretmod_coffret_4" />
                </div>
            </div>
    </div>
    <!-- end form -->

    <!-- Coffret 5 form  -->

    <div class="panel">
        <div class="pannel-heading">
            <legend><img src="../img/admin/cog.gif" alt="configuration" width="16"> Configuration du coffret 5</img></legend>
        </div>
        <form action="" method="post">
            {for $i=1 to 5}
                <div class="form-group clearfix">
                    <label class="col-lg-3">Choisir la Catégorie {$i}:</label>
                    <div class="col-lg-4">
                        <select class="form-control" name="category_{$i}_5">

                            {foreach from=$categoriesNames item=categoryName }
                                {if $categoryName != 'Accueil'}
                                    {if  $categoryName  eq $categoriesNamesOldCoffret5[0].{"category_$i"}}

                                        <option value="{$categoryName}" selected> {$categoryName}  </option>
                                    {else}

                                        <option value="{$categoryName}"> {$categoryName} </option>
                                    {/if}
                                {/if}
                            {/foreach}

                        </select>
                    </div>
                </div>
            {/for}

            {if isset( $error_price ) }
                <div class="col-lg-offset-3 col-lg-7  alert alert-danger">
                    Mauvais prix !!
                </div>

            {/if}


            <div class="form-group clearfix">
                <label class="col-lg-3">Prix du coffret 2 en Euro:</label>
                <div class="col-lg-2">
                    <input type="text" name="price_coffret_2" placeholder="Saisir le prix en Euro" class="'form-control" value="{$categoriesNamesOldCoffret5[0].price}"/>
                </div>
            </div>

            <div class="form-group clearfix">
                <div class="col-lg-offset-4 col-lg-2">
                    <input  type="submit" value="Valider" class="form-control" name="coffretmod_coffret_5" />
                </div>
            </div>
    </div>
    <!-- end form -->
</fieldset>