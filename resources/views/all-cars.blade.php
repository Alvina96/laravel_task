<div class="col-sm-6 mx-auto">
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Марка</th>
          <th>Модель</th>
          <th>Номер</th>
          <th>Цвет</th>
          <th>Оплачена парковка</th>
          <th>Комментария</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($cars as $car)
          <tr>
            <td>{{$car->id}}</td>
            <td>{{$car->car_marka}}</td>
            <td>{{$car->car_model}}</td>
            <td>{{$car->phone}}</td>
            <td>{{$car->getColor()}}</td>
            <td>{{$car->getOrdered()}}</td>
            <td>{{$car->comment}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
