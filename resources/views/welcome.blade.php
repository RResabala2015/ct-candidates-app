@extends('default')

@section('app')
<div id="app">
  <v-card >
  <a class="btn btn-warning" href="/todolist">Hello From Laravel</a> 
    
  </v-card>  
          
</div>
@endsection

@section('vue')
    <script>
        new Vue({
            el: '#app',
            vuetify: new Vuetify(),
            data: () => ({

            }),
            mounted() {
                
            },
            methods: {

            }                
        });
    </script>
@show
