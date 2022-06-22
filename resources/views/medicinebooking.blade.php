<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
   <form action="{{route('medicine.store')}}" method="post" class="m-3 flex flex-col w-1/2 leading-loose">
      @csrf
      <label for="title">หัวเรื่อง</label>
      <input type="text" name="title" id="title" class="border border-slate-800 rounded">

      <label for="comment">รายละเอียดเพิ่มเติม</label>
      <textarea name="comment" id="comment" cols="30" rows="10" class="border border-slate-800 rounded"></textarea>

      <label for="datetime">วันที่จอง</label>
      <div class="flex">
         <input type="datetime-local" name="start" id="start" class="border border-slate-800 rounded">
         <input type="datetime-local" name="end" id="end" class="border border-slate-800 rounded">
      </div>
      

      <label for="meeting_room_id">ห้องประชุมที่ต้องการจอง</label>
      <select name="meeting_room_id" id="meeting_room_id" class="border border-slate-800 rounded">
         <option value="">เลือกห้องประชุมที่ต้องการ</option>
         @foreach ($medicines as $medicine)
         <option value="{{$medicine->id}}">  {{$medicine->name}} รองรับจำนวน {{$medicine->minimum_attendees}} - {{$medicine->maximum_attendees}} คน </option>
         @endforeach
      </select>


      <label for="name_coordinate">ชื่อผู้ประสานงาน</label>
      <input type="text" name="name_coordinate" id="name_coordinate" class="border border-slate-800 rounded">

      <label for="checkbox">อุปกรณ์ที่ต้องการ</label>
     <div class="flex">
      <p class="mr-2"><input class="mr-3" type="checkbox" name="equipment[computer]" id="computer" value="true"> Computer</p>
      <p class="mr-2"><input class="mr-3" type="checkbox" name="equipment[lcdprojecter]" id="lcdprojecter" value="true"> LCD Projecter</p>
      <p class="mr-2"><input class="mr-3" type="checkbox" name="equipment[visualizer]" id="visualizer" value="true"> Visualizer</p>
      <p class="mr-2"><input class="mr-3" type="checkbox" name="equipment[sound]" id="sound" value="true"> ระบบเสียง</p>
      <p class="mr-2"><input class="mr-3" type="checkbox" name="equipment[other]" id="other" value="true"> อื่น ๆ</p>
      <p class="mr-2"><input class="mr-3 border border-slate-800 rounded" type="text" name="input_other" id="input_other" placeholder="โปรดระบุ"></p>
      <p class="mr-2"><input type="submit" value="บันทึกการจอง" class="bg-blue-500 px-2 py-2 rounded text-white cursor-pointer"></p>
     </div>

     <div>
      <input type="checkbox" name="obj['field1']">
      <input type="checkbox" name="obj['field2']">
      <input type="checkbox" name="obj['field3']">
      <input type="checkbox" name="obj['field4']">
     </div>
      
   </form>
</body>
</html>