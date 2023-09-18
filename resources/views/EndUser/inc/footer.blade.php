<footer class="container-fluid bg-blue text-white py-3">
    <div class="row gap-2">

        <div class="col-sm order-sm-1">
            <h1 class="h1">{{app('settings')['about_us']}}</h1>
            <p>{{app('settings')['us']}}</p>
        </div>
        <div class="col-sm order-sm-2">
            <h1 class="h1">Links</h1>
            <div class="links d-flex gap-2 flex-wrap">
                <a href="{{route('index')}}" class="link text-white">Home</a>
                <a href="{{route('major.index')}}" class="link text-white">Majors</a>
                <a href="{{route('doctor.index')}}" class="link text-white">Doctors</a>
                @guest
                    <a href="{{route('login')}}" class="link text-white">Login</a>
                    <a href="{{route('register')}}" class="link text-white">Register</a>
                @endguest
                <a href="{{route('contact.index')}}" class="link text-white">Contact</a>
                @auth
                    <form action="{{route('logout')}}" method="post" class="link text-white"  >
                        @csrf
                        <button class="border-0" > logout </button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</footer>

@stack('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"
        integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('EndUserAssets')}}/assets/scripts/home.js"></script>



</body>

</html>
