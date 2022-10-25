<!DOCTYPE html>
<html lang="en">
<head>
    <title>Iksan Arya Dinata {{ $title }}</title>
    @include('components.head')

    <style>
    	* {
    		font-family: 'Poppins', sans-serif;
    	}
    	.jumbotron {
    		padding: 6rem 1rem;
    		background: #e2edff;
    	}
    	.nav-link {
    		color: white;
    	}
    	#projects {
    		background: #e2edff;
    	}
    	section {
    		padding-top: 5rem;
    	}
    	.container2 {
    		width: 100%;
    	}
    </style>
</head>
<body>
    @include('components.navbar')

    <div>
	    @yield('content')
        
	    @include('components.footer')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>