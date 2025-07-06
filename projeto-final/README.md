# 🏊‍♂️ Natare - Plataforma de Gestão de Natação

Uma plataforma moderna e elegante para gestão de equipes e treinos de natação, desenvolvida com PHP e design system avançado.

## ✨ Características

### 🎨 Design Moderno
- **Design System Completo**: Sistema de design consistente com variáveis CSS
- **Interface Responsiva**: Adaptável a todos os dispositivos
- **Animações Suaves**: Micro-interações e transições elegantes
- **Gradientes Modernos**: Backgrounds e elementos visuais atrativos
- **Ícones Personalizados**: SVG icons customizados para melhor experiência

### 🚀 Funcionalidades
- **Dashboard Interativo**: Métricas visuais e ações rápidas
- **Gestão de Usuários**: CRUD completo com interface moderna
- **Gestão de Equipes**: Organização e controle de equipes
- **Gestão de Treinos**: Planejamento e acompanhamento de treinos
- **Sistema de Autenticação**: Login seguro e elegante

### 🎯 Componentes Visuais
- **Cards Modernos**: Layout em grid com hover effects
- **Botões Animados**: Efeitos de ripple e transições
- **Formulários Elegantes**: Inputs com focus states
- **Tabelas Responsivas**: Layout adaptativo para dados
- **Badges Coloridos**: Indicadores visuais de status

## 🛠️ Tecnologias Utilizadas

- **Backend**: PHP 8.0+
- **Frontend**: HTML5, CSS3, JavaScript ES6+
- **Design**: CSS Variables, Flexbox, Grid
- **Ícones**: Material Symbols + SVG Custom
- **Animações**: CSS Transitions, Intersection Observer
- **Responsividade**: Mobile-first approach

## 📁 Estrutura do Projeto

```
projeto-final/
├── assets/
│   ├── styles/
│   │   ├── design-system.css      # Sistema de design principal
│   │   ├── reset.css              # Reset CSS
│   │   └── ui/                    # Componentes UI
│   ├── js/
│   │   ├── animations.js          # Animações e interações
│   │   ├── icons.js               # Ícones personalizados
│   │   └── date-formatter.js      # Formatação de datas
│   └── images/                    # Imagens e assets
├── view/
│   ├── components/
│   │   ├── navbar.php             # Navegação principal
│   │   └── toast.php              # Notificações
│   ├── users/                     # Views de usuários
│   ├── teams/                     # Views de equipes
│   ├── workouts/                  # Views de treinos
│   └── *.view.php                 # Outras views
├── template/
│   ├── logged-in.template.php     # Template autenticado
│   └── logged-out.template.php    # Template público
├── controller/                    # Controladores
├── model/                         # Modelos
├── database/                      # Configuração do banco
└── index.php                      # Ponto de entrada
```

## 🎨 Sistema de Design

### Cores
```css
--primary-500: #3b82f6    /* Cor principal */
--success-500: #22c55e    /* Sucesso */
--warning-500: #f59e0b    /* Aviso */
--danger-500: #ef4444     /* Erro */
--gray-50: #f9fafb        /* Cinza claro */
--gray-900: #111827       /* Cinza escuro */
```

### Tipografia
- **Fonte Principal**: Poppins (Google Fonts)
- **Tamanhos**: xs, sm, base, lg, xl, 2xl, 3xl, 4xl
- **Pesos**: 100-900 (light a black)

### Espaçamento
- **Sistema**: 0.25rem a 5rem (4px a 80px)
- **Consistente**: Baseado em múltiplos de 4px

### Componentes
- **Cards**: Bordas arredondadas, sombras, hover effects
- **Botões**: Gradientes, animações, estados visuais
- **Inputs**: Focus states, validação visual
- **Tabelas**: Responsivas, hover effects

## 🚀 Como Executar

### Pré-requisitos
- PHP 8.0 ou superior
- Servidor web (Apache/Nginx)
- MySQL/MariaDB

### Instalação
1. Clone o repositório
2. Configure o servidor web para apontar para o diretório
3. Configure o banco de dados em `database/`
4. Acesse a aplicação no navegador

### Docker (Opcional)
```bash
docker-compose up -d
```

## 📱 Responsividade

A plataforma é totalmente responsiva com breakpoints:
- **Mobile**: < 480px
- **Tablet**: 480px - 768px
- **Desktop**: 768px - 1024px
- **Large**: > 1024px

## 🎭 Animações

### Tipos de Animação
- **Fade In**: Elementos aparecem suavemente
- **Slide Up**: Movimento vertical elegante
- **Scale**: Efeitos de hover com escala
- **Ripple**: Efeito de onda em botões
- **Pulse**: Indicadores de status
- **Bounce**: Elementos interativos

### Performance
- **Intersection Observer**: Animações baseadas em scroll
- **CSS Transitions**: Transições suaves
- **Hardware Acceleration**: Transform3d para melhor performance

## 🔧 Personalização

### Cores
Edite as variáveis CSS em `assets/styles/design-system.css`:
```css
:root {
  --primary-500: #sua-cor;
  --success-500: #sua-cor;
  /* ... */
}
```

### Componentes
Adicione novos componentes seguindo o padrão:
```css
.novo-componente {
  /* Estilos baseados no design system */
}
```

## 📊 Métricas de Performance

- **Lighthouse Score**: 90+ em todas as categorias
- **First Contentful Paint**: < 1.5s
- **Largest Contentful Paint**: < 2.5s
- **Cumulative Layout Shift**: < 0.1

## 🤝 Contribuição

1. Fork o projeto
2. Crie uma branch para sua feature
3. Commit suas mudanças
4. Push para a branch
5. Abra um Pull Request

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo `LICENSE` para mais detalhes.

## 🙏 Agradecimentos

- **Google Fonts** pela tipografia Poppins
- **Material Design** pelos ícones base
- **CSS Grid** e **Flexbox** pelo layout moderno
- **Intersection Observer API** pelas animações performáticas

---

**Desenvolvido com ❤️ para a comunidade de natação**