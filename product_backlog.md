#  Product Backlog

Este documento contém o Backlog de Produtos estruturado em formato de **Histórias de Usuário (User Stories)** com base nos requisitos funcionais do projeto.

---

##  Sumário
- [Épico 1: Autenticação e Gestão de Acesso](#-épico-1-autenticação-e-gestão-de-acesso)
- [Épico 2: Gerenciamento de Produtos](#-épico-2-gerenciamento-de-produtos)
- [Épico 3: Gestão de Perfil do Usuário](#-épico-3-gestão-de-perfil-do-usuário)

---

##  Épico 1: Autenticação e Gestão de Acesso

###  US-001: Cadastro de Usuário
* **Origem:** RF-001, RF-002
* **Prioridade:**  Alta
* **História de Usuário:**
  * **Como** usuário visitante,
  * **Quero** criar uma conta na plataforma,
  * **Para que** eu possa acessar áreas e funcionalidades restritas.
* **Critérios de Aceitação:**
  - [ ] Solicitar obrigatoriamente `Nome`, `E-mail` e `Senha`.
  - [ ] Validar entradas vazias ou em formatos inválidos exibindo mensagem de erro clara.
  - [ ] Recusar o cadastro se o e-mail informado já estiver cadastrado no banco de dados.
  - [ ] Exibir mensagem indicando o sucesso ou a falha no processo de cadastro.

---

### US-002: Login no Sistema
* **Origem:** RF-003
* **Prioridade:**  Alta
* **História de Usuário:**
  * **Como** usuário cadastrado,
  * **Quero** me autenticar usando minhas credenciais (e-mail e senha),
  * **Para que** eu possa acessar minha conta.
* **Critérios de Aceitação:**
  - [ ] Validar credenciais informadas no banco de dados.
  - [ ] Recusar o acesso em caso de dados inválidos.
  - [ ] A mensagem de erro não deve revelar informações sobre a existência prévia do e-mail ou dados de outros usuários.

---

###  US-003: Proteção de Páginas Privadas
* **Origem:** RF-004
* **Prioridade:**  Alta
* **História de Usuário:**
  * **Como** sistema,
  * **Quero** restringir o acesso às rotas internas, produtos e perfil,
  * **Para que** apenas usuários autenticados possam navegar nelas.
* **Critérios de Aceitação:**
  - [ ] Verificar a sessão do usuário antes de carregar qualquer página privada (`verifica_user.php`).
  - [ ] Bloquear e redirecionar tentativas de acesso não autorizado para a página inicial (`index.php`).

---

###  US-004: Encerramento de Sessão (Logout)
* **Origem:** RF-005
* **Prioridade:**  Alta
* **História de Usuário:**
  * **Como** usuário logado,
  * **Quero** encerrar minha sessão,
  * **Para que** outras pessoas não utilizem meu perfil no mesmo dispositivo.
* **Critérios de Aceitação:**
  - [ ] Destruir a sessão ativa no servidor de forma definitiva.
  - [ ] Bloquear o retorno às páginas privadas pelo botão "Voltar" do navegador após o logout.
  - [ ] Redirecionar o usuário diretamente para a página inicial (`index.php`).

---

##  Épico 2: Gerenciamento de Produtos

###  US-005: Cadastro de Produtos
* **Origem:** RF-006
* **Prioridade:**  Alta
* **História de Usuário:**
  * **Como** usuário administrador,
  * **Quero** cadastrar novos produtos,
  * **Para que** fiquem disponíveis no site.
* **Critérios de Aceitação:**
  - [ ] Exibir formulário com os campos: Nome, Preço, Descrição, Validade e Imagem.
  - [ ] Validar obrigatoriedade dos campos e conferir se já existe um produto com o mesmo nome no site.
  - [ ] Salvar informações no PostgreSQL associadas ao usuário autenticado.
  - [ ] Exibir retorno visual confirmando sucesso ou falha da ação.

---

### US-006: Listagem Geral de Produtos
* **Origem:** RF-007
* **Prioridade:**  Alta
* **História de Usuário:**
  * **Como** usuário,
  * **Quero** ver a lista de produtos cadastrados,
  * **Para que** eu conheça os itens disponíveis.
* **Critérios de Aceitação:**
  - [ ] Buscar e exibir todos os registros cadastrados a partir de consultas ao banco de dados.
  - [ ] Exibir para cada item: Nome, Preço, Data de Validade, Descrição, Quantidade em Estoque e URL da Imagem.
  - [ ] Apresentar mensagem adequada quando não houver produtos cadastrados.

---

### US-007: Pesquisa de Produtos por ID
* **Origem:** RF-009
* **Prioridade:**  Alta
* **História de Usuário:**
  * **Como** usuário,
  * **Quero** pesquisar um produto informando seu ID,
  * **Para que** eu encontre rapidamente um item específico.
* **Critérios de Aceitação:**
  - [ ] Buscar o número ID informado diretamente dentro do banco de dados.
  - [ ] Retornar e exibir apenas o produto selecionado.
  - [ ] Exibir a mensagem *"Produto não encontrado"* caso a busca não retorne resultados.

---

### US-008: Edição de Produto
* **Origem:** RF-010
* **Prioridade:**  Alta
* **História de Usuário:**
  * **Como** proprietário/criador da viagem ou produto,
  * **Quero** atualizar suas informações e fotos,
  * **Para que** os dados se mantenham corretos e atualizados.
* **Critérios de Aceitação:**
  - [ ] Preencher automaticamente os campos com os dados antigos ao abrir a tela de edição.
  - [ ] Permitir adição de novas fotos respeitando o limite máximo total de 10 fotos.
  - [ ] Validar que a `data_fim` não seja anterior à `data_inicio` e impedir datas futuras para início/fim.
  - [ ] Restringir a permissão de alteração apenas ao dono da viagem/produto.
  - [ ] Atualizar as informações no banco de dados e refletir a mudança na tela imediatamente.

---

###  US-009: Exclusão de Produto
* **Origem:** RF-011
* **Prioridade:**  Alta
* **História de Usuário:**
  * **Como** usuário administrador,
  * **Quero** remover produtos do sistema,
  * **Para que** itens descontinuados sejam excluídos definitivamente.
* **Critérios de Aceitação:**
  - [ ] Permitir a exclusão apenas para usuários autenticados como administradores.
  - [ ] Deletar permanentemente o registro do banco de dados e apagar os arquivos das fotos associadas.
  - [ ] Remover o item da interface imediatamente sem permitir novas visualizações.

---

### US-010: Visualizar Detalhes do Produto
* **Origem:** RF-008
* **Prioridade:**  Média
* **História de Usuário:**
  * **Como** usuário,
  * **Quero** consultar os detalhes completando de um produto,
  * **Para que** eu avalie suas especificações detalhadas.
* **Critérios de Aceitação:**
  - [ ] Exibir Nome, Preço, Data de Validade, Quantidade em Estoque e Fotos.
  - [ ] Garantir que o botão "Voltar" redirecione o usuário exatamente para a tela de onde veio (início).

---

##  Épico 3: Gestão de Perfil do Usuário

###  US-011: Atualização de Perfil de Clientes
* **Origem:** RF-013
* **Prioridade:**  Alta
* **História de Usuário:**
  * **Como** usuário administrador,
  * **Quero** alterar os dados cadastrais dos clientes,
  * **Para que** as informações da conta fiquem corretas.
* **Critérios de Aceitação:**
  - [ ] Validar os novos dados inseridos antes de salvar as alterações.
  - [ ] Salvar no banco de dados e atualizar na hora as informações da conta.

---

###  US-012: Exclusão de Conta
* **Origem:** RF-014
* **Prioridade:**  Alta
* **História de Usuário:**
  * **Como** usuário administrador,
  * **Quero** excluir permanentemente um perfil de cliente,
  * **Para que** a conta seja completamente removida da plataforma.
* **Critérios de Aceitação:**
  - [ ] Identificar a conta a ser apagada por meio do ID ou E-mail.
  - [ ] Solicitar confirmação antes de deletar a conta.
  - [ ] Remover totalmente o cadastro do usuário no sistema.
  - [ ] Encerrar a sessão e redirecionar para a página inicial (`index.php`).

---

###  US-013: Consulta de Perfil
* **Origem:** RF-012
* **Prioridade:**  Média
* **História de Usuário:**
  * **Como** usuário administrador,
  * **Quero** visualizar as informações das contas dos clientes,
  * **Para que** eu possa consultar dados de cadastro.
* **Critérios de Aceitação:**
  - [ ] Exibir na tela exatamente os dados do usuário em questão/logado.
  - [ ] Garantir que dados protegidos não apareçam na tela.