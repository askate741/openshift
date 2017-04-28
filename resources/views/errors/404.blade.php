@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul style="color:red;">
            @foreach ($errors->all() as $error)
                <li>{{ trans($error) }}</li>
            @endforeach
        </ul>
    </div>
@endif