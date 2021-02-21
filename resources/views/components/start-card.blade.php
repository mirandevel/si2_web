@props(['empresa'])
<a href="{{route('emp.dashboard',['empresa'=>$empresa])}}"
    class="border border-blue-200 rounded-2xl p-5 flex flex-col justify-center
    bg-white flex justify-center group border-indigo-500 hover:bg-white hover:shadow-lg hover:border-transparent ">
    {{$slot}}
</a>
