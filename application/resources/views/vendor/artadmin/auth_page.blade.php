@include("artadmin::parts.header")


<div class="total-wrapper">






@include("artadmin::parts.sidebar")



<main>
    @if(\Illuminate\Support\Facades\Session::has("error"))
    <div class="alert alert-danger">
        <p>{{ \Illuminate\Support\Facades\Session::get("error") }}</p>
    </div>
    @endif

        @if(\Illuminate\Support\Facades\Session::has("success"))
            <div class="alert alert-success">
                <p>{{ \Illuminate\Support\Facades\Session::get("success") }}</p>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    @section('content')

    @show


</main>

</div>
@include("artadmin::parts.footer")

