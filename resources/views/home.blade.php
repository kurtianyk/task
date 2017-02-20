

@extends('layouts.app')

@section('content')


        <form action="/contact" method="POST" class="form-horizontal">
      {{ csrf_field() }}
        Контактні дані
          <input type="text" name="name"  placeholder="name">
          <input type="text" name="surname"  placeholder="surname">
          <input type="tel" name="phone_number"  placeholder="phone_number">
          <input type="date" name="birth_day"   placeholder="birth_day">
          <input type="text" name="info"  placeholder="info">


          <button type="submit">Додати контакт</button>
        </form>
         @if (isset($message)) {
          echo $message;
        }
        @endif
  <!-- TODO: В кого дн найближчих 5 днів, 10 днів -->
@endsection
