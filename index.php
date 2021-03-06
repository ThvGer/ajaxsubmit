<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<div class="container mt-4">
    <form id="form" action="submitform.php" method="POST">
        <div class="alert alert-danger" style="display: none;" id="errNom">Le nom dois être supérieur à 6</div>
        <div class="alert alert-danger" style="display: none;" id="errPrenom">Le prénom dois être supérieur à 6</div>
        <div class="d-flex flex-row">
            <input type="text" class="form-control col-2 mr-2" name="nom" >
            <input type="text" class="form-control col-2 mr-2" name="prenom">
            <button id="submit" name="submit" type="submit" class="btn btn-primary">Soumettre</button>
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script>
    $('.spinner-border').hide();

    /**
         * Serialization
         */
         $.fn.serializeObject = function () {
            var o = {};
            var a = this.serializeArray();
            $.each(a, function () {
                if (o[this.name] !== undefined) {
                    if (!o[this.name].push) {
                        o[this.name] = [o[this.name]];
                    }
                    o[this.name].push(this.value || '');
                } else {
                    o[this.name] = this.value || '';
                }
            });
            return o;
        };
        /**
         * Envoi du formulaire d'ajout au poanier
         */
        $(document).on("click", "#submit", function (e) {
            e.preventDefault();
            var form = $("#form");

            // always makes sense to signal user that something is happening
            $('.spinner-border').show();

            // simple approach avoid submitting multiple times
            $('#submit').attr("disabled", true);

            // get the serialized properties and values of the form
            var form_data = form.serializeObject();

            // the actual request to your newAction
            $.get({
                url: '/submitform.php',
                type: 'POST',
                dataType: 'json',
                data: form_data,
              
                success: function(data){
                    if(data['nom'] == true)
                      $('#errNom').css("display", "block");
                    
                    if(data['prenom'] == true)
                      $('#errPrenom').css("display", "block");

                    // signal to user the action is done
                    $('.spinner-border').hide();
                    $('#submit').attr("disabled", false);


                }


            });

        });
        
</script>
</body>
</html>