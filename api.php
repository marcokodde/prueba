<?php
require __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'http://localhost/crud-php/api/v1/index.php',
    'timeout'  => 5.0,
]);
// =============================================
//Hago la llamada al servicio rest, para insertar un producto
$producto = [
    'name' => 'Insertar usando Rest',
    'price' => '12',
    'description' => 'Este es un ejemplo del metodo POST',
];
$res = $client->request('POST', '', ['form_params' => $producto]);
if ($res->getStatusCode() == '200') //Verifico que me retorne 200 = OK
{
    echo "Se inserto un producto (producto)";
}
// =============================================
//Actualizar un producto usando PUT
$actualizar = [
    'name' => 'producto actualizado',
    'price' => '15',
    'description' => 'Esta es una guia sencilla',
    'id' => '1'
];
$res = $client->request('PUT', null, [
    'query' => $actualizar
]);
if ($res->getStatusCode() == '200') //Verifico que me retorne 200 = OK
{
    echo $res->getBody();
}
// =============================================
//Hago llamado a REST para borrar un  articulo
$res = $client->request('DELETE', null, [
    'query' => ['id' => '1'] //Id del post a eliminar
]);
if ($res->getStatusCode() == '200') //Verifico que me retorne 200 = OK
{
    echo $res->getBody();
}
