@extends('layouts.master', ['class' => 'bg-default'])
<!-- Header Search Section -->
@section('search')

@endsection
<!-- Body Page Sections -->
@section('content')

<style type="text/css">
	
	@import "compass/css3";

.div5{
	padding:30px;
  width:500px;
  margin:30px auto;
}

h3{
  text-align:center;
  overflow:hidden;
}
h3 span{
  display:inline-block;
  position:relative;
}
h3 span:after, h3 span:before{
  content:" ";
  display:block;
  height:1px;
  width:1000px;
  background:black;
  position:absolute; 
  top:50%;
}
h3 span:before{
  left:-1010px;
}
h3 span:after{
  right:-1010px;
}

</style>

  <script>
   var element = document.getElementById("nv2");
    element.classList.add("active");
    </script>

   <div class="div5">
  <h3><span>My Title</span></h3>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
  
  <h3><span>A Completely Different Title</span></h3>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
</div>
@endsection
