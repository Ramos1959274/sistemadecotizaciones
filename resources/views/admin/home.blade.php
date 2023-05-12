<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset("css/diceño.css")}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <div class="contenedor">
        <form  class="form" action="{{route('cotizaciones.guardar')}}" method="post">
            @csrf
            <div class="form-header">
                <h1 class="form-title"> C<span>otizaciones</span></h1>
            </div>

            <label for="tiposervicioizar" class="form-label">Tipo Servicio: </label>
            <select id="tiposerviciocotizar" name="tiposerviciocotizar" class="form-input" required>
                <option selected>clic para seleccionar</option>
                @foreach ($tiposerviciocotizara as $tipo)
                    <option value="{{$tipo->pk_tiposerviciocotizar}}">{{$tipo->tiposervicio}}</option>
                @endforeach
            </select>

            <label for="ncliente" class="form-label">Nombre del Cliente: </label>
            <input type="text" name="cliente" id="cliente" class="form-input">

            <label for="fechadecot" class="form-label">Fecha de Cotizacion: </label>
            <input type="date" name="fechadecot" id="fechadecot" class="form-input">

            <label for="lugardeex" class="form-label">Lugar de Expedicion: </label>
            <input type="text" name="lugardeex" id="lugardeex" class="form-input">

            <label for="tipodeent" class="form-label">Tiempo de Entrega: </label>
            <input type="text" name="tipodeent" id="tipodeent" class="form-input">

            <label for="servicios" class="form-label" style="margin-top: 10px; font-size: 20px">Servicios </label>
            
            <div class="dinamic">
                <div class="row" >
                    <div class="col-8">
                        <input type="text" name="servicio" id="servicio1" placeholder="Agregar un servicio" class="form-inputs servicio" >
                    </div>
                    <div class="col-2">
                        <input type="number" name="preservicio" id="preservicio1" min="00.00" max="1000000.00" step="00.01" placeholder="00.00" class="form-inputs precio" >
                    </div>
                    <div class="col-2">
                        <button class="form-inputs mas"  type="button">+</button>
                    </div>
                </div>
            </div>
            <div class="dos">
                <div class="row">
                    <div class="col-8">
                        <input type="text" name="descuento" id="descuento1" placeholder="Agregar un Descuento" class="form-inputs descuento" >
                    </div>
                    <div class="col-2">
                        <input type="number" name="cantdescu" id="cantdescu1" placeholder="00.0" class="form-inputs cantides" >
                    </div>
                    <div class="col-2">
                        <button class="form-inputs ms" type="button">+</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="total" class="form-inputs">Total</label>
                </div>
                <div class="col-2">
                    <input type="number" name="total" id="total" placeholder="00.0" class="form-inputs" >
                </div>
            </div>
            

            <label for="modincluye" class="form-label" style="margin-top: 10px; font-size: 20px">Incluye </label>
           <div class="inc">
            <div class="row">
                <div class="col-10">
                    <textarea name="modincluye" id="incluye1" cols="30" rows="1" class="form-inputs incluye"></textarea>
                </div>
                <div class="col-2">
                    <button class="form-inputs ma">+</button>
                </div>
            </div>
           </div>

            <input type="button" onclick="guardar()" value="Guardar" class="form-inputs" style="background: rgba(0, 0, 0, 1)">
        </form>
    </div>

