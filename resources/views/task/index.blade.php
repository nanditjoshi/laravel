@extends('layouts.app')
@section('content')

<h1>All Task</h1>
<div class="jumbotron text-center">
  <table>
    <tr>
        <th>Title</th>
        <th>Description</th>
    </tr>
    @foreach ($tasks as $t)
        <tr>
          <td>{{ $t->title }}</td>
          <td>{!!$t->description!!}</td>
        </tr>
    @endforeach
  </table>

</div>
@endsection
