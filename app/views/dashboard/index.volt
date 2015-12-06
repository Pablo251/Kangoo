<div>
<ul id="dropdown1" class="dropdown-content">
<li ><a href="http://localhost:81/kangoo/index/enviados" style="float:right;">Cerrar Sesion</a></li>
</ul>
<nav>
<div class="nav-wrapper blue lighten-1">
<ul class="right hide-on-down-and-down"  style="float:right; width:9%; height:90%;">
<!-- Dropdown Trigger -->
<li><a class="dropdown-button waves-effect" data-belowOrigin= "true" href="#!" data-activates="dropdown1"><i><img  class="circle" src="http://guide.eu5.org/images/imgper.png" style="float:right; width:60%; height:90%;"></i></a></li>
</ul>
</div>
</nav>
<div class="fixed-action-btn horizontal" style="bottom: 22%; right: 2%;font-size: 82%;">
<a class="btn-floating btn-large blue lighten-3">OPTIONS</a>
</a>
<ul>
<li><a id="exsent"class="btn-floating blue lighten-1"><i class="material-icons"><h6>SEND</h6></i></a></li>
<li><a id="exoutput"class="btn-floating blue lighten-2"><i class="material-icons"><h6>OUTPUT</h6></i></a></li>
<li><a id="excreate"class="btn-floating blue lighten-3"><i class="material-icons"><h6>CREATE</h6></i></a></li>
</ul>
</div>
</div>
{{ content() }}
<div class="container">
<table  class="highlight centered striped">
<thead>
<tr>
<th data-field="id">Select</th>
<th data-field="name">Content</th>
<th data-field="price">Date and Time</th>
</tr>
</thead>

<tbody id="tableBody">
<tr>
<td></td>
<td></td>
<td></td>
</tr>
</tbody>
</table>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</div>
<div>
<ul class="pagination center" >
<li class="waves-effect"><a href="#!"><i class="material-icons"></i></a></li>
<li class="waves-effect"><button type="button" name="button" id="back">Back</button></li>
<li class="waves-effect"><button type="button" name="button" id="next">Next</button></li>
<li class="waves-effect"><a href="#!">3</a></li>
<li class="waves-effect"><a href="#!">4</a></li>
<li class="waves-effect"><a href="#!">5</a></li>
<li class="waves-effect"><a href="#!"><i class="material-icons"></i></a></li>
</ul>
</div>
{{ javascript_include('js/dash.js')}}
