<html>
<head>
 <title>Laravel Livewire Dependant Dropdown - NiceSnippets.com</title>
 <script src="{{assets('js/app.js')}}" defer></script>
 <link href="{{assets('css/app.css')}}" rel="stylesheet">
 @livewireStyles
</head>
<body>
    <div class="container">
     <div class="row justify-content-center mjt-5">
      <div class="col-md-8">
       <div class="card">
        <div class="card-header bg-dark text-white">
        <h3>Laravel Livewire Dependant Dropdown - NiceSnippets.com</h3>
        </div>
        <div class="card-body"></div>
        @livewire('statecity')
        </div>
       </div>
      </div>
     </div>
     </div>
     @livewireScripts
</body>
</html>