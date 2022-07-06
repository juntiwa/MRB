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
   @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

   <form action="{{route('medicine.store')}}" method="POST" class="m-3">
      @csrf
      <div class="flex">
         <p>{{$data}}</p>
      </div>
      
      <div class="flex flex-col w-4/5 leading-loose">
         <label for="title">หัวเรื่อง</label>
         <input type="text" name="title" id="title" class="border border-slate-800 rounded" value="foo" required>
   
         
         <label for="name_coordinate">ชื่อผู้ประสานงาน</label>
         <input type="text" name="name_coordinate" id="name_coordinate" class="border border-slate-800 rounded" value="bar">
         
         <label for="comment">รายละเอียดเพิ่มเติม</label>
          <textarea name="comment" id="comment" cols="30" rows="10" class="border border-slate-800 rounded" value="comment">comment</textarea>
    
         <label for="checkbox">อุปกรณ์ที่ต้องการ</label>
        <div class="flex">
         <p class="mr-2"><input class="mr-3" type="checkbox" name="equipment[computer]" @checked(old('equipment.computer')) id="computer"> Computer</p>
         <p class="mr-2"><input class="mr-3" type="checkbox" name="equipment[lcdprojecter]" @checked(old('equipment.lcdprojecter')) id="lcdprojecter"> LCD Projecter</p>
         <p class="mr-2"><input class="mr-3" type="checkbox" name="equipment[visualizer]" @checked(old('equipment.visualizer')) id="visualizer"> Visualizer</p>
         <p class="mr-2"><input class="mr-3" type="checkbox" name="equipment[sound]" @checked(old('equipment.sound')) id="sound"> ระบบเสียง</p>
         <p class="mr-2"><input class="mr-3 border border-slate-800 rounded" type="text" name="equipment[other]" value="{{old('equipment.other')}}"  id="input_other"
             placeholder="โปรดระบุ"></p>
         <p class="mr-2"><input type="submit" value="บันทึกการจอง" class="bg-blue-500 px-2 py-2 rounded text-white cursor-pointer"></p>
        </div>

      </div>
   </form>


</body>
</html>