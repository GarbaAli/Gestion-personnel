$(function(){

   $('#form_poste').submit(function(e){

       $('#submitposte').attr('disabled',true);
       $('#submitposte').attr('value','chargement...');

       e.preventDefault();
       $.post(
           'post/new_poste.php',
           {
               postes : $('#postes').val()
           },
           function(data){
               if(data.error === 'ok'){
                   document.location.reload(true);
                   alertify.success('Nouveau Poste inserrer avec success');
               }else{
                    alertify.error('Ce champ est requis!');
                   $('#submitposte').attr('value','Desoler! :( Reesayer');
                   $('#submitposte').attr('disabled',false);
               }
           },
           "json"

       )


   });
})
