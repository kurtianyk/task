@extends('layouts.app')

@section('content')
@foreach ($contacts as $contact)

        <form action="/contact/edit/this/{{ $contact->id }}" method="POST" class="form-horizontal">
      {{ csrf_field() }}
        Контактні дані
          <input type="text" name="name"  placeholder="name" value="{{ $contact->name }}">
          <input type="text" name="surname"  placeholder="surname" value="{{ $contact->surname }}">
          <input type="tel" name="phone_number"  placeholder="phone_number" value="{{ $contact->phone_number }}">
          <input type="date" name="birth_day"   placeholder="birth_day" value="{{ $contact->birth_day }}">
          <input type="text" name="info"  placeholder="info" value="{{ $contact->info }}">
          <input type="hidden" name="id"   value="{{ $contact->id }}">


          <button type="submit">Надіслати відредагований контакт</button>
        </form>
         @if (isset($message))
          echo $message;

        @endif
        @endforeach
@endsection
