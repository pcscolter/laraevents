@extends('layouts.panel')
@section('title', 'Eventos')
@section('content')
    <form>
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-fill">
                <input type="text" name="search" class="form-control w-50 mr-2" value="{{$search}}" placeholder="Pesquisar...">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
            </div>
            <a href="{{ route('organization.events.create') }}" class="btn btn-primary">Novo evento</a>
        </div>
    </form>
    <table class="table mt-4">
        <thead class="thead bg-white">
            <tr>
                <th>Nome</th>
                <th>Palestrante</th>
                <th>Início</th>
                <th>Fim</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <!-- CONTEÚDO DA TABELA -->

            @foreach ($events as $event)
                <tr>
                    <td class="align-middle">{{$event->name}}</td>
                    <td class="align-middle">{{$event->speaker_name}}</td>
                    <td class="align-middle">{{$event->start_date_formatted}}</td>
                    <td class="align-middle">{{$event->end_date_formatted}}</td>
                    <td class="align-middle">
                        <div class="d-flex align-items-center">
                            <a href="{{ route('organization.events.edit', $event->id) }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-edit"></i>
                            </a>
                        </div>
                        <form action="{{route('organization.events.detroy', $event->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm confirm-submit">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $events->withQueryString()->links() }}
@endsection


@section('js')
    <script>
        $(document).on('click', '.confirm-submit', function(event){
            event.preventDefault();
            const confirmation = confirm('Tem certeza que deseja excluir esse evento? ');


            if(confirmation){
                const form = $(this).parent();
                form.trigger('submit');
            }

        })
    </script>
@endsection
