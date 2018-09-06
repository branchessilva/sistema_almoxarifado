
		function myFunction() {
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
		
		<!--Função que esconde e mostra um campo-->
		function addCampos() {
			var qtdeCampos = 0;
			/*https://forum.imasters.com.br/topic/325267-resolvido-adicionar-remover-campos-dinamicamente/ */
			var objPai = document.getElementById("campoPai");
			/*Criando o elemento DIV*/
			var objFilho = document.createElement("div");
			//Definindo atributos ao objFilho:
			objFilho.setAttribute("id","filho"+qtdeCampos);

			/*Inserindo o elemento no pai:*/
			objPai.appendChild(objFilho);
			/*Escrevendo algo no filho recém-criado: */
			document.getElementById("filho"+qtdeCampos).innerHTML = "<fieldset><legend> <font size='4' color='#FFFFFF'> Material </font> </legend><label> <font size='4' color='#FFFFFF'>C&oacutedigo: </font> <input type='text' id='codigo"+qtdeCampos+"' name='campo[]' onkeypress='return SomenteNumero(event)'></label><br /><label> <label>  <font size='4' color='#FFFFFF'> Descrição: </font> <input type='text' id='codigo"+qtdeCampos+"' name='campo[]'></label><br /><label> <font size='4' color='#FFFFFF'> Quantidade: </font> <input type='text' id='local"+qtdeCampos+"' name='campo[]' onkeypress='return SomenteNumero(event)'></label><br /> <label> <font size='4' color='#FFFFFF'> Unidade: </font>  <input type='text' id='codigo"+qtdeCampos+"' name='campo[]'></label><br/><input type='button' value='Remover item' onClick='removerCampo("+qtdeCampos+")'><label><label>";
			qtdeCampos++;
		}

		function removerCampo(id) {
			var objPai = document.getElementById("campoPai");
			var objFilho = document.getElementById("filho"+id);

			/* Removendo o DIV com id específico do nó-pai: */
			var removido = objPai.removeChild(objFilho);
		}