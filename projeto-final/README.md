# Natare App

Sistema web desenvolvido como projeto final para as disciplinas de Back-End I e Front-End I do curso de Tecnologias para Sistemas de Informação (TSI) do Instituto Federal do Rio Grande do Sul (IFSUL).

## 🚀 Tecnologias

Este projeto é desenvolvido com as seguintes tecnologias:

- PHP 8.2
- PostgreSQL
- Docker
- Apache
- HTML/CSS
- JavaScript

## 💻 Pré-requisitos

Antes de começar, verifique se você tem os seguintes requisitos instalados:

- Docker
- Docker Compose
- Git

## 🔧 Instalação

1. Clone o repositório:
```bash
git clone [URL_DO_REPOSITÓRIO]
cd projeto-final
```

2. Inicie os containers Docker:
```bash
docker-compose up -d
```

3. O sistema estará disponível em:
- Frontend: http://localhost:80
- Banco de dados: localhost:5432

## 📦 Estrutura do Projeto

```
.
├── controller/     # Controladores da aplicação
├── database/      # Scripts e migrações do banco de dados
├── model/         # Modelos da aplicação
├── template/      # Templates reutilizáveis
├── view/          # Views da aplicação
├── index.php      # Ponto de entrada da aplicação
├── Dockerfile     # Configuração do container PHP
└── docker-compose.yml # Configuração dos serviços
```

## 🛣️ Sistema de Rotas

O sistema utiliza um controle de rotas centralizado no arquivo `index.php`. Este controlador é responsável por:

- Direcionar requisições para views através de templates
- Encaminhar chamadas de serviço para os respectivos controllers
- Gerenciar o fluxo de navegação da aplicação

## 🛠️ Configuração do Banco de Dados

O banco de dados PostgreSQL é configurado automaticamente com as seguintes credenciais:

- **Database**: natareapp
- **Usuário**: guiwb
- **Porta**: 5432

### Diagrama do Banco de Dados

O projeto inclui um arquivo `database/dbdiagram.dbml` que contém a estrutura do banco de dados em formato DBML. Este arquivo pode ser copiado e colado no [dbdiagram.io](https://dbdiagram.io) para visualização do diagrama completo do banco de dados, facilitando o entendimento das relações entre as tabelas e a estrutura geral do banco.