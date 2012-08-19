<?php
require_once('../../_include.php');

// If creation of testeur
if (isset($_POST['nom'])) {
    extract($_POST);

    if (strlen($nom)) {

        if (isset($_POST['pilote'])) {
            $pilote = 'oui';
        } else {
            $pilote = 'non';
        }

        if (isset($_POST['testeur'])) {
            $testeur = 'oui';
        } else {
            $testeur = 'non';
        }

        if (isset($_POST['vehicule'])) {
            $vehicule = 'oui';
        } else {
            $vehicule = 'non';
        }

        $objTesteur = new Testeur(0, $nom, $prenom, $telephone, $email, $dateNaissance, $lieuResi, $pilote, $testeur, $vehicule, $commentaire, $mobile, $adresse, $codePostal);
        $testeurManager = new TesteurManager();
        $testeurManager->addTesteur($objTesteur);

        header('Location: ' . $siteUrl . '/Admin/Testeur');
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Testeurs</title>
        <link rel="stylesheet" href="../../libraries/bootstrap/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="../../css/style.css" type="text/css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="../../libraries/smoothness/jquery-ui-1.8.16.custom.css" type="text/css" />
        <script type="text/javascript" src="../../libraries/jquery.js"></script>
        <script type="text/javascript">
		
            // Create list for drop down of products
<?php
$morphologieManager = new MorphologieManager();
$allMorphologies = $morphologieManager->getAllMorphologies();

foreach (array_keys($allProducts) as $category) {
    ?>
            var tempArray = new Array();
    <?php
    $products = $allProducts[$category];

    if (count($products) > 0) {
        foreach ($products as $product) {
            ?>
                            var morphologie = new Array();
                            product['name'] = "<?php echo $product->getName(); ?>"; 
                            product['id']   = "<?php echo $product->getId(); ?>";
                            tempArray[tempArray.length] = product; 
            <?php
        }
    }
    ?>
            productsList["<?php echo $category; ?>"] = tempArray;
    <?php
}
?>
			
    function displayTypes(id){
        $('#type'+id).find('option').remove();
        $('#type'+id).append('<option value="-1">Choisir une morphologie</option>');
        for(index=0; index<productsTypes.length; index++){
            $('#type'+id).append('<option value="'+productsTypes[index]+'">'+productsTypes[index]+'</option>');
        }
    }
			
    function selectClickFunction(element){
        var key 	 = element.val();
        var id 		 = element.attr('id').replace('type', '');
        if(key != -1){
            var products = productsList[key];
					
            var index;
            $('#product'+id).find('option').remove();
            if(products.length > 0){
                $('#product'+id).attr('disabled', false);
                for(index=0; index<products.length; index++){
                    $('#product'+id).append('<option value="'+products[index]['id']+'">'+products[index]['name']+'</option>');
                }
            } else {
                $('#product'+id).attr('disabled', true);
            }
        } else {
            $('#product'+id).attr('disabled', true);
        }
				
        return false;
    }
			
    function deleteProductFunction(element){
        var id = element.attr('id').replace('removeProduct', '');
        $('#type'+id).remove();
        $('#product'+id).remove();
        $('#removeProduct'+id).remove();
				
        return false;
    }
			
    $(document).ready(function(){
        $('#addProductBtn').click(function(){
            currentProduct++;
            $('#productsContainer').append('<select class="type" id="type'+currentProduct+'"></select> <select name="products[]" id="product'+currentProduct+'" disabled="disabled"></select> <a href="#" id="removeProduct'+currentProduct+'" class="btn btn-mini btn-danger removeProductBtn"><i class="icon-trash icon-white"></i> Delete</a>');
            displayTypes(currentProduct);
            $('#type'+currentProduct).click(function(){
                selectClickFunction($(this));
            });
					
            $('#removeProduct'+currentProduct).click(function(){
                deleteProductFunction($(this));
            });
					
            return false;
        });
				
        $('.type').change(function(){
            selectClickFunction($(this));
        });
				
        $('.removeProductBtn').click(function(){
            deleteProductFunction($(this));
        });
				
        displayTypes(1);
    });
        </script>
    </head>
    <body>
        <?php
        include('../../_header.php');

        // Get all morphologies
        $morphologieManager = new MorphologieManager();
        $allMorphologies = $morphologieManager->getAllMorphologies();
        ?>
        <div class="form_container">
            <form action="add.php" method="post" class="well">
                <h2>Nouveau testeur</h2><br />
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" placeholder="Nom" class="span6" required/>
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" placeholder="Prénom" class="span6"/>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="Email" class="span6"/>
                <label for="telephone">Téléphone</label>
                <input type="text" name="telephone" id="telephone" placeholder="Telephone" class="span6"/>
                <label for="lieuResi">Téléphone Portable</label>
                <input type="text" name="mobile" id="mobile" placeholder="Telephone portable" class="span6"/><br/>
                <label for="dateNaissance">Date de naissance</label>
                <input type='text' name='dateNaissance' maxlength='150' id="dateNaissance" value="0000-00-00" required /><br/>
                <label for="lieuResi">Adresse</label>
                <input type="text" name="adresse" id="adresse" placeholder="Adresse" class="span6"/><br/>
                <label for="lieuResi">Ville</label>
                <input type="text" name="lieuResi" id="lieuResi" placeholder="Lieu de résidence" class="span6"/><br/>
                <label for="lieuResi">Code postal</label>
                <input type="text" name="codePostal" id="codePostal" placeholder="Code postal" class="span6"/><br/><br/>
                Pilote : <input type="checkbox" name="pilote" id="pilote"/>&nbsp;&nbsp;&nbsp;&nbsp;
                Testeur : <input type="checkbox" name="testeur" id="testeur"/>&nbsp;&nbsp;&nbsp;&nbsp;
                Véhiculé : <input type="checkbox" name="vehicule" id="vehicule"/>&nbsp;&nbsp;&nbsp;&nbsp;<br/><br/>
                <label for="commentaire">Commentaire</label>
                <textarea name="commentaire" class="span6" id="commentaire" placeholder="Commentaire"></textarea>
                <br /><br />
                <div id="productsContainer">
                    <label for="products">Products</label>
                    <select class="type" id="type1">
                    </select>
                    <select name="products[]" id="product1" disabled="disabled">
                    </select>
                    <a href="#" id="removeProduct1" class="btn btn-mini btn-danger removeProductBtn"><i class="icon-trash icon-white"></i> Delete</a>
                </div>
                <a class="btn btn-mini btn-success" id="addProductBtn" href="add.php"><i class="icon-plus icon-white"></i> Add product</a>

                <br /><br />	
                <button type="submit" class="btn btn-primary">Creer</button>
            </form>
        </div>
        <script>
            $(function(){
                $("#dateNaissance").datepicker({ dateFormat: 'yy-mm-dd' });
            });
        </script>
    </body>
</html>