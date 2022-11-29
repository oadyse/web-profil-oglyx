@include('layout_dashboard.header')

<body class=" ">

    <div class="wrapper">
        <section class="login-content">
            <div class="container h-100">
                <div class="row align-items-center justify-content-center h-100">
                    <div class="col-md-5">
                        <div class="card p-3">
                            <div class="card-body">
                                <div class="auth-logo">
                                    <img src="{{ asset('dashboard') }}/assets/images/Logo.png "
                                        class="img-fluid  rounded-normal  darkmode-logo" alt="logo">
                                    <img src="{{ asset('dashboard') }}/assets/images/Logo.png"
                                        class="img-fluid rounded-normal light-logo" alt="logo">
                                </div>
                                <h3 class="mb-3 font-weight-bold text-center">vLog In</h3>
                                <form>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="text-secondary">Email</label>
                                                <input class="form-control" type="email" placeholder="Enter Email">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-2">
                                            <div class="form-group">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label class="text-secondary">Password</label>
                                                </div>
                                                <input class="form-control" type="password"
                                                    placeholder="Enter Password">
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('menu-dashboard') }}" class="btn btn-primary btn-block mt-2">Log
                                        In
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('layout_dashboard.script')

</body>

</html>
