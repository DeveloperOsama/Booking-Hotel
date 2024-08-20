<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')

    <style type="text/css">
        .table_deg{
            border: 2px solid white;
            margin: auto;
            width: 100%;
            text-align: center;
            margin-top: 40px;
        }
        .th_deg{
            background-color: rgb(86, 30, 30);
            padding: 8px;
            border-inline: 2px solid white;
        }
        tr{
            border: 3px solid white;
        }
        td{
            padding: 10px;
            border-inline: 2px solid white;
        }
    </style>

  </head>
  <body>
    {{-- Header --}}
    @include('admin.header')

   @include('admin.sidebar')

   <div class="page-content">
    <div class="page-header">
      <div class="container-fluid">

        <table class="table_deg">
            <tr>
                {{-- <th class="th_deg">RoomID</th> --}}
                <th class="th_deg">Customer Name</th>
                <th class="th_deg">Email</th>
                <th class="th_deg">Phone</th>
                <th class="th_deg">Message</th>
                <th class="th_deg">Send</th>
            </tr>

            @foreach ($messages as $messages)

            <tr>
                <td>{{ $messages->name }}</td>
                <td>{{ $messages->email }}</td>
                <td>{{ $messages->phone }}</td>
                <td>{{ $messages->message }}</td>
                <td>
                    <a class="btn btn-success" href="{{ route('send_mail',$messages->id) }}">send mail</a>
                </td>
            </tr>

            @endforeach

        </table>

      </div>
    </div>
   </div>

        {{-- Footer --}}
        @include('admin.footer')
  </body>
</html>
