let container = document.getElementById('container')

toggle = () => {
	container.classList.toggle('sign-in')
	container.classList.toggle('sign-up')
}

setTimeout(() => {
	container.classList.add('sign-in')
}, 200);

function entrar() {
	window.location.href = "http://localhost/easyContability/dashboard/index2.php#painel";
}