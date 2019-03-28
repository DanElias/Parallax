<?php

function controller_tabla_egresos_php(){
    include("controladores/_controller_tabla_egresos.php");
}
function header_html($titulo = "Egresos")
{
    include("../views/_header_admin.html");
}

function sidenav_html()
{
    include("../views/_sidenav_admin.html");
}

function footer_html()
{
    include("../views/_footer_admin.html");
}

function body_egresos()
{
    include("_egresos.html");
}

function form_egresos()
{
    include("forms/_form_egresos.html");
}

function form_eliminar_egresos()
{
    include("forms/_form_eliminar_egresos.html");
}

function modal_informacion_egresos()
{
    include("forms/_form_informacion_egresos.html");
}

//-------------------------------------------------------------------------------------------------------

//forms y modals del proveedor

function form_agregar_proveedor()
{
    include("../proveedores/forms/_form_agregar_proveedor.html");
}

function form_editar_proveedor()
{
    include("../proveedores/forms/_form_editar_proveedor.html");
}

function form_eliminar_proveedor_lista()
{
    include("forms/_form_eliminar_proveedor_lista.html");
}

function modal_informacion_proveedores()
{
    include("../proveedores/_modal_informacion_proveedores.html");
}

//--------------------------------------------------------------------------------------------------------

//forms y modals de cuentas contable

function form_cuentacontable_html()
{
    include("../cuentas_contables/forms/_form_cuentacontable.html");
}

function form_eliminar_cuentacontable_lista_html()
{
    include("forms/_form_eliminar_egresos.html");
}

function modal_informacion_cuentacontable_html()
{
    include("../cuentas_contables/forms/_form_informacion_cuentacontable.html");
}

?>