@if (session()->has('message'))
<div class="alert alert-success"
x-data="{show: true}" 
x-init="setTimeout(() => show = false, 3000)"
x-show="show"
id="myalert">
    {{session('message')}}
</div>


<style>
    #myalert{
        position: absolute; 
        top:20px; 
        left:40%;
        z-index:12;
    }
</style>
@endif