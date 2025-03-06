    document.querySelector("#show-login").addEventListener("click", function(){
    document.querySelector(".wrapper").classList.add("aktif");
    });
    document.querySelector(".wrapper .close-btn").addEventListener("click", function(){
        document.querySelector(".wrapper").classList.remove("aktif");
    });


    

    const signInBtnLink = document.querySelector('.signInBtn-link');
    const signUpBtnLink = document.querySelector('.signUpBtn-link');
    const wrapper = document.querySelector('.wrapper');
    signUpBtnLink.addEventListener('click', () => {
        wrapper.classList.toggle('active');
    });
    signInBtnLink.addEventListener('click', () => {
        wrapper.classList.toggle('active');
    });
