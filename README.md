<div align="center">
  <a href="https://github.com/thiiagoms/laravel-tdd-poc">
      <img src="./assets/img/testing.png" alt="Logo" width="80" height="80">
  </a>
  <h3>Implementação do TDD no Laravel :brazil:</h3>
  <p float="left">
    <img
      src="https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white"
      alt="Laravel"
    />
 <img
      src="https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white"
      alt="MySQL"
    />
  </p>
</div>

- [Dependências :heavy_plus_sign:](#dependências)
- [Instalação :package:](#instalação)
- [Uso :runner:](#uso)
- [Bonus :medal_sports:](#bonus)

## Dependências
- Shell :shell:
- Docker :whale:


## Instalação

01 -) Clone:
```bash
$ git clone https://github.com/thiiagoms/laravel-tdd-poc
```

02 -) Navegue até o diretório da aplicação:
```bash
$ cd laravel-tdd-poc
laravel-tdd-poc $
```

03 -) Execute o script `setup.sh` para iniciar o ambiente dos containers:
```bash
laravel-tdd-poc $ chmod +x setup.sh
laravel-tdd-poc $ ./setup.sh

██╗      █████╗ ██████╗  █████╗ ██╗   ██╗███████╗██╗         ████████╗██████╗ ██████╗
██║     ██╔══██╗██╔══██╗██╔══██╗██║   ██║██╔════╝██║         ╚══██╔══╝██╔══██╗██╔══██╗
██║     ███████║██████╔╝███████║██║   ██║█████╗  ██║            ██║   ██║  ██║██║  ██║
██║     ██╔══██║██╔══██╗██╔══██║╚██╗ ██╔╝██╔══╝  ██║            ██║   ██║  ██║██║  ██║
███████╗██║  ██║██║  ██║██║  ██║ ╚████╔╝ ███████╗███████╗       ██║   ██████╔╝██████╔╝
╚══════╝╚═╝  ╚═╝╚═╝  ╚═╝╚═╝  ╚═╝  ╚═══╝  ╚══════╝╚══════╝       ╚═╝   ╚═════╝ ╚═════╝


    [*] Author: thiiagoms
    [*] E-mail: hiiagoms@proton.me

=> Iniciando os containers (Isso pode demorar um pouco...)

```
## Uso

01 -) Para executar os testes da aplicação, execute o seguinte comando:
```bash


██╗      █████╗ ██████╗  █████╗ ██╗   ██╗███████╗██╗         ████████╗██████╗ ██████╗
██║     ██╔══██╗██╔══██╗██╔══██╗██║   ██║██╔════╝██║         ╚══██╔══╝██╔══██╗██╔══██╗
██║     ███████║██████╔╝███████║██║   ██║█████╗  ██║            ██║   ██║  ██║██║  ██║
██║     ██╔══██║██╔══██╗██╔══██║╚██╗ ██╔╝██╔══╝  ██║            ██║   ██║  ██║██║  ██║
███████╗██║  ██║██║  ██║██║  ██║ ╚████╔╝ ███████╗███████╗       ██║   ██████╔╝██████╔╝
╚══════╝╚═╝  ╚═╝╚═╝  ╚═╝╚═╝  ╚═╝  ╚═══╝  ╚══════╝╚══════╝       ╚═╝   ╚═════╝ ╚═════╝


    [*] Author: thiiagoms
    [*] E-mail: hiiagoms@proton.me

[*] Executando os testes...


   PASS  Tests\Unit\ExampleTest
  ✓ example

   PASS  Tests\Feature\Controllers\Category\CategoryControllerTest
  ✓ category index get route
  ✓ category single get route
  ✓ category create post route
  ✓ category create post route should validate when try create a invalid category
  ✓ category update put route
  ✓ category update patch route
  ✓ category destroy delete route

   PASS  Tests\Feature\ExampleTest
  ✓ example

  Tests:  9 passed
  Time:   0.18s
```
