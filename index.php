<?php
function leerXml($urlXml)
{
	$fichero = file_get_contents($urlFlujo);
	$xmlDOM = new DOMDocument('1.0', 'utf-8');
	$xmlDOM->loadXML($fichero);
	$documentElement = $xmlDOM->documentElement;
	return $documentElement;        
}

$url = "http://feeds.weblogssl.com/xataka2"
$contenidoDom = leerXml($url);

$item = $contenidoDom->getElementsByTagName("item");
for ($i = 0; $i < $item->length; $i++)
{
	$titulo = $item->item($i)->getElementsByTagName("title");
	$enlace = $item->item($i)->getElementsByTagName("link");
	$fecha = $item->item($i)->getElementsByTagName("pubDate");
	$contenido = $item->item($i)->getElementsByTagName("description");
	
	$tituloXml = strip_tags(($titulo->item(0)->nodeValue));
	$enlaceXml = $enlace->item(0)->nodeValue;
	$contenidoXml = strip_tags($contenido->item(0)->nodeValue);
	$fechaXml = $fecha->item(0)->nodeValue;
}
	
?>
