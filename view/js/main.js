/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function buscar(){
    
}


// $(document).ready(function() {
//    $("#idproducto").click(function() {                
//        $.ajax({    //create an ajax request to display.php
//            type: "GET",
//            url: "producto.php",             
//            dataType: "html",   //expect html to be returned                
//            success: function(response){                    
//                $("#mostrar").html(response); 
//                //alert(response);
//            }
//        });
//    });
//});

function agregaLista(){
    var codigo=document.getElementById('codigo').value;
    var nombre=document.getElementById('producto').value;
    var precio=document.getElementById('precio').value;
    var cantidad=document.getElementById('cantidad').value;
    var monto=(precio*cantidad);
    
    $.ajax({
      url: 'agregaListaDetalle.php',
      type: 'POST',


      data: {
        codigo:codigo,
        producto:nombre,
        precio:precio,
        cantidad:cantidad,
        monto:monto
        }
    }).done(
            function (respuestaServidor)
            {
                $('#muestraDetalle').html(respuestaServidor);
                 calcularTotales();
                
            }         
         );
 limpiar();
 calcularTotales();
}
function limpiar()
{
    document.getElementById('codigo').value="";
    document.getElementById('producto').value="";
    document.getElementById('precio').value="";
    document.getElementById('cantidad').value="";    
}
function calcularTotales()
{
    var subtotal;
    var igv;
    var total;
    $.ajax({
        
      url: 'calcularMonto.php',
      type: 'POST',
   /* data: {

        }*/  
    }).done(
            function (respuestaServidor)
            {
             //  $('#muestraDetalle').html(respuestaServidor);
              subtotal=Number(respuestaServidor);
              igv=(subtotal*0.18);
              total=(subtotal+igv);
            //mostramos los valores en la interfaz 
                document.getElementById('subtotal').value=subtotal;
                document.getElementById('igv').value=igv;
                document.getElementById('total').value=total;
               
            }         
         );    
 
}

function retirarElemento(indice)
{
    
    var i=indice;
    
    $.ajax({
        
      url: 'marcaEliminar.php',
      type: 'POST',
    data: {
         posicion:i        
        }
    }).done(
            function (respuestaServidor)
            {
                $('#muestraDetalle').html(respuestaServidor);
                calcularTotales();
            }         
         );    
     
}

function descontar(){
    var descuento=document.getElementById('descuento');
    var total=document.getElementById('total').value;
    
    if(descuento.checked){
        //alert("marcado");
        //descontar el 10%
        descuento = 0.9*total;
        document.getElementById('total').value=descuento;
    }
    else{
       // alert("desmarcado");
        //volver el monto normal sin descuento.
        limpiar();
        calcularTotales();
    }
}