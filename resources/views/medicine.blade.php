<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Import Export Excel to Database Example - ItSolutionStuff.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
     
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-body">
            <form action="{{ route('medicine.store.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import Medicine Meeting Room Data</button>
            </form>
  
        </div>
    </div>
</div>
 <div class="container">
   <table>
      <thead>
         <th>name</th>
         <th>short_name</th>
         <th>minimum_attendees</th>
         <th>maximum_attendees</th>
         <th>advance_booking_under_days</th>
         <th>location</th>
         <th>images</th>
      </thead>
      @foreach ($medicines as $medicine)
      <tbody>
         <td> {{$medicine->name}} </td>
         <td> {{$medicine->short_name}} </td>
         <td> {{$medicine->minimum_attendees}} </td>
         <td> {{$medicine->maximum_attendees}} </td>
         <td> {{$medicine->advance_booking_under_days}} </td>
         <td> {{$medicine->location}} </td>
         <td> {{$medicine->images}} </td>
      </tbody>
      @endforeach
   </table>
</div>    
</body>
</html>