@extends('layouts.app')

@section('title', '')

@section('content')

    <div class="content">
        <div class="title m-b-md">Все</div>
        <div class="all-cars">
          @include('all-cars')
        </div>
        <hr>
        <h2>Добавить</h2>
        <div class="col-sm-6 mx-auto text-left">
          <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
          </div>
            <form action="{{ route('add-car') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label for="car_marka">Марка автомобиля*:</label>
                          <input type="text" name="car_marka" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label for="car_model">Модель автомобиля*:</label>
                          <input type="text" name="car_model" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label for="phone">Номер*:</label>
                          <input type="text" name="phone" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label for="color">Цвет*:</label>
                          <select class="form-control" name="color">
                            <option value="">Выберите пожалуйста</option>
                              @foreach ($colors as $color)
                                <option value="{{$color->id}}">{{$color->title}}</option>
                              @endforeach
                          </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label for="comment">Комментария:</label>
                          <textarea name="comment" rows="5" cols="40" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="ordered">Оплачена парковка?</label><br>
                        <input type="checkbox" name="ordered">
                      </div>
                      <div class="form-group">
                        <button type="button" name="button" class="btn btn-primary btn-submit">Сохранить</button>
                      </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection
