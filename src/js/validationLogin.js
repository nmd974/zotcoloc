document.getElementById('loginConnect').addEventListener("click", (e)=>{  
    e.preventDefault();
    //Verification du login
    loginPage();
    if ($('#loginPage').valid()){ 
        document.getElementById('loginPage').submit();
    };   
});