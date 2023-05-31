<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container" style="padding: 5rem 0rem;">
        <div class="row">
            <div class="col">
               <form action="{{ route('IsAncestor') }}" method="post">
                    @csrf
                    <div class="card" style="width: 25rem; height: 30rem; margin-right: 1rem;">
                        <h4 class="card-title">Input</h4>
                        <div class="card-body">
                        <textarea id="input" name="input" class="card-text" style="height: 26rem; width: 22rem;" onkeypress="validarNumeros(event)"></textarea>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-info" style="width: 15rem; height: 5rem">Verificar</button>
                </form> 
            </div>
            <div class="col">
                <div class="card" style="width: 25rem; height: 28rem;">
                    <h4 class="card-title">Output</h4>
                    <div class="card-body">
                        <textarea class="card-text" style="height: 24rem; width: 22rem; text-align: left;">
                            @isset($response)
                                @foreach($response as $respons)
                                    {{$respons}}
                                @endforeach 
                            @endisset
                        </textarea>
                    </div>
                </div>
            </div>
        </div>      
    </div>
</body>
</html>
<script>
    function validarNumeros(event) {
        var charCode = (event.which) ? event.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            event.preventDefault();
        }
    }
</script>
