<!DOCTYPE html>
<html>
@include('layouts.template.head')

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    @include('layouts.template.nav')

    @include('layouts.template.aside') 
    <div class="content-wrapper">
      @include('partials.alert')
      @yield('content')
        
    </div>
      

     
    </div>
    @include('layouts.template.footer')

</body>
</html>
