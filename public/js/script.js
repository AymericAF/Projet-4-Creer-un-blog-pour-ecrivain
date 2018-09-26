$(document).ready(function(){
    window.addEventListener('load', function(){
        TinyTextButtonNewBillet.loading();
        TinyTextButtonNewBillet.clic();
    })
})

var TinyTextButtonNewBillet = {
    loading: function(){
        document.getElementById('newBilletForm').style.display='none';
    },
    clic: function(){
        var button = document.getElementById('tinyTextButtonNewBillet');
        button.addEventListener('click', function(){
            document.getElementById('newBilletForm').style.display='block';
        })
    }
}