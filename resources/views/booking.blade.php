<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
</head>
<body>
   <a href="{{route('medicine.create')}}" class="bg-blue-500 px-2 py-2 rounded text-white cursor-pointer">เพิ่มข้อมูล</a>

   <table>
      <tr>
         <td>title</td>
         <td>name_coordinate</td>
         <td>start</td>
         <td>end</td>
      </tr>
      @foreach ($bookings as $booking)
      <tr>
         <td>
            {{ $booking->title }}
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
         {{-- <td>
            {{ $booking->title }}
         </td> --}}
      </tr>
      @endforeach
   </table>
</body>
</html>