<script type="text/javascript">
    $(function(){
        var i = 1;
        $('.mas').click(function (e) {
            e.preventDefault();
                i++;

            $('.dinamic').append('<div id="newRow'+i+'">'
            +'<div class="row" >'
                +'<div class="col-8">'
                    +'<input type="text" name="servicio" placeholder="Agregar un servicio" class="form-inputs servicio" id="servicio'+i+'" >'
                +'</div>'
                +'<div class="col-2">'
                    +'<input type="number" name="preservicio" id="preservicio'+i+'" min="00.00" max="1000000.00" step="00.01" placeholder="00.00" class="form-inputs precio" >'
                +'</div>'
                +'<div class="col-2">'
                    +'<button class="form-inputs remove-link" id="'+i+'" type="button">-</button>'
                +'</div>'
            +'</div>'   
            );
        });

        $(document).on('click', '.remove-link', function(e){
            e.preventDefault();

            var id = $(this).attr("id");
            $('#newRow'+id+'').remove();
        });
    });


    $(function(){
        var i = 1;
        $('.ms').click(function (e) {
            e.preventDefault();
                i++;

            $('.dos').append('<div id="new'+i+'">'
            +'<div class="row" >'
                +'<div class="col-8">'
                    +'<input type="text" name="" placeholder="Agregar un Descuento" class="form-inputs descuento" id="descuento'+i+'">'
                +'</div>'
                +'<div class="col-2">'
                    +'<input type="number" name="" placeholder="00.0" id="cantdescu'+i+'" class="form-inputs cantides">'
                +'</div>'
                +'<div class="col-2">'
                    +'<button class="form-inputs remove-l" id="'+i+'" type="button">-</button>'
                +'</div>'
            +'</div>'   
            );
        });

        $(document).on('click', '.remove-l', function(e){
            e.preventDefault();

            var id = $(this).attr("id");
            $('#new'+id+'').remove();
        });
    });


    $(function(){
        var i = 1;
        $('.ma').click(function (e) {
            e.preventDefault();
                i++;

            $('.inc').append('<div id="newR'+i+'">'
            +'<div class="row" >'
                +'<div class="col-10">'
                    +'<textarea name="" id="incluye'+i+'" cols="30" rows="1" class="form-inputs incluye"></textarea>'
                +'</div>'
                +'<div class="col-2">'
                    +'<button class="form-inputs remove-li" id="'+i+'" type="button">-</button>'
                +'</div>'
            +'</div>'   
            );
        });

        $(document).on('click', '.remove-li', function(e){
            e.preventDefault();

            var id = $(this).attr("id");
            $('#newR'+id+'').remove();
        });
    });

    function guardar(){
        var tiposerviciocotizar = $("#tiposerviciocotizar").val();
        var cliente = $("#cliente").val();
        var servicios = $(".servicio").toArray();
        var precios = $(".precio").toArray();
        var fechadecoti = $("#fechadecot").val();
        var lugardeexp = $("#lugardeex").val();
        var tipodeentr = $("#tipodeent").val();
        var descuentos = $(".descuento").toArray();
        var cantide = $(".cantides").toArray();
        var total = $("#total").val();
        var incluye = $(".incluye").toArray();
        var incluir = [];
        var descucan = [];
        var serviciosprecio = [];
        for (let i = 1; i < servicios.length+1; i++) {
            serviciosprecio.push({
                name:$("#servicio"+i).val(),
                precio:$("#preservicio"+i).val()
            })
            
        }
        for (let i = 1; i < descuentos.length+1; i++) {
            descucan.push({
                des:$("#descuento"+i).val(),
                cantida:$("#cantdescu"+i).val()
            })
            
        }
        for (let i = 1; i < incluye.length+1; i++) {
            incluir.push({
                incluye:$("#incluye"+i).val()
            })
            
        }
        
        var data = {
            tiposerviciocotizar:tiposerviciocotizar,
            ncliente:cliente,
            servicios:serviciosprecio,
            fechadecot:fechadecoti,
            lugardeex:lugardeexp,
            tipodeent:tipodeentr,
            total:total,
            incluye:incluir,
            descuentos:descucan
        }
        $.ajax({
            type: 'POST',  
            url: "{{route('cotizaciones.guardar')}}",  
            data: { data: data, _token: "{{ csrf_token() }}" } 
            }).done(function( msg ) { 
            console.log(msg);  
            }).fail(function (jqXHR, textStatus, errorThrown){ 
            console.log("The following error occured: "+ textStatus +" "+ errorThrown); 
        });
        
    }
</script>
</body>
</html>