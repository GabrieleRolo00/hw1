//-------LOGIN---------
//Vedere password
const container = document.querySelector(".container"),
      pwShowHide = document.querySelectorAll(".showHidePw"),
      pwFields = document.querySelectorAll(".password"),
      signUp = document.querySelector(".signup-link"),
      login = document.querySelector(".login-link");

      pwShowHide.forEach(eyeIcon =>{
          eyeIcon.addEventListener("click", ()=>{
              pwFields.forEach(pwFields =>{
                  if(pwFields.type === "password"){
                      pwFields.type = "text";

                      pwShowHide.forEach(icon =>{
                          icon.classList.replace("bx-low-vision","bx-show");
                      })
                  }else{
                      pwFields.type = "password";

                      pwShowHide.forEach(icon =>{
                        icon.classList.replace("bx-show","bx-low-vision");
                    })
                  }
              })
          })
      })

//cambio container

      signUp.addEventListener("click", ()=>{
          container.classList.add('active');
          loginForm.classList.remove('error');
          textEmail.textContent = "";
          textPass.textContent = "";
      })

      login.addEventListener("click", ()=>{
        container.classList.remove('active');
        regForm.classList.remove('error');
        textNome.textContent = "";
        textEmailR.textContent = "";
        textPassR.textContent = "";
    })


//controllo dati login


const loginForm = document.querySelector('#formLogin'),
      inEmail = loginForm.querySelector('#emailLogin'),
      inPass = loginForm.querySelector('.password'),
      textEmail = loginForm.querySelector('#textErrEmail'),
      textPass = loginForm.querySelector('#textErrPass');

loginForm.querySelector("#btnLogin").addEventListener("click", validazioneLog); 

function validazioneLog(event){

    
    let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

    if(inEmail.value == ""){
        loginForm.classList.add('error');
        textEmail.textContent = "Email can't be blank";
        event.preventDefault();
    }else if(!inEmail.value.match(pattern)) {
        loginForm.classList.add('error');
        textEmail.textContent = "Please enter a valid email";
        event.preventDefault();
    }else
    {
        textEmail.textContent = "";
    }

    if(inPass.value == ""){
        loginForm.classList.add('error');
        textPass.textContent = "Password can't be blank";
        event.preventDefault();
    }else{
        textPass.textContent = "";
    }

    
}


//controllo dati register

const regForm = document.querySelector('#formReg'),
      nome = document.querySelector('#nome'),
      inEmailR = regForm.querySelector('#emailReg'),
      inPassR = regForm.querySelectorAll('.password'),
      textNome = regForm.querySelector('#textErrNome'),
      textEmailR = regForm.querySelector('#textErrEmail'),
      textPassR = regForm.querySelector('#textErrPass'),
      icons = regForm.querySelectorAll('.icon');


      regForm.querySelector("#btnReg").addEventListener("click", validazioneReg);

      function validazioneReg(event){
      
          
          let patternEmail = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
          let patternPass = /^(?=^.{6,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/; 
      
          if(nome.value == ""){
            regForm.classList.add('error');
            textNome.textContent = "Nome can't be blank";
            event.preventDefault();
            }else{
                textNome.textContent = "";
            }


          if(inEmailR.value == ""){

            regForm.classList.add('error');
            textEmailR.textContent = "Email can't be blank";
              event.preventDefault();

          }else if(!inEmailR.value.match(patternEmail)) {

            regForm.classList.add('error');
            textEmailR.textContent = "Please enter a valid email";
              event.preventDefault();
          }else
          {
            textEmailR.textContent = "";
          }

      
          if(inPassR[0].value == "" || inPassR[1].value == ""){
            regForm.classList.add('error');
            textPassR.textContent = "Password can't be blank";
              event.preventDefault();

          }else if(inPassR[0].value != inPassR[1].value){
            regForm.classList.add('error');
            textPassR.textContent = "Please insert same passwords";
              event.preventDefault();

          }else if(!inPassR[0].value.match(patternPass) || !inPassR[1].value.match(patternPass) ){
            regForm.classList.add('error');
            textPassR.textContent = "Inserisci almeno 6 caratteri, un numero, una lettera maiuscola, una lettera minuscola e un carattere speciale";
              event.preventDefault();

          }else{
            textPassR.textContent = "";
          }
      
          
      }

function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
    }