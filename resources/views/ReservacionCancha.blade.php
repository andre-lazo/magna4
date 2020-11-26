<!DOCTYPE HTML>
<html lang="es">
<head> 
<meta charset="UTF-8" />

<title> SOLICITUD DE RESERVA </title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!--<link rel="stylesheet" href="{{asset('fonts/style.css')}}">-->
    <link rel="stylesheet" href="{{asset('extensiones/font-awesome.min')}}">
    <link href="{{asset('extensiones/css2')}}" rel="stylesheet">    
    <script src="{{asset('js/jquery-3.5.1.js')}}" ></script>
    <script src="{{asset('js/bootstrap.min.js')}}" ></script>
 
    
<style type="text/css">
.centrado23{ 
margin-left: 85px;
margin-top: 20px;
font-size: 15px;
font-family:"Arial";
}
.centrado24{ 
margin-left: 82px;
font-size: 15px;
margin-top: 1px;
font-family:"Arial";

}
.centrado25{ 
margin-left: 82px;
margin-right: 82px;
font-size: 14.3px;
margin-top: 1px;
font-family:"Arial";
LINE-HEIGHT:25px;

}
.centrado26{ 

margin-top: 30px;


}
table {
	width: 50%;
	height: 300px;
}
</style>

</head>
<body>
<table BORDER=0.5 CELLPADDING=0 CELLSPACING=0  align="center" class="centrado26" >

<tr >
<td> <img src="magna.jpg" width="5px" height="5px"></td>  
<td align="center"> <h4> SOLICITUD PARA LA AUTORIZACIÓN DEL <br>USO DE ÁREAS COMUNITARIAS<br> (CANCHAS,PARQUES Y PISCINA) DE <br> MAGNA DE VILLA CLUB, DURANTE <br> EMERGENCIA SANITARIA COVID-19 </h4>  </td>
<td>  <b>Código:</b> MAGNA-02-2020   <br>
<b>Fecha:</b> {{$canchas->start}}
 </td>
</tr>



</table>


        <span class="centrado23">Sres.<br></span>
        <span class="centrado24">ADMINISTRACIÓN<br></span>
        <span class="centrado24" >ETAPA MAGNA <br></span>
        <span class="centrado24">VILLACLUB<br></span>
        <span class="centrado24">Presente.<br><br></span>
       
        <p class="centrado25 text-justify">Yo, {{$canchas->usuario}} propietario(a) de la villa asignada con el 
No.……..de la manzana ……de ésta Urbanización, solicito se digne autorizar el uso de la siguiente área comunitaria..................................................
para el {{$canchas->start}} en el horario de {{$canchas->hora}} , para la distracción propia y de mi familia.<br><br>  </p>


<p class="centrado25 text-justify">Mis familiares que asistirán con mi supervisión son: <br>
  </p>

  <table  BORDER=0.5 CELLPADDING=0 CELLSPACING=0  align="center"  >

<tr width="500" height="500">
<td align="center" width="360" height="25"> Nombres y Apellidos  </td>
<td align="center" width="240" height="25">  Parentesco  </td>
</tr>
<tr >
<td align="center" width="360" height="25"> {{$canchas->visi1}} </td>
<td align="center"  width="240" height="25"> {{$canchas->pare1}} </td>
</tr>
<tr >
<td align="center" width="360" height="25"> {{$canchas->visi2}} </td>
<td align="center"  width="240" height="25"> {{$canchas->pare2}} </td>
</tr>
<tr >
<td align="center" width="360" height="25"> {{$canchas->visi3}}  </td>
<td align="center"  width="240" height="25"> {{$canchas->pare3}} </td>
</tr>
<tr >
<td align="center" width="360" height="25"> {{$canchas->visi4}}  </td>
<td align="center"  width="240" height="25"> {{$canchas->pare4}} </td>
</tr>
<tr >
<td align="center" width="360" height="25">  {{$canchas->visi5}} </td>
<td align="center"  width="240" height="25"> {{$canchas->pare5}} </td>
</tr>
<tr >
<td align="center" width="360" height="25">  {{$canchas->visi6}} </td>
<td align="center"  width="240" height="25"> {{$canchas->pare6}} </td>
</tr>
<tr >
<td align="center" width="360" height="25">  {{$canchas->visi7}} </td>
<td align="center"  width="240" height="25"> {{$canchas->par7}} </td>
</tr>


</table>
<p class="centrado25" ><br><br>Dejo constancia que, me comprometo a respetar y cumplir las normas de bioseguridad y
reglamentos establecidos para su uso y cualquier disposición que establezca el organismo
administrador, con la finalidad de mitigar y evitar contagios del COVID-19.
<br><br> Atentamente. <br><br> <b>Firma:</b> Confirmación Electrónica.<br><b> Nombres: {{$canchas->usuario}} </b><br> <b>Número C.C.:</b> </p>





</body>

</html>