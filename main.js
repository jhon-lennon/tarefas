const btnMobile = document.getElementById('btn-mobile');

function toggleMenu(event) {
  if (event.type === 'touchstart') event.preventDefault();
  const nav = document.getElementById('nav');
  nav.classList.toggle('active');
  const active = nav.classList.contains('active');
  event.currentTarget.setAttribute('aria-expanded', active);
  if (active) {
    event.currentTarget.setAttribute('aria-label', 'Fechar Menu');
  } else {
    event.currentTarget.setAttribute('aria-label', 'Abrir Menu');
  }
}

btnMobile.addEventListener('click', toggleMenu);
btnMobile.addEventListener('touchstart', toggleMenu);
//código do simulador dd ganhos
var capturando = "";

function capturar(){
  capturando = document.getElementById('valor').value;
  document.getElementById('valorDigitado').innerHTML =  `fazendo ${capturando} ações diariamente, durante 30 dias, você receberá esse valor no fim do mês R$` + capturando * 0.006 * 30 ;
}


/*função do fórmulario*/
   
   

