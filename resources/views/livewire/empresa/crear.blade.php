<div>
    <x-jet-validation-errors class="mb-4" />

    <form wire:submit.prevent="save">
        @csrf
        <div class="mt-4 flex justify-center">
            <img  id="image" class="h-3/4 w-3/4" src="{{$photoTemp}}">
        </div>
        <div class="mt-4 flex justify-center">
            <x-jet-button id="select" type="button">Seleccionar imagen</x-jet-button>

        </div>

        <div class="mt-4">
            <x-jet-label for="nit" value="{{ __('NIT') }}" />
            <x-jet-input id="nit" wire:model="nit" class="block mt-1 w-full" type="number" name="nit" :value="old('nit')" required autofocus/>
        </div>

        <div>
            <x-jet-label for="nombre" value="{{ __('Nombre') }}" />
            <x-jet-input id="nombre" wire:model="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required />
        </div>




        <div class="flex items-center justify-center mt-4">
            <x-jet-button class="ml-4" id="send" type="button">
                {{ __('Guardar') }}
            </x-jet-button>
        </div>
    </form>

    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-app.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
         https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-storage.js"></script>
<script>
    var ImgName,ImgURl;
    var files=[];
    var reader=new FileReader();

    var firebaseConfig = {
        apiKey: "AIzaSyBU9StoOCTr5N17b8w7MpiAU0MGgGks8K8",
        authDomain: "si-2-5abca.firebaseapp.com",
        projectId: "si-2-5abca",
        storageBucket: "si-2-5abca.appspot.com",
        messagingSenderId: "784239077649",
        appId: "1:784239077649:web:97c63a985cc3dacde944b0",
        measurementId: "G-6EDF0QWQZ3"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();

    document.getElementById("select").onclick=function (e){
        var input=document.createElement('input');
        input.type='file';

        input.onchange=e=>{
            files=e.target.files;
            reader=new FileReader();
            reader.onload=function (){
                //document.getElementById("image").src=reader.result;
                Livewire.emit('temp',reader.result);
            }
            reader.readAsDataURL(files[0]);
        }
        input.click();
    }

    document.getElementById("send").onclick=function (){
        console.log('click');
        if( document.getElementById('nit').value === '' || document.getElementById('nombre').value === '' ){
            alert('rellene todos los campos');
        }else{
            ImgName=document.getElementById('nombre').value;
            var uploadTask=firebase.storage().ref('Empresas/'+ImgName+".png").put(files[0]);

            uploadTask.on('state_changed', function(snapshot){
                var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
                console.log('Upload is ' + progress + '% done');
            }, function(error) {
                // Handle unsuccessful uploads
                console.log(error);
            }, function() {
                // Handle successful uploads on complete
                // For instance, get the download URL: https://firebasestorage.googleapis.com/...
                uploadTask.snapshot.ref.getDownloadURL().then(function(downloadURL) {
                    console.log('File available at', downloadURL);
                    Livewire.emit('registrar',downloadURL);
                });
            });
        }


    }

</script>
</div>
