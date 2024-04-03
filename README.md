### Sobre a Rockbuzz

Rockbuzz é uma agência de marketing digital com foco em digital growth, apoiando nossos clientes a alcançar os objetivos traçados através de soluções digitais.
Desenvolvemos planejamentos estratégicos, desenvolvimento de sistemas e sites, automações de e-mail marketing e campanhas digitais pagas ou orgânicas.
Entendemos o modelo de negócio de nossos clientes para então traçar o plano de ação mais adequado as necessidades.

### Como funciona o teste Full Stack Laravel

Estamos tentando simular um fluxo de trabalho do dia a dia, então as [sugestões de tarefas](#sugestões-de-tarefas) são o nosso backlog.
Você terá 24 horas para definir as prioridades e trabalhar nessas tarefas(**OBS:** Você não precisa fazer todas as tarefas, por isso 
você precisa definir quais tem maior prioridade).

O teste inicia assim que você recebe o link do mesmo e esperamos que você envie ele nas próximas 24 horas.

Boa sorte!

### Tecnologias que usamos em nossos projetos

#### Utilizadas no projeto do teste

- Laravel - [Documentação](https://laravel.com/docs/11.x)
- Filament - [Documentação](https://filamentphp.com/docs)
- Livewire - [Documentação](https://livewire.laravel.com/)
- AlpineJS - [Documentação](https://alpinejs.dev/start-here)
- TailwindCSS - [Documentação](https://tailwindcss.com/docs/installation)

#### Outros projetos

- VueJS
- NuxtJS
- InertiaJS
- Quasar Framework
- Bootstrap
- PWA

### Orientações

##### Faça um clone deste repositório
Via SSH
```bash
git clone git@bitbucket.org:rockbuzz1/teste-fullstack-laravel.git
```

Via HTTPS
```bash
git clone https://paulorockbuzz@bitbucket.org/rockbuzz1/teste-fullstack-laravel.git
```

##### Acesse o diretório do repositório clonado

```bash
cd teste-fullstack-laravel
```

##### Instalar dependências do composer pelo docker

```bash
docker run --rm -u "$(id -u):$(id -g)" -v $(pwd):/var/www/html -w /var/www/html laravelsail/php83-composer:latest composer install --ignore-platform-reqs
```

##### Criar arquivo de configuração

```bash
cp .env.example .env
```

##### Gerar chave do projeto

```bash
./vendor/bin/sail artisan key:generate
```

##### Criar tabelas e popular o banco com dados de teste

```bash
./vendor/bin/sail artisan migrate --seed
```

##### Instalar dependências do npm

```bash
./vendor/bin/sail npm install
```

##### Rodar enquanto estiver desenvolvendo para que as alterações de front tenham efeito

```bash
./vendor/bin/sail npm run dev
```

### Regras do projeto

#### Acesso ao painel administrativo

- Apenas Admins e Autores podem acessar
- Membros não podem acessar painel administrativo

#### Posts

- Admins podem ver/criar/editar todas postagens do sistema
- Autores podem ver/criar/editar apenas suas próprias postagens
- Autores podem enviar postagens para avaliação
- Autores só podem editar postagem quando estiver como rascunho
- Apenas admins podem publicar postagens
- Admins podem voltar postagem para rascunho

#### Categorias / tags

- Apenas admins podem gerenciar

#### Usuários

- Apenas admins podem gerenciar usuários
- Usuário autenticado não pode ser gerenciado na tela de gestão de usuários

### Sugestões de tarefas

- Implementar ações para alterar status da postagem
- Criar relacionamento para autor nos posts
- Criar recurso de tags **(Migrar dados dos posts?)**
- Criar recurso de categorias **(Migrar dados dos posts?)**
- Implementar gestão de usuários
- Identificar quem deu like no post
- Organizar e melhorar formulário de posts
- Criar tela de ler o post no blog
- Adicionar imagem de capa para o post
- Adicionar galeria de imagem ao post
- Traduzir projeto
- Melhorias na interface do blog
- Organizar e limpar projeto
- Correções de bugs e melhorias no código para padronizar o projeto
- Implementar perfil do usuário
- Implementar reset de senha
- Criar rotas de api posts
- Criar painel para membros
    - Criar anotações em posts
    - Gerenciar posts favoritos
    - Criar postagem e enviar para autores aprovarem

**Seja criativo, estamos tentando simular um blog!**

### Diferenciais

- Semântica no HTML
- Testes automatizados
- Organização de commits
- Padrões de organização e código limpo
- PSRs

### Usuários | Senha

- admin@rockbuzz.com.br | 12345678
- autor1@rockbuzz.com.br | 12345678
- author2@rockbuzz.com.br | 12345678
- membro1@rockbuzz.com.br | 12345678
- membro2@rockbuzz.com.br | 12345678

### Conclusão

**Enviar email para paulo@rockbuzz.com.br com:**

- Link do repositório do teste (**Crie um repositório seu e envie o seu teste por ele**).
- Responder as perguntas:
    - Qual foi a sua maior dificuldade no teste?
    - Quais sugestões de melhorias tem para o projeto?
    - Caso tenha alguma observação e ou sugestão sobre o teste.
