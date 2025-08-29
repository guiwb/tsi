INSERT INTO
  vendas (
    codigo,
    valor_total_venda,
    dt_venda,
    codfunc,
    codcliente,
    numero
  )
VALUES
  (1001, 350.00, CURRENT_DATE, 200, 100, NULL);

INSERT INTO
  vendas (
    codigo,
    valor_total_venda,
    dt_venda,
    codfunc,
    codcliente,
    numero
  )
VALUES
  (1002, 200.00, CURRENT_DATE, 204, 104, NULL);

INSERT INTO
  venda_itens (sequencial, codvenda, codigo, quantidade, valor)
VALUES
  (9, 1001, 2, 1, 200.00);

INSERT INTO
  venda_itens (sequencial, codvenda, codigo, quantidade, valor)
VALUES
  (9, 1002, 2, 1, 200.00);

INSERT INTO
  venda_itens (sequencial, codvenda, codigo, quantidade, valor)
VALUES
  (10, 1001, 6, 1, 150.00);

INSERT INTO
  venda_itens (sequencial, codvenda, codigo, quantidade, valor)
VALUES
  (10, 1002, 6, 1, 150.00);

INSERT INTO
  clientes (codcliente, nome, endereco, tipo_cliente, cpf)
VALUES
  (
    107,
    'José Braga',
    'Rua A, 123',
    'F',
    '12345678901'
  );

INSERT INTO
  clientes (codcliente, nome, endereco, tipo_cliente, cpf)
VALUES
  (
    108,
    'Cláudia Barbosa',
    'Rua B,324',
    'F',
    '12345558901'
  );

INSERT INTO
  ordens_servico (
    numero,
    data,
    valor_total,
    status,
    codfunc,
    codcliente
  )
VALUES
  (2001, CURRENT_DATE, 500.00, 'a', 200, 107);

INSERT INTO
  ordens_servico (
    numero,
    data,
    valor_total,
    status,
    codfunc,
    codcliente
  )
VALUES
  (2002, CURRENT_DATE, 750.00, 'a', 201, 108);