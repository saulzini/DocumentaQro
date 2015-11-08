<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">

    <title>DocumentaQro</title>
  </head>

<style>
html, body{
  height: 100%;
}

#estiloTop{
  width: 250px;
  height: 50px;
  position: absolute;
  border: 4;

}

#estiloBottom{
  width: 100%;
  height: 25px;
}

#header{
    width: 100%;
    height: 80px;
    background-color: #221D1E;
}

#rosa{
  width: 100%;
  height: 10px;
  background-color: #F70782;
}

#footer {
    width: 100%;
    position: absolute;
    bottom: 0;
    left: 0;
}


#contenedorImagen{


    background-repeat: no-repeat;
    background-position: left ;
    height: 400px;
    width: 400px;
}
</style>

<style>
html {
  font-family: sans-serif;
  -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
}
body {
  margin: 0;
}



@font-face {
    font-family: 'Glyphicons Halflings';

}
* {
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
}
*:before,
*:after {
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
}

html {
  font-size: 10px;

  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}
body {
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 14px;
  line-height: 1.42857143;
  color: #333;
  background-color: #fff;
}




@media (min-width: 768px) {
  .dl-horizontal dt {
    float: left;
    width: 160px;
    overflow: hidden;
    clear: left;
    text-align: left;
    text-overflow: ellipsis;
    white-space: nowrap;
  }
  .dl-horizontal dd {
    margin-left: 180px;
  }
}
dl {
  margin-top: 0;
  margin-bottom: 20px;
}
dt,
dd {
  line-height: 1.42857143;
}
dt {
  font-weight: bold;
}
dd {
  margin-left: 0;
}

</style>

  <body>

    <div id="header">
      <div><br>
           <img id="estiloTop" src="assets/img/DQ2.png">
      </div>
    </div>
    <div id="rosa"></div>

<br>

    <div  align="center">
        <br>
                <dl class="dl-horizontal">
                    @if (isset($traficoItem ))
                    <dt>Título</dt><dd>{{ $traficoItem->titulo }}</dd><br>
                    <dt>Ubicación</dt><dd>{{ $traficoItem->ubicacion }}</dd><br>
                    <dt>Status</dt><dd>{{ $traficoItem->status }}</dd><br>
                    <dt>Formato del material</dt><dd>{{ $traficoItem->formato_material }}</dd><br>
                        <dt>Costo</dt><dd>{{ $traficoItem->costo }}</dd><br>
                        <dt>Tipo</dt><dd>{{ $traficoItem->tipo }}</dd><br>
                        <dt>Integrante</dt><dd>{{ $traficoItem->integrante }}</dd><br>
                        <dt>Realizador</dt><dd>{{ $traficoItem->realizador }}</dd><br>
                    @endif
                </dl>
    </div>


    <div id="footer"> 
           <img id ="estiloBottom" src="assets/img/reportes_bottom.png">
    </div>
  </body>
</html>