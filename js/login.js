$(document).ready(function(){
    /* create ref to UI controls */
    var un = $('#usr');
    var pswd = $('#pswrd')

    /**
     * handle login button when clicked
     */
    $('#logBtn').click(function(e){
        e.preventDefault();
        if(checkInput()){
          $('#loginFrm').submit();
        }
    })

    /**
     * Check to ensure that the user has input something in both username and password textbox,
     * also with the required string length and return true, 
     * if not return false
     */
    function checkInput(){
        let result = false;

        if(un.val().length > 5 && pswd.val().length > 7){
            result = true
        }      
       
        return result;
    }
});

