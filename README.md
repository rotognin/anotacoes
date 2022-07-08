# Sistema de anotações

<b>Ideia: </b> Criar um sistema de anotações online para que possa ser acessado pelo usuário em qualquer dispositivo. 
Servirá para quem precisar compartilhar textos rápidos de um lugar para outro, guardar informações que possam 
ser acessadas facilmente, separando os textos em categorias e definindo prioridades para eles.

<em>Projeto sendo desenvolvido como estudo</em>

A ideia desse projeto surgiu quando eu estava usando outro computador para fazer testes com Linux e precisava compartilhar alguns links 
e textos entre eles. Com esse sistema, eu poderei realizar o login com meu usuário nos dois computadores e compartilhar informações entre eles.

## Ambientes:

- <strong>Administrativo:</strong> Apenas o administrador do sistema terá acesso. Nesse ambiente terá o cadastro dos usuários do sistema e algumas 
parametrizações e funções específicas.

- <strong>Movimentações:</strong> Qualquer usuário, exceto o administrador, tem acesso a esse ambiente para cadastrar as categorias e anotações particulares.

Um usuário cadastrado como "Usuário Comum" não terá acesso ao sistema administrativo, assim como administradores não terão acesso ao ambiente de movimentações.

## Detalhes técnicos:

Sistema sendo desenvolvido em PHP 7.4+, usando a arquitetura MVC (POO), CoffeeCode DataLayer como ORM, banco de dados MySQL, seguindo as melhores práticas de programação (separação de camadas, separação de responsabilidades, nomes de variáveis e métodos com coerência).

Para rodar esse sistema localmente, é necessário: PHP 7.4+, MySQL, Composer, GIT (para clonar o repositório, caso queira). <em>Futuramente pretendo criar um docker-compose para ser utilizado em contêineres de forma mais 
prática.</em>

## Procedimentos para instalação local:

- Baixe o projeto em uma pasta
  - Com o GIT instalado, use o comando <code>git clone https://github.com/rotognin/anotacoes.git</code>
  - Será criada a pasta <code>anotacoes</code>
- Acesse a pasta via linha de comando
- Execute o comando: <code>composer update</code> para baixar as dependências do projeto
- No MySQL crie um banco com o nome <code>anotacoes_db</code>
- Rode o script <code>docs/tabelas.sql</code> no banco para criar as tabelas do sistema
  - Será criado o usuário "admin" no banco, senha "123", com acesso ao ambiente administrativo.
- Ajuste as configurações de acesso ao banco de dados no arquivo <code>src/config.php</code>

### Considerações

O projeto está em constante atualização, sendo adicionadas funcionalidades e melhorias. Sugestões serão muito bem vindas.

### Melhorias sendo desenvolvidas e futuras

- Enviar anotações para outro usuário
- Exportar anotações para o formato CSV
- Criar anotações públicas (inicialmente apenas privadas)
- Criar o docker-compose para rodar o projeto em contênieres