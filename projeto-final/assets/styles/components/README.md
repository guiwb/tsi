# Componentes CSS Reutilizáveis

Este diretório contém componentes CSS reutilizáveis para manter consistência e evitar repetição de código.

## 📁 Arquivos

- `forms.css` - Componentes para formulários modernos
- `breadcrumb.css` - Componentes para breadcrumbs modernos

## 🎨 Componentes de Formulários

### Estrutura Básica

```html
<div class="form-container">
    <div class="form-header">
        <div class="breadcrumb-wrapper">
            <!-- Breadcrumb aqui -->
        </div>
        <div class="form-title">
            <div class="title-icon success">
                <span class="material-symbols-outlined">icon</span>
            </div>
            <div class="title-content">
                <h1>Título do Formulário</h1>
                <p>Descrição do formulário</p>
            </div>
        </div>
    </div>

    <div class="form-card card">
        <form method="POST" class="modern-form">
            <div class="form-section">
                <h3 class="section-title success">
                    <span class="material-symbols-outlined">info</span>
                    Nome da Seção
                </h3>
                
                <div class="input-group success">
                    <label for="field">
                        <span class="material-symbols-outlined">label</span>
                        Label do Campo
                    </label>
                    <input type="text" id="field" name="field" required>
                </div>
            </div>

            <div class="form-actions">
                <a href="/voltar" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
</div>
```

### Classes Disponíveis

#### Container
- `.form-container` - Container principal (max-width: 800px)
- `.form-container.wide` - Container largo (max-width: 1200px)

#### Título
- `.title-icon.primary` - Ícone azul/roxo
- `.title-icon.success` - Ícone verde
- `.title-icon.info` - Ícone azul

#### Seções
- `.section-title.primary` - Título da seção azul/roxo
- `.section-title.success` - Título da seção verde
- `.section-title.info` - Título da seção azul

#### Campos
- `.input-group.primary` - Campo azul/roxo
- `.input-group.success` - Campo verde
- `.input-group.info` - Campo azul

#### Elementos Especiais
- `.field-note` - Nota explicativa para campos
- `.password-note` - Nota para seção de senha

## 🍞 Componentes de Breadcrumb

### Estrutura Básica

```html
<nav class="modern-breadcrumb">
    <a href="/pagina" class="breadcrumb-item">
        <span class="material-symbols-outlined">icon</span>
        <span>Página</span>
    </a>
    <span class="breadcrumb-separator">
        <span class="material-symbols-outlined">chevron_right</span>
    </span>
    <span class="breadcrumb-item active success">
        <span class="material-symbols-outlined">current</span>
        <span>Página Atual</span>
    </span>
</nav>
```

### Classes Disponíveis

#### Item Ativo
- `.breadcrumb-item.active.primary` - Item ativo azul/roxo
- `.breadcrumb-item.active.success` - Item ativo verde
- `.breadcrumb-item.active.info` - Item ativo azul

## 🎯 Como Usar

1. **Inclua os arquivos CSS** no template:
```html
<link rel="stylesheet" href="assets/styles/components/forms.css">
<link rel="stylesheet" href="assets/styles/components/breadcrumb.css">
```

2. **Use as classes apropriadas** para o contexto:
   - **Equipes e Treinos**: Use `.success` (verde)
   - **Usuários**: Use `.primary` (azul/roxo)
   - **Configurações**: Use `.info` (azul)

3. **Mantenha a estrutura HTML** conforme documentado acima

## 🔧 Personalização

Para personalizar os componentes:

1. **Cores**: Modifique as variáveis CSS no `design-system.css`
2. **Espaçamento**: Ajuste as variáveis de espaço
3. **Tipografia**: Modifique as variáveis de fonte

## 📱 Responsividade

Todos os componentes são responsivos por padrão:
- **Desktop**: Layout completo
- **Tablet**: Ajustes de espaçamento
- **Mobile**: Layout em coluna única

## ✨ Benefícios

- **Consistência**: Visual uniforme em toda a aplicação
- **Manutenibilidade**: Mudanças centralizadas
- **Performance**: Menos código duplicado
- **Escalabilidade**: Fácil adição de novos componentes 