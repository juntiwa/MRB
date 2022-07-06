<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>ตรวจสอบเงื่อนไข</title>
</head>
<body>
   <a href="{{route('division.rooms')}} " class="bg-rose-400">รายละเอียดห้องประชุมสาขาวิชา</a>
   <form action="{{route('medicine.rooms.booking')}}" method="get" class="m-3 flex flex-col w-1/2 leading-loose">
   {{-- @if ($result->exists)
         <form action="{{route('medicine.rooms.booking')}}" method="get" class="m-3 flex flex-col w-1/2 leading-loose">
   @else
      <form action="{{route('medicine.create')}}" method="get">
   @endif --}}
      <label for="datetime">วันที่จอง</label>
      <div class="flex">
         <input type="datetime-local" name="start" id="start" class="border border-slate-800 rounded" value="{{old('start')}}" required>
         <input type="datetime-local" name="end" id="end" class="border border-slate-800 rounded" value="{{old('end')}}" required>
      </div>
      <label for="attendees">จำนวน</label>
      <input type="text" name="attendees" id="attendees" class="border border-slate-800 rounded" value="{{old('attendees')}}" required>
      <p class="mr-2"><input type="submit" value="ตรวจสอบเงื่อนไข" class="bg-blue-500 px-2 py-2 rounded text-white cursor-pointer"></p>

      <div class="flex flex-col">
         {{-- @if($result ?? null)
         @foreach ($result as $result)
         <input
            type="radio"
            name="room_id"
            id="room_id"
            value="{{$result['room']->id}}"
            @disabled(!$result['available'])>{{ $result['status'] }} <br>
            
            @endforeach
            @endif --}}
            
            {{-- @if ($result['available'])
            <input type="radio" name="room_id" id="room_id" value="{{$result['room']->id}}">{{$result['room']->name}} <br>
            @else
            <input type="radio" name="room_id" id="room_id" @disabled(!$result['available'])>{{$result['room']->name . ' ' . $result['status'] }} 
            <br>
            @endif --}}
      </div>
   </form>

   @if($result ?? null)
   <form action="{{route('medicine.create')}}" method="get">
      <div class="flex flex-col">
         @foreach ($result as $result)
         <input
            type="radio"
            name="room_id"
            id="room_id"
            value="{{$result['room']->id}}"
            @disabled(!$result['available'])>{{ $result['status'] }} <br>
         @endforeach
      </div>
      <button type="submit">จองห้อง</button>
   </form>
   @endif

</body>
</html>