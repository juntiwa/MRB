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
      <thead>
         <th>title</th>
         <th>name_coordinate</th>
         <th>start</th>
         <th>end</th>
         <th>equipment</th>
      </thead>
      @foreach ($bookings as $booking)
      <tbody>
         <td>
            {{$booking->titile}}
         </td>
         <td>

         </td>
         <td>

         </td>
         <td>

         </td>
         <td>

         </td>
      </tbody>
      @endforeach
      
   </table>
</body>
</html>