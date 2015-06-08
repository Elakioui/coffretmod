<fieldset>
    <h2>Configuration du coffret </h2>
    <!-- coffret 4 form configuration-->
    <div class="panel">
        {if isset($confirmation)}

            <div>
                <div class="alert alert-success">Mise à jour du coffret avec succée </div>
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
                                {if $categoryName.name != 'Accueil'}
                                    <option value="{$categoryName}" > {$categoryName} </option>
                                {/if}
                            {/foreach}

                        </select>
                    </div>
                </div>
            {/for}

            <div class="form-group clearfix">
                <label class="col-lg-3">Prix du coffret 1:</label>
                <div class="col-lg-2">
                    <input type="text" name="price_coffret_1" placeholder="Saisir le prix en Euro" class="'form-control"/>
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
                                {if $categoryName.name != 'Accueil'}
                                    <option value="{$categoryName.name}"> {$categoryName.name} </option>
                                {/if}
                            {/foreach}

                        </select>
                    </div>
                </div>
            {/for}

            <div class="form-group clearfix">
                <label class="col-lg-3">Prix du coffret 2:</label>
                <div class="col-lg-2">
                    <input type="text" name="price_coffret_2" placeholder="Saisir le prix en Euro" class="'form-control"/>
                </div>
            </div>

            <div class="form-group clearfix">
                <div class="col-lg-offset-4 col-lg-2">
                    <input  type="submit" value="Valider" class="form-control" name="coffretmod_coffret_5"/>
                </div>
            </div>
    </div>
    <!-- end form -->
</fieldset>