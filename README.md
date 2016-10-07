# test-reply
uma aplicação de teste


a aplicação foi criada para um teste na agencia reply.
**necessario isntalar o composer.

As regras da aplicação estão no email.


Sobre a criação.

Utilizando o composer , importe o slim (micro-php).
Para a camada de views foi usado o twig e não precisamos de acesso a banco aqui.
as regras de negocio do jogo e algumas funções do reader foram feitas com TDD.
Usei o codeception para fazer o TDD e o BDD da aplicação e sua documentação está em test/reports/
Usei o PSR-0 para fazer o autoload das classes.

para rodar a suite de testes inteira tem que ir pela linha de comando na pasta da aplicação:

vendor/bin/codecept run --colors


