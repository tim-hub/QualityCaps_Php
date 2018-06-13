
<form action="{{route('carts.store')}}" method="POST">
    {!! csrf_field() !!}
    <input type="hidden" name="id" value="{{ $cap->id }}">
    <input type="hidden" name="name" value="{{ $cap->name }}">
    <input type="hidden" name="price" value="{{ $cap->price }}">
    <input type="submit" class="btn btn-success btn-lg" value="Add to Cart">
</form>
