<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
  </head>
  <body>
    {{-- Header --}}
    @include('admin.header')

   @include('admin.sidebar')
      <!-- Sidebar Navigation end-->

      {{-- body --}}

      @include('admin.body')

        {{-- Footer --}}
        @include('admin.footer')
  </body>
</html>
