
		function cria_Botao_NavBar() {
			var x = document.getElementById("myTopnav");
			if (x.className === "topnav") {
				x.className += " responsive";
			} else {
				x.className = "topnav";
			}
		}
		
		function SomenteNumero(e){
			var tecla=(window.event)?event.keyCode:e.which;   
			if((tecla>47 && tecla<58)) return true;
			else{
				if (tecla==8 || tecla==0) return true;
			else  return false;
			}
		}
		
		var qtdeCampos = 0;
		<!--Função que esconde e mostra um campo-->
		function addCampos() {
			var objPai = document.getElementById("campoPai");
			//Criando o elemento DIV;
			var objFilho = document.createElement("div");
			//Definindo atributos ao objFilho:
			objFilho.setAttribute("id","filho"+qtdeCampos);

			//Inserindo o elemento no pai:
			objPai.appendChild(objFilho);
			//Escrevendo algo no filho recém-criado:
			document.getElementById("filho"+qtdeCampos).innerHTML = "<input type='text' id='campo"+qtdeCampos+"' name='campo[]'> <input type='button' onClick='removerCampo("+qtdeCampos+")' value='Apagar campo'>";
			qtdeCampos++;
		}

		function removerCampo(id) {
			var objPai = document.getElementById("campoPai");
			var objFilho = document.getElementById("filho"+id);

			/* Removendo o DIV com id específico do nó-pai: */
			var removido = objPai.removeChild(objFilho);
		}
		
		<!-- Função para validar a matricula -->
		function valida_Matricula()
		{
			var matricula = document.formulario.matricula.value;
			if((matricula.length <= 7) && (matricula.length >= 1))
			{
				alert("Matricula inválida!");
				document.getElementById('matricula').value=''; 
				return false;
			}
		}
		
		<!-- Função para validar a nome -->
		function valida_Nome()
		{
			/*Exp. Regular para validar nomes */
			var exp = /^(?![ ])(?!.*[ ]{2})((?:e|da|do|das|dos|de|d'|D'|la|las|el|los)\s*?|(?:[A-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð'][^\s]*\s*?)(?!.*[ ]$))+$/
			var nome = document.formulario.nome.value;
			if(!exp.test(nome) && nome!='')
			{
				alert("Nome inválido!");
				document.getElementById('nome').value='';
			}
		}
		
		function confirma() {
			confirm("Confirma o cadastro?");
		}