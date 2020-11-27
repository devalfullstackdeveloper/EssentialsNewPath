
$("#IMPORTFORM").on('submit',(function(e) { //alert();
    if(e.isDefaultPrevented()){
    }else{
        
            $(".btn1").hide();
            $(".btn2").show();
            $(".btn3").hide();
            $(".hidediv").hide();
            e.preventDefault();

          
            var curl = config.routes.import;
            // curl = curl.replace('public/','');
            // alert(curl);
            $.ajax({
                url:curl, // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data:new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache:false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                success: function(data)   // A function to be called if request succeeds
                {
                    data = JSON.parse(data);
                    
                    if(data.status){
                        // swal({
                        //       title: "Success!",
                        //       text: data.message,
                        //       icon: "success",
                        // }).then(result => {
                        //     location.reload();
                        // });

                        $(".successdiv").show();
                        $(".successmsg").html(data.message);
                        setTimeout(function(){
                          // location.reload();
                        },5000);
                    }else{
                         // swal({
                         //      title: "Error!",
                         //      text: data.message,
                         //      icon: "error",
                         // });
                         $(".btn1").show();
                         $(".btn2").hide();
                         $(".btn3").show();
                         $(".errordiv").show();
                         $(".errormsg").html(data.message);
                         setTimeout(function(){
                            // $(".errordiv").hide();
                         },2000);
                    }
                },
                    error:function(xhr){
                        if(xhr.status==500){
                            // swal({
                            //   title: "Warning!",
                            //   text: 'Something went wrong! Please try again',
                            //   icon: "warning",
                            // });
                             $(".btn1").show();
                             $(".btn2").hide();
                             $(".btn3").show();
                             $(".warningdiv").show();
                             $(".warningmsg").html('Something went wrong! Please try again');
                             setTimeout(function(){
                                $(".warningdiv").hide();
                             },2000);
                        }
                        if(xhr.status==422){
                            var error = JSON.parse(xhr.responseText);
                            var errorsHtml = '';
                            $.each(error['errors'], function (index, value) {
                                errorsHtml += value;  
                                errorsHtml +='<br>';
                            });
                            
                            // swal({
                            //   title: "Warning!",
                            //   text: errorsHtml,
                            //   icon: "warning",
                            // });
                             $(".btn1").show();
                             $(".btn2").hide();
                             $(".btn3").show();

                             $(".warningdiv").show();
                             $(".warningmsg").html(errorsHtml);
                             setTimeout(function(){
                                $(".warningdiv").hide();
                             },5000);
                        }
                    }
            });
       
        
    }
}));