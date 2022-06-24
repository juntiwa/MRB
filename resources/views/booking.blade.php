<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="flex flex-col w-full justify-center items-center text-lg">
   <a href="{{route('medicine.create')}}" class="text-blue-500 hover:text-rose-500 px-2 py-2 rounded cursor-pointer">เพิ่มข้อมูล</a>
<div class=" container">
   <table class="w-full border border-slate-600">
      <tr class="border border-slate-600">
         <td>title</td>
         <td>comment</td>
         <td>meeting_room_id</td>
         <td>name_coordinate</td>
         <td>start</td>
         <td>end</td>
         <td>equipment</td>
      </tr>
      @foreach ($bookings as $booking)
      <tr class="border border-slate-600">
         <td>
            {{ $booking->title }}
         </td>
         <td>
            {{ $booking->comment }}
         </td>
         <td>
            {{ $booking->meeting_room_id }}
         </td>
         <td>
            {{ $booking->name_coordinate }}
         </td>
         <td>
            {{ $booking->start }}
         </td>
         <td>
            {{ $booking->end }}
         </td>
         <td>
            
           
        </td>
      </tr>
      @endforeach
   </table>
</div>
   
</body>
</html>