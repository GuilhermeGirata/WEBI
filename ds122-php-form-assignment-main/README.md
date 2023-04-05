Tecnologia em Análise e Desenvolvimento de Sistemas

Setor de Educação Profissional e Tecnológica - SEPT

Universidade Federal do Paraná - UFPR

---

*DS122 - Desenvolvimento de Aplicações Web 1*

Prof. Alexander Robert Kutzke

**[Instruções para submissão de tarefas e trabalhos](https://gitlab.tadsufpr.net.br/ds122-alexkutzke/material/blob/master/instrucoes_submissao_tarefas_e_trabalhos.md);** [Video aula](https://www.youtube.com/watch?v=d6ZTnQNhoCo)

# Atividade: PHP Formulários

A página  `index.php` possui um formulário.
Ao ser submetido, os dados desse formulário são enviados para a própria
página `index.php`, pelo método `POST`, na qual são validados (arquivos `check_form.js` e `check_form.php`).

Estude a validação dos campos já existentes e altere a página `index.php` para
que ela tenha o seguinte comportamento: 

Um formulário que simula um cadastro de usuário. O formulário deve conter os seguintes campos:

* Nome completo (texto);
* Email (texto);
* Data de nascimento (data);
* Senha (texto tipo password);
* Confirmação de senha  (texto tipo password);
* Imagem para o usuário (upload arquivo de imagem).

**Os campos devem ser validados utilizando Javascritp e PHP. Para a validação por Javascript, basta que todos os campos sejam preenchidos.**

Na validação no servidor, por PHP, as seguintes validações devem ser feitas:

* Todos os campos são obrigatórios;
* Email deve ser válido (função filter_var do PHP);
* Senha e confirmação de senha devem ser iguais;
* Arquivo de imagem:
   * Extensões aceitas: jpg e png;
   * Tamanho deve ser menor do que 1MB;
   * Obs.: Salvar o arquivo na pasta "imagens", que deve estar no diretório raiz do servidor.

**Em caso de falha em alguma dessas validações, o usuário deve ser informado.**

**Em caso de sucesso, apresentar os dados recebidos (inclusive a imagem).**

Todos os campos adicionados devem obedecer ao método de validação utilizado
pelo arquivo `index.php` original. Inclusive, devem ser criadas informações
de erro ou de sucesso ao usuário e utilizar corretamente o Bootstrap.
