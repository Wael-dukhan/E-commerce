alert('hi');
dark_btn=document.getElementById('dark_btn');
white_btn=document.getElementById('white_btn');
html=document.getElementById('html');
nav_header=document.getElementById('nav_header');
footer=document.getElementById('footer');
category_header=document.getElementById('category_header');
main=document.getElementById('main');
dark_btn.onclick=function(){
    // alert('hiiii');
    dark_btn.style.background='rgb(1, 1, 19)';
    dark_btn.style.color='black';
    document.body.style.background='rgb(1, 1, 19)';
    document.body.style.transition='0.7s';
    html.style.background='rgb(1, 1, 19)e';
    html.style.color='black';
    nav_header.style.background='rgb(1, 1, 19)';
    nav_header.style.color='black';
    footer.style.background='rgb(1, 1, 19)';
    footer.style.color='black';
    category_header.style.background='rgb(1, 1, 19)';
    category_header.style.color='rgb(19, 29, 116)';
    main.style.background='rgb(1, 1, 19)';
    main.style.color='rgb(19, 29, 116)';
}

white_btn.onclick=function(){
    white_btn.style.background='rgb(1, 1, 19)';
    white_btn.style.color='rgb(239, 239, 250)';
    document.body.style.background='rgb(1, 1, 19)';
    document.body.style.transition='0.7s';
    html.style.background='rgb(1, 1, 19)';
    html.style.color='rgb(239, 239, 250)';
    nav_header.style.background='rgb(1, 1, 19)';
    nav_header.style.color='rgb(239, 239, 250)';
    footer.style.background='rgb(1, 1, 19)';
    footer.style.color='rgb(239, 239, 250)';
    category_header.style.background='rgb(1, 1, 19)';
    category_header.style.color='rgb(239, 239, 250)';
    main.style.background='rgb(1, 1, 19)';
    main.style.color='rgb(239, 239, 250)';
}