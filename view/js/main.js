/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 $(document).ready(function() {
    $("#listaproducto").click(function() {                
        var val = $('#listaproducto').val();
        document.getElementById('cantidad').value='1';
        precio(val);
    });
});

function precio(cod){
    var codprod=cod;
    $.ajax({
        url: '../controller/precioproducto.php',
        type: 'POST',
        data: {
            cod: codprod,
        }
    }).done(function(respuestaServidor){
        document.getElementById('precio').value=respuestaServidor;
    });
}

function agregaLista(){
    var codigo=document.getElementById('listaproducto').value;
    var nombre=$('#listaproducto option:selected').html();
    var precio=document.getElementById('precio').value;
    var cantidad=document.getElementById('cantidad').value;
    var monto=(precio*cantidad);
    
    $.ajax({
        url: 'agregaListaDetalle.php',
        type: 'POST',

        data: {
            cod:codigo,
            prod:nombre,
            prec:precio,
            cant:cantidad,
            mont:monto
        }
    }).done(function (respuestaServidor){
        $('#muestraDetalle').html(respuestaServidor);
        calcularTotales();
    });
    limpiar();
    calcularTotales();
}

function limpiar(){
    document.getElementById('codigo').value="";
    document.getElementById('producto').value="";
    document.getElementById('precio').value="";
    document.getElementById('cantidad').value="";    
}

function calcularTotales(){
    var subtotal;
    var igv;
    var total;
    
    $.ajax({
        url: '../controller/calcularMonto.php',
        type: 'POST', 
    }).done(function (respuestaServidor){
        subtotal=Number(respuestaServidor);
        igv=(subtotal*0.18);
        total=(subtotal+igv);
        //mostramos los valores en la interfaz 
        document.getElementById('subtotal').value=subtotal;
        document.getElementById('igv').value=igv;
        document.getElementById('total').value=total;
    });
}

function retirarElemento(indice){
    var i=indice;
    
    $.ajax({
        url: 'marcaEliminar.php',
        type: 'POST',
        data: {
            posicion:i        
        }
    }).done(function (respuestaServidor){
        $('#muestraDetalle').html(respuestaServidor);
        calcularTotales();
    });
}

function descontar(){
    var descuento=document.getElementById('descuento');
    var total=document.getElementById('total').value;
    
    if(descuento.checked){
        descuento = 0.9*total;
        document.getElementById('total').value=descuento;
    }
    else{
        limpiar();
        calcularTotales();
    }
}

function ModalDetalle(indice){
    var id = indice;

    $.ajax({
        url: '../controller/modal-detalle.php',
        type: 'POST',
        
        data: {
            val: id,
        }
    }).done(function (respuestaServidor){
        $('#detalleContenedor').html(respuestaServidor);
    });
}