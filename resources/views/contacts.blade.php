@extends('layouts.app')

@section('content')


  <!--Теперішні контакти -->
  @if (count($contacts) > 0)
    <div>
      <div>
        Ваші контакти
      </div>

      <div>
        <table>

          <!-- Заголовок таблиці -->
          <thead>
            <th>Contact</th>

          </thead>

          <!-- Тіло таблиці -->
          <tbody>
            @foreach ($contacts as $contact)
              <tr>
                <!-- Ім'я людини -->
                <td>

                  <div>{{ $contact->name }}</div>
                </td>
                <td>
                  <div>{{ $contact->surname }}</div>
                </td>
                <td>
                  <div>{{ $contact->phone_number }}</div>
                </td>
                <td>
                  <div>{{ $contact->birth_day }}</div>
                </td>
                <td>
                  <div>{{ $contact->info }}</div>
                </td>

                <td>
                  <!-- TODO: Кнопка Редагувати -->
                </td>
                <td>
                  <form action="/contact/delete/{{ $contact->id }}" method="POST">
                   {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button>Видалити контакт</button>
                        </form>
                  </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
   @endif
@endsection
