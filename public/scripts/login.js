
function clickeye()
{
    let pass = document.getElementById("pass");
    let eye = document.getElementById("Eye");
    if(pass.type == "password")
    {
        pass.type = "text";
        eye.className = "fa fa-eye";
    }
    else
    {
        pass.type = "password";
        eye.className = "fa fa-eye-slash";
    }
}

function newPasswordEye()
{
    let pass = document.getElementById("newPasswordInput");
    let eye = document.getElementById("newPassword");
    if(pass.type == "password")
    {
        pass.type = "text";
        eye.className = "fa fa-eye";
    }
    else
    {
        pass.type = "password";
        eye.className = "fa fa-eye-slash";
    }
}


function navbarOpen()
{
    let x = document.getElementById("myLinks");
  if (x.style.display === "flex") {
    x.style.display = "none";
  } else {
    x.style.display = "flex";
  }
}




