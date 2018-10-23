
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

		<!-- Apenas conrima o envio do formulário -->
		function confirma() {
			confirm("Confirma cadastro?");
			
			
		}
		
        /*var id ; //Variavel global
        //Pega o id do pedido na tebela de pedidos feitos 
		function pegaPedido(idPedido) {
            var id = idPedido;
            console.log(id);
            console.log( devolveId() );
		}
		function devolveId()
        {
            return id=1;
        }*/

		function addItem()
		{
			var campos_max          = 10;   //max de 10 campos
			var x = 1; // campos iniciais
				if (x < campos_max) 
				{
					$('#lista_itens').append('<div>\
					<input type="text" name="campo[]" v>\
					<a href="#" class="remover_campo">Remover</a>\
					</div>');
					x++;
				}
			 
			// Remover o div anterior
			$('#lista_itens').on("click",".remover_campo",function(e) {
				e.preventDefault();
				$(this).parent('div').remove();
				x--;
			});
		}


        $(document).ready(function(){
            /*Remove o campo quando o usuário for editar*/
            $('#lista_itens_editar').on("click",".remover_campo",function(e) {
                    e.preventDefault();
                    $(this).parent('div').remove();
            });
            
            //Para filtro da tabela
            //$('input#txt_consulta').quicksearch('table#tabela tbody tr');
            
            //Pega o id do item na tabela do usuario comum
            $(".btn_idPedido").on('click', function(){
                var idPedido = ($(this).attr('id'));
                window.location = "exibe_itens.php?Pedido="+idPedido;

            });
            
             //Pega o id do item na tabela do usuario autorizador
            $(".btn_idPedido_Autorizador").on('click', function(){
                var idPedido = ($(this).attr('id'));
                window.location = "exibe_itens_Autorizador.php?Pedido="+idPedido;

            });
            
            //Pega o id do item na tabela do usuario almoxarifado
            $(".btn_idPedido_Almoxarifado").on('click', function(){
                var idPedido = ($(this).attr('id'));
                window.location = "exibe_itens_Almoxarifado.php?Pedido="+idPedido;

            });
            
             //Pega o id do item na tabela usario 
            $(".btn_CancelaPedido").on('click', function(){
                var idPedido = ($(this).attr('id'));
                if (confirm('Tem certeza que quer cancelar o pedido?')){ 
                    window.location = "../ALMOXARIFADO/justifica_cancelamento.php?Pedido="+idPedido;
                }

            });
            
            /*usado na tabela do autorizador para pegar o id do pedido clicado*/
            $(".btn_EditarPedidoAutorizador").on('click', function(){
                var idPedido = ($(this).attr('id'));
                window.location = "../AUTORIZADO/editar_Pedido_Criado_Autorizador.php?Pedido="+idPedido;
            });
            
             /*usado na tabela do ALMOXARIFADO para pegar o id do pedido clicado*/
            $(".btn_EditarPedidoAlmoxarifado").on('click', function(){
                var idPedido = ($(this).attr('id'));
                window.location = "../ALMOXARIFADO/editar_Pedido_Criado_Almoxarifado.php?Pedido="+idPedido;
            });
            
            /*Aprova um pedido pendenete*/
            $(".btn_AprovarPedidoAutorizador").on('click', function(){
                var idPedido = ($(this).attr('id'));
               if (confirm('Tem certeza que quer aprovar o pedido?')){ 
                    window.location = "aprova_pedido.php?Pedido="+idPedido;
                }
            });
            
            //Pega o id do item na tabela
            $(".btn_EditarPedido").on('click', function(){
                var idPedido = ($(this).attr('id'));
                window.location = "editar_Pedido_Criado.php?Pedido="+idPedido;

            });
            
            //FILTRO DA TABELA
            //$(document).ready(function() {
                $('#tabela').dataTable( {
                    "aLengthMenu": [[10,25,50,100,-1], [10,25,50,100,"Todos"]]
                });
            //});

      });
       
		/*função que pega os dados do BD e exibe no campo dinâmico*/
		function carregarItens(){
			//variáveis
			var itens = "";
			//Capturar Dados Usando Método AJAX do jQuery
			$.ajax({
				type: 'POST',
                dataType: 'json',
                url: '../carregaBD.php',
                async: true,
				error: function (jqXHR, exception) {
					var msg = '';
					if (jqXHR.status === 0) {
						msg = 'Not connect.\n Verify Network.';
					} else if (jqXHR.status == 404) {
						msg = 'Requested page not found. [404]';
					} else if (jqXHR.status == 500) {
						msg = 'Internal Server Error [500].';
					} else if (exception === 'parsererror') {
						msg = 'Requested JSON parse failed.';
					} else if (exception === 'timeout') {
						msg = 'Time out error.';
					} else if (exception === 'abort') {
						msg = 'Ajax request aborted.';
					} else {
						msg = 'Uncaught Error.\n' + jqXHR.responseText;
					}
					console.log(msg);
				},
                success: function (retorno){	
					if(retorno[0].erro)
					{
						$("h2").html(retorno[0].erro);
					}else{
						itens +="<div id='div_pedidos'>\<select name='itens[]' class='combobox' required>\<option value=''>Selecione um item</option>";
						//Laço para criar linhas da tabela
						for(var i = 0; i<retorno.length; i++)
						{
							itens += "<option value="+retorno[i].cod_item+">"+retorno[i].nome+"-"+retorno[i].unidade_Tipo+"</option>";
						}
						itens +="</select>";
						itens +="<input name='quantidade[]' required='required' type='text'  placeholder='Quantidade' onkeypress='return SomenteNumero()'>\<a href='#' class='remover_campo text-danger'>Remover</a>\</div>";
						$('#lista_itens').append(itens);
						
						$('#lista_itens').on("click",".remover_campo",function(e) {
							e.preventDefault();
							$(this).parent('div').remove();
						});
					}
				}
			});
		}
