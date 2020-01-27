<?php

require_once 'Verificador.php';
$teste = new Verificador();

if(isset($_POST['verificar'])) {
    $agencia = $_POST['agencia'];
    $conta = $_POST['conta'];
    $digito = $_POST['digito'];

    $response = $teste->verificaConta($agencia, $conta, $digito);
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Verificador de Conta</title>
  </head>
  <body>
    <div class="container">
    <?php if(isset($response)) { ?>
        <div class="alert alert-primary" role="alert">
            <?php echo $response; ?>
        </div>
    <?php } ?>
    <form method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Agência</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="agencia">
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputPassword1">Conta</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="conta">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputPassword1">Digito</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="digito">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" name="verificar">Verificar</button>
    </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>