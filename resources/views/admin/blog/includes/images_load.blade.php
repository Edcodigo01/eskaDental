
    @if (isset($images))
        @foreach ($images as $key => $image)
            @include('admin.blog.includes.card_image')
        @endforeach
    @endif
