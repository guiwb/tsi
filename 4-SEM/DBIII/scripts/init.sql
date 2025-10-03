create table
  clientes (
    codcliente integer not null,
    check (codcliente > 0),
    nome varchar(50) not null,
    endereco varchar(50) not null,
    tipo_cliente char(1),
    check (
      tipo_cliente = 'F'
      OR tipo_cliente = 'J'
    ),
    rg char(15),
    cpf char(15),
    cnpj char(14),
    obs text,
    primary key (codcliente)
  );

create table
  fones_clientes (
    cliente integer not null,
    num_telefone char(10),
    PRIMARY KEY (cliente, num_telefone),
    FOREIGN KEY (cliente) REFERENCES clientes (codcliente)
  );

create table
  funcionarios (
    codfunc integer,
    nome varchar(50) not null,
    endereco varchar(50) not null,
    cpf char(11) not null unique,
    tipo char(1),
    check (
      tipo = '1'
      or tipo = '2'
      or tipo = '3'
    ),
    primary key (codfunc)
  );

create table
  ordens_servico (
    numero integer,
    data date,
    valor_total numeric(10, 2),
    status char(1),
    check (
      status = 'a'
      or status = 'f'
    ),
    codfunc integer not null,
    codcliente integer not null,
    primary key (numero),
    foreign key (codfunc) references funcionarios (codfunc),
    foreign key (codcliente) references clientes (codcliente)
  );

create table
  vendas (
    codigo integer,
    valor_total_venda numeric(10, 2),
    dt_venda date not null,
    codfunc integer not null,
    codcliente integer not null,
    numero integer,
    primary key (codigo),
    foreign key (codfunc) references funcionarios (codfunc),
    foreign key (codcliente) references clientes (codcliente),
    foreign key (numero) references ordens_servico (numero)
  );

create table
  contas_receber (
    cod integer primary key,
    data_lancamento date not null,
    data_vencimento date not null,
    valor numeric(10, 2) not null,
    data_pagamento date,
    valor_pagamento numeric(10, 2),
    codigo_vendas integer not null,
    foreign key (codigo_vendas) references vendas (codigo)
  );

create table
  itens (
    codigo integer,
    valor numeric(10, 2) not null,
    custo numeric(10, 2) not null,
    descricao text,
    desconto numeric(4, 2),
    tipo char(1),
    check (
      tipo = 'p'
      or tipo = 's'
    ),
    estoque real,
    primary key (codigo)
  );

create table
  venda_itens (
    sequencial integer,
    codvenda integer,
    codigo integer,
    quantidade real,
    valor numeric(10, 2),
    primary key (sequencial, codvenda),
    foreign key (codvenda) references vendas (codigo),
    foreign key (codigo) references itens (codigo)
  );

create table
  ordens_itens (
    sequencial serial,
    numero integer not null,
    codigo integer not null,
    desconto numeric(4, 2),
    quantidade real,
    valor numeric(10, 2),
    valor_total numeric(10, 2),
    primary key (sequencial),
    foreign key (numero) references ordens_servico (numero),
    foreign key (codigo) references itens (codigo)
  );

create table
  fornecedores (
    codigo integer not null,
    descricao varchar(100),
    endereco varchar(50),
    contato varchar(50),
    cnpj varchar(14) unique,
    primary key (codigo)
  );

create table
  compras (
    codigo integer not null,
    codfornecedor integer not null,
    data date,
    valor_total numeric(10, 2),
    numero_nota integer not null,
    primary key (codigo),
    foreign key (codfornecedor) references fornecedores (codigo)
  );

create table
  compras_itens (
    sequencial serial not null,
    codcompra integer not null,
    coditem integer not null,
    desconto numeric(4, 2),
    quantidade integer,
    valor numeric(10, 2),
    valor_total numeric(10, 2),
    primary key (sequencial),
    foreign key (codcompra) references compras (codigo),
    foreign key (coditem) references itens (codigo)
  );

create table
  contas_pagar (
    numero integer not null,
    num_boleto varchar(30),
    tipo integer not null,
    check (
      tipo = '1'
      or tipo = '2'
    ),
    data_vencimento date,
    data_pagamento date,
    valor_pago numeric(10, 2),
    valor numeric(10, 2),
    data_lancamento date,
    desconto numeric(10, 2),
    compra integer,
    despesas integer,
    primary key (numero),
    foreign key (compra) references compras (codigo)
  );

create table
  despesas (
    codigo integer,
    descricao varchar(50),
    primary key (codigo)
  );

alter table
  contas_pagar
add
  constraint despesas_fkey foreign key (despesas) references despesas (codigo);