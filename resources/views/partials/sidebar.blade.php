<div class="col-md-3">
<div class="card categories-section" >
  <div class="card-header categories-header bg-dark">
    <h2 class="card-title">Departments</h2>
    <span class="fa fa-caret-up pull-right" id="deps-caret"></span>
  </div>
  
	  <ul class="list-group list-group-flush" id="departments-list" >
	    @foreach($categories as $category)
	    	<li class="list-group-item"><a href="/categories/{{$category->slug}}">{{$category->name}}</a></li>

	    @endforeach
	  </ul>
  
</div>
</div>