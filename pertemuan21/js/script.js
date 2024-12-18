$(function(){  // cek ready dom nya dlu
    
    // event ketika keyword ditulis
    $('#keyword').on('keyup',function(){
        //munculkan icon loading
        $('.loader').show();
        

        // ajax menggunakan load (mengambik data dari sumber menggunakan GET)
        // $('#container').load('ajax/portfolio.php?keyword=' + $('#keyword').val());


        // // ajak menggunakan $.get()
        $.get('ajax/portfolio.php?keyword='+$('#keyword').val(),function(data){
            $('#container').html(data);
            $('.loader').hide();
            
        })
    });



});



