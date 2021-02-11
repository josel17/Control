 <form method="POST" action="{{route('persona.usuarios.roles.destroy',$role)}}">
    @csrf
    @method('DELETE')
    <button href="#" class="fa fa-trash red fa-1x btn btn-link "
     onclick="return confirm('¿Estás seguro de querer eliminar este Role?')">
    </button>
</form>