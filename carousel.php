<div id="demo" class="carousel slide" data-ride="carousel" >
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="img-responsive img-fluid aa" src="img/beauty.jpg"> 
    </div>
    <div class="carousel-item">
      <img class="img-responsive img-fluid aa" src="img/carpen.jpg">  
    </div>
    <div class="carousel-item">
      <img class="img-responsive img-fluid aa" src="img/serv.jpg">   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<script type='text/javascript'>
    $(document).ready(function() {
         $('#demo').carousel({
             interval: 2000
         })
    });    
</script>