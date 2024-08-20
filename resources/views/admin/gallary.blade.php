<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')

  </head>
  <body>
    {{-- Header --}}
    @include('admin.header')

   @include('admin.sidebar')

   <div class="page-content">
    <div class="page-header">
      <div class="container-fluid">

        <center>
        <h1 style="font-size: 40px; font-weight: bolder; color: white">
            Gallary</h1>

            <div class="row">

                @foreach ($gallary as $gallary)

                <div class="col-md-4">

                        <img style="height: 200px!important; width: 300px!important; padding-bottom: 10px; padding-top: 10px;"
                        src="/gallary/{{ $gallary->image }}" alt="">

                        <a class="btn btn-danger" href="{{ route('delete_gallary', $gallary->id) }}">Delete Image</a>
                </div>
                @endforeach
            </div>

        <form action="{{ route('upload_gallary') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div style="padding: 30px;">
                <label style="color: white; font-weight: bold;">Upload Image</label>
                <input type="file" name="image" required>

                <input class="btn btn-success" type="submit" value="Add Image">
            </div>
        </form>

    </center>

      </div>
    </div>
   </div>

        {{-- Footer --}}
        @include('admin.footer')
  </body>
</html>
