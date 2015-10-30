
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <li class="sub-menu">
                <a href="#">
                    <i class="fa fa-film"></i>
                    <span>Películas &nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <i class="fa fa-caret-down"></i>
                </a>

                <ul class="sub">
                    <li><a href="{{route('peliculas')}}">
                            <i class="fa fa-film"></i>
                            <span>Película</span>
                        </a></li>

                    <li><a href="{{route('realizadores')}}">
                            <i class="fa fa-hand-o-up fa-lg"></i>
                            <span>Realizadores</span>
                        </a></li>

                    <li><a href="{{route('traficos')}}" >
                            <i class="fa fa-envelope"></i>
                            <span>Tráfico</span>
                        </a></li>

                </ul>
            </li>

            <li class="sub-menu">
                <a href="{{route('funciones')}}" >
                    <i class="fa fa-video-camera"></i>
                    <span>Función</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="{{route('programas')}}">
                    <i class="fa fa-tasks"></i>
                    <span>Programa</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="{{route('festivales')}}">
                    <i class="fa fa-ticket"></i>
                    <span>Festival</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="{{route('sedes')}}" class="active">
                    <i class="fa fa-map-marker"></i>
                    <span>Sedes</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="{{route('integrantes')}}">
                    <i class="fa fa-users"></i>
                    <span>Integrantes</span>
                </a>
            </li>

            <li class="sub-menu">
                <a  href="#">
                    <i class="fa fa-thumbs-o-up "></i>
                    <span>Patrocinios &nbsp;</span>
                    <i class="fa fa-caret-down"></i>
                </a>

                <ul class="sub">
                    <li><a href="{{route('caracteristicas')}}">
                            <i class="fa fa-check-square-o"></i>
                            <span>Características</span>
                        </a></li>

                    <li><a href="{{route('paquetes')}}">
                            <i class="fa fa-cubes"></i>
                            <span>Paquetes</span>
                        </a></li>

                    <li><a href="{{route('patrocinadores')}}">
                            <i class="fa fa-thumbs-o-up"></i>
                            <span>Patrocinadores</span>
                        </a></li>

                </ul>
            </li>

            <li class="sub-menu">
                <a href="#">
                    <i class=" fa fa-bar-chart-o"></i>
                    <span>Reportes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <i class="fa fa-caret-down"></i>
                </a>

                <ul class="sub">
                    <li><a href="{{route('reportesFuncion')}}">
                            <i class="fa fa-video-camera"></i>
                            <span>Funciones</span>
                        </a></li>

                    <li><a href="{{route('reportesPais')}}">
                            <i class="fa fa-globe"></i>
                            <span>Países</span>
                        </a></li>

                    <li><a href="{{route('reportesSede')}}">
                            <i class="fa fa-map-marker"></i>
                            <span>Sedes</span>
                        </a></li>

                    <li><a href="{{route('reportesPrograma')}}">
                            <i class="fa fa-tasks"></i>
                            <span>Programas</span>
                        </a></li>

                    <li><a href="{{route('reportesFestival')}}">
                            <i class="fa fa-ticket"></i>
                            <span>Festivales</span>
                        </a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="#" >
                    <i class="fa fa-cog"></i>
                    <span>Configuración</span>
                </a>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>