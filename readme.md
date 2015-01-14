## PartiuAlmoco

Sistema democrático para escolha do restaurante no horário do almoço.

Toda regra de negócio da aplicação foi foi garantida por testes unitários, localizados dentro da pasta "app/tests"

#####Como rodar e fazer funcionar?
Primeiramente, é necessário ter instalado e configurado corretamente o PHP,
abra uma janela do terminal dentro da pasta principal:

```javascript
c:\PartiuAlmoco>php artisan serve
```

Logo após, já é possível abrir o navegador no endereço: **localhost:8000**

dependendo do horário não é possível efetuar a votação, neste caso para efetuar testes, altere o arquivo **app/config/app.php**

```javascript
#5 'time_to_vote' => '11:30:00',
```

#####Melhorias
- [ ] Login utilizando a conta do facebbok
- [ ] Exibir prato do dia de cada restaurante