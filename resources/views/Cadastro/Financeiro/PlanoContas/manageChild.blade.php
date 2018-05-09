<ul>
    @foreach($childs as $child)
        <li>
            {{ $child->codconta.' - '.$child->descricao }}
            @if(count($child->childs))
                @include('cadastro.financeiro.planocontas.manageChild',['childs' => $child->childs])
            @endif
        </li>
    @endforeach
</ul>