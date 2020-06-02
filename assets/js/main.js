$(obtener_productos());
        
function obtener_productos(productos)
{
        $.ajax({
                url : 'buscar_productos.php',
                type : 'POST',
                dataType : 'html',
                data : { productos: productos },
                })

            .done(function(resultado){
                $("#tabla_resultado").html(resultado);
            })
}

$(document).on('keyup', '#busqueda', function()
{
            var valorBusqueda=$(this).val();
            if (valorBusqueda!="")
            {
                obtener_productos(valorBusqueda);
            }
            else
                {
                    obtener_productos();
                }
});


