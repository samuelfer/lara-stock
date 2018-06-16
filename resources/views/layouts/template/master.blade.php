<!DOCTYPE html>
<html>
@include('layouts.template.head')

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    @include('layouts.template.nav')
     
    @include('layouts.template.aside') 
    <div class="content-wrapper">
       
      @yield('content')
        
    </div>
      
      
     
    </div>
    @include('layouts.template.footer')
    @yield('scripts')

</body>
</html>
