insert into
  clientes (codcliente, nome, endereco, tipo_cliente, obs)
values
  (
    100,
    'José da Silva',
    'Av. Bento Gonçalves',
    'F',
    'xyz'
  );

insert into
  clientes (codcliente, nome, endereco, tipo_cliente, obs)
values
  (101, 'Maria Silveira', 'Tiradentes', 'F', 'xxx');

insert into
  clientes (codcliente, nome, endereco, tipo_cliente, obs)
values
  (
    102,
    'Roberto Pereira',
    'Dom Pedro II',
    'F',
    'xyz'
  );

insert into
  clientes (codcliente, nome, endereco, tipo_cliente, obs)
values
  (
    103,
    'Valéria Ferreira',
    'Av. Bento Gonçalves',
    'F',
    'yyy'
  );

insert into
  clientes (codcliente, nome, endereco, tipo_cliente, obs)
values
  (
    104,
    'Atacado Martins',
    'General Osório',
    'J',
    'xyz'
  );

insert into
  clientes (codcliente, nome, endereco, tipo_cliente, obs)
values
  (
    105,
    'Mercado Silveira',
    'Gomes Carneiro',
    'J',
    'xxx'
  );

insert into
  clientes (codcliente, nome, endereco, tipo_cliente, obs)
values
  (
    106,
    'Isabela Medeiros',
    'Av. Carlos Monteiro',
    'F',
    'xyz'
  );

insert into
  fones_clientes (cliente, num_telefone)
values
  (100, 32274586);

insert into
  fones_clientes (cliente, num_telefone)
values
  (101, 32253326);

insert into
  fones_clientes (cliente, num_telefone)
values
  (102, 32273370);

insert into
  fones_clientes (cliente, num_telefone)
values
  (103, 32224586);

insert into
  fones_clientes (cliente, num_telefone)
values
  (104, 32256948);

insert into
  fones_clientes (cliente, num_telefone)
values
  (105, 32226548);

insert into
  funcionarios (codfunc, nome, endereco, cpf, tipo)
values
  (
    200,
    'José da Silveira',
    'Marechal Deodoro',
    81754656200,
    3
  );

insert into
  funcionarios (codfunc, nome, endereco, cpf, tipo)
values
  (
    201,
    'Mariana Costa',
    'José Bonifácio',
    77486491460,
    2
  );

insert into
  funcionarios (codfunc, nome, endereco, cpf, tipo)
values
  (
    202,
    'Marcia Gonçalves',
    'Av. Ferreira Viana',
    55684414729,
    2
  );

insert into
  funcionarios (codfunc, nome, endereco, cpf, tipo)
values
  (
    203,
    'Sergio Pires',
    'José Bonifácio',
    87162502300,
    1
  );

insert into
  funcionarios (codfunc, nome, endereco, cpf, tipo)
values
  (
    204,
    'Cristian Tavares',
    'Av. 25 de julho',
    33817362641,
    3
  );

insert into
  funcionarios (codfunc, nome, endereco, cpf, tipo)
values
  (
    205,
    'Mateus Santos',
    'Gonçalves Chaves',
    52564250645,
    1
  );

insert into
  funcionarios (codfunc, nome, endereco, cpf, tipo)
values
  (
    206,
    'Fabiano Nobre',
    'Av. Dom Joaquim',
    30212787365,
    3
  );

insert into
  ordens_servico (
    numero,
    data,
    valor_total,
    status,
    codfunc,
    codCliente
  )
values
  (01, '2020/05/12', 1000, 'f', 200, 101);

insert into
  ordens_servico (
    numero,
    data,
    valor_total,
    status,
    codfunc,
    codCliente
  )
values
  (02, '2020/09/15', 2500, 'f', 206, 100);

insert into
  ordens_servico (
    numero,
    data,
    valor_total,
    status,
    codfunc,
    codCliente
  )
values
  (03, '2020/10/20', 1200, 'f', 202, 105);

insert into
  ordens_servico (
    numero,
    data,
    valor_total,
    status,
    codfunc,
    codCliente
  )
values
  (04, '2020/01/23', 3000, 'f', 201, 104);

insert into
  ordens_servico (
    numero,
    data,
    valor_total,
    status,
    codfunc,
    codCliente
  )
values
  (05, '2020/03/02', 2700, 'a', 204, 101);

insert into
  ordens_servico (
    numero,
    data,
    valor_total,
    status,
    codfunc,
    codCliente
  )
values
  (06, '2020/05/16', 5000, 'f', 200, 100);

insert into
  ordens_servico (
    numero,
    data,
    valor_total,
    status,
    codfunc,
    codCliente
  )
values
  (07, '2020/08/13', 7000, 'f', 204, 103);

insert into
  ordens_servico (
    numero,
    data,
    valor_total,
    status,
    codfunc,
    codCliente
  )
values
  (08, '2020/10/05', 3200, 'a', 206, 102);

insert into
  vendas (
    codigo,
    valor_total_venda,
    dt_venda,
    codfunc,
    codcliente,
    numero
  )
values
  (01, 750, '2020/05/11', 200, 101, 01);

insert into
  vendas (
    codigo,
    valor_total_venda,
    dt_venda,
    codfunc,
    codcliente,
    numero
  )
values
  (02, 2000, '2020/09/13', 206, 100, 02);

insert into
  vendas (
    codigo,
    valor_total_venda,
    dt_venda,
    codfunc,
    codcliente,
    numero
  )
values
  (03, 1000, '2020/10/18', 202, 105, 03);

insert into
  vendas (
    codigo,
    valor_total_venda,
    dt_venda,
    codfunc,
    codcliente,
    numero
  )
values
  (04, 3000, '2020/01/12', 201, 104, 04);

insert into
  vendas (
    codigo,
    valor_total_venda,
    dt_venda,
    codfunc,
    codcliente,
    numero
  )
values
  (05, 2000, '2020/03/01', 204, 101, 05);

insert into
  vendas (
    codigo,
    valor_total_venda,
    dt_venda,
    codfunc,
    codcliente,
    numero
  )
values
  (06, 5000, '2020/05/14', 205, 100, 06);

insert into
  vendas (
    codigo,
    valor_total_venda,
    dt_venda,
    codfunc,
    codcliente,
    numero
  )
values
  (07, 6700, '2020/08/11', 204, 103, 07);

insert into
  vendas (
    codigo,
    valor_total_venda,
    dt_venda,
    codfunc,
    codcliente,
    numero
  )
values
  (08, 3100, '2020/12/03', 203, 102, 08);

insert into
  contas_receber (
    cod,
    data_lancamento,
    data_vencimento,
    valor,
    data_pagamento,
    valor_pagamento,
    codigo_vendas
  )
values
  (
    300,
    '2020/05/13',
    '2020/05/30',
    1000,
    '2020/05/29',
    1000,
    01
  );

insert into
  contas_receber (
    cod,
    data_lancamento,
    data_vencimento,
    valor,
    data_pagamento,
    valor_pagamento,
    codigo_vendas
  )
values
  (
    301,
    '2020/09/14',
    '2020/09/29',
    2500,
    '2020/09/28',
    2000,
    02
  );

insert into
  contas_receber (
    cod,
    data_lancamento,
    data_vencimento,
    valor,
    data_pagamento,
    valor_pagamento,
    codigo_vendas
  )
values
  (
    302,
    '2020/10/23',
    '2020/10/26',
    1200,
    '2020/10/26',
    1200,
    03
  );

insert into
  contas_receber (
    cod,
    data_lancamento,
    data_vencimento,
    valor,
    data_pagamento,
    valor_pagamento,
    codigo_vendas
  )
values
  (
    303,
    '2020/01/23',
    '2020/01/30',
    3000,
    '2020/01/29',
    3000,
    04
  );

insert into
  contas_receber (
    cod,
    data_lancamento,
    data_vencimento,
    valor,
    data_pagamento,
    valor_pagamento,
    codigo_vendas
  )
values
  (
    305,
    '2020/03/02',
    '2020/03/10',
    2700,
    '2020/03/10',
    2700,
    05
  );

insert into
  contas_receber (
    cod,
    data_lancamento,
    data_vencimento,
    valor,
    data_pagamento,
    valor_pagamento,
    codigo_vendas
  )
values
  (
    306,
    '2020/05/16',
    '2020/05/30',
    5000,
    '2020/05/29',
    5000,
    06
  );

insert into
  contas_receber (
    cod,
    data_lancamento,
    data_vencimento,
    valor,
    codigo_vendas
  )
values
  (307, '2020/08/13', '2020/08/22', 7000, 07);

insert into
  contas_receber (
    cod,
    data_lancamento,
    data_vencimento,
    valor,
    codigo_vendas
  )
values
  (308, '2020/10/05', '2020/10/10', 3200, 08);

insert into
  itens (codigo, valor, custo, descricao, tipo, estoque)
values
  (01, 200, 160, 'aparelho de pressão', 'p', 500);

insert into
  itens (codigo, valor, custo, descricao, tipo, estoque)
values
  (02, 50, 35, 'atadura', 'p', 500);

insert into
  itens (codigo, valor, custo, descricao, tipo, estoque)
values
  (03, 250, 180, 'estetoscópio', 'p', 100);

insert into
  itens (codigo, valor, custo, descricao, tipo, estoque)
values
  (04, 110, 65, 'termômetro auricular', 'p', 500);

insert into
  itens (codigo, valor, custo, descricao, tipo, estoque)
values
  (05, 35, 10, 'tesoura cirúrgica 15 cm', 'p', 500);

insert into
  itens (codigo, valor, custo, descricao, tipo, estoque)
values
  (06, 500, 350, 'autoclave 4L analógico', 's', 400);

insert into
  itens (codigo, valor, custo, descricao, tipo, estoque)
values
  (
    07,
    1800,
    1450,
    'centrífuga de bancada com rotor velocidade 0-4000RPM K14-4000',
    'p',
    500
  );

insert into
  itens (codigo, valor, custo, descricao, tipo, estoque)
values
  (08, 850, 600, 'desumidificador', 'p', 500);

insert into
  venda_itens (sequencial, codvenda, codigo, quantidade, valor)
values
  (01, 03, 01, 20, 4000);

insert into
  venda_itens (sequencial, codvenda, codigo, quantidade, valor)
values
  (02, 01, 03, 10, 2500);

insert into
  venda_itens (sequencial, codvenda, codigo, quantidade, valor)
values
  (03, 02, 04, 5, 550);

insert into
  venda_itens (sequencial, codvenda, codigo, quantidade, valor)
values
  (04, 04, 02, 3, 150);

insert into
  venda_itens (sequencial, codvenda, codigo, quantidade, valor)
values
  (05, 06, 05, 100, 300);

insert into
  venda_itens (sequencial, codvenda, codigo, quantidade, valor)
values
  (06, 05, 02, 250, 8750);

insert into
  venda_itens (sequencial, codvenda, codigo, quantidade, valor)
values
  (07, 08, 07, 15, 27000);

insert into
  venda_itens (sequencial, codvenda, codigo, quantidade, valor)
values
  (08, 07, 05, 20, 175);

insert into
  ordens_itens (
    sequencial,
    numero,
    codigo,
    quantidade,
    valor,
    valor_total
  )
values
  (01, 02, 03, 2, 600, 600);

insert into
  ordens_itens (
    sequencial,
    numero,
    codigo,
    quantidade,
    valor,
    valor_total
  )
values
  (02, 03, 02, 3, 2400, 2400);

insert into
  ordens_itens (
    sequencial,
    numero,
    codigo,
    quantidade,
    valor,
    valor_total
  )
values
  (03, 01, 01, 1, 300, 300);

insert into
  ordens_itens (
    sequencial,
    numero,
    codigo,
    quantidade,
    valor,
    valor_total
  )
values
  (04, 04, 06, 4, 800, 800);

insert into
  ordens_itens (
    sequencial,
    numero,
    codigo,
    quantidade,
    valor,
    valor_total
  )
values
  (05, 08, 05, 5, 1500, 1500);

insert into
  ordens_itens (
    sequencial,
    numero,
    codigo,
    quantidade,
    valor,
    valor_total
  )
values
  (06, 07, 04, 2, 2400, 2400);

insert into
  ordens_itens (
    sequencial,
    numero,
    codigo,
    quantidade,
    valor,
    valor_total
  )
values
  (07, 05, 08, 3, 90, 90);

insert into
  ordens_itens (
    sequencial,
    numero,
    codigo,
    quantidade,
    valor,
    valor_total
  )
values
  (08, 06, 07, 2, 300, 300);

insert into
  fornecedores (codigo, descricao, endereco, contato, cnpj)
values
  (
    01,
    'Bento e Cia',
    'Dom Pedro II',
    32254896,
    83848582000198
  );

insert into
  fornecedores (codigo, descricao, endereco, contato, cnpj)
values
  (
    02,
    'Mendes Araújo',
    'Av. Dom Joaquim',
    32275692,
    52236265000197
  );

insert into
  fornecedores (codigo, descricao, endereco, contato, cnpj)
values
  (
    03,
    'Bezerra Júnior',
    'Av. Fernando Osório',
    32226578,
    75112555000124
  );

insert into
  fornecedores (codigo, descricao, endereco, contato, cnpj)
values
  (
    04,
    'Fonseca Ltda.',
    'Praça XX de setembro',
    32273370,
    46631334000164
  );

insert into
  fornecedores (codigo, descricao, endereco, contato, cnpj)
values
  (
    05,
    'Joaquim e Cia',
    'Av. Duque de Caxias',
    32227343,
    820824420001 -99
  );

insert into
  fornecedores (codigo, descricao, endereco, contato, cnpj)
values
  (
    06,
    'Barroso e Barroso',
    'General Osório',
    32296548,
    45995532000144
  );

insert into
  fornecedores (codigo, descricao, endereco, contato, cnpj)
values
  (
    07,
    'Padilha Ltda.',
    'Marechal Deodoro',
    32252571,
    098467580001 -10
  );

insert into
  fornecedores (codigo, descricao, endereco, contato, cnpj)
values
  (
    08,
    'JJ e Cia.',
    'Dom Pedro II',
    32258691,
    22065998000145
  );

insert into
  compras (
    codigo,
    codfornecedor,
    data,
    valor_total,
    numero_nota
  )
values
  (100, 01, '2016/05/12', 5000, 2568412);

insert into
  compras (
    codigo,
    codfornecedor,
    data,
    valor_total,
    numero_nota
  )
values
  (101, 05, '2016/09/12', 7500, 5647823);

insert into
  compras (
    codigo,
    codfornecedor,
    data,
    valor_total,
    numero_nota
  )
values
  (102, 07, '2016/12/23', 20000, 8457693);

insert into
  compras (
    codigo,
    codfornecedor,
    data,
    valor_total,
    numero_nota
  )
values
  (103, 08, '2017/02/18', 5750, 3254812);

insert into
  compras (
    codigo,
    codfornecedor,
    data,
    valor_total,
    numero_nota
  )
values
  (104, 02, '2017/05/26', 7200, 69854714);

insert into
  compras (
    codigo,
    codfornecedor,
    data,
    valor_total,
    numero_nota
  )
values
  (105, 04, '2017/09/30', 6000, 2145795);

insert into
  compras (
    codigo,
    codfornecedor,
    data,
    valor_total,
    numero_nota
  )
values
  (106, 03, '2017/11/17', 2000, 25478591);

insert into
  compras (
    codigo,
    codfornecedor,
    data,
    valor_total,
    numero_nota
  )
values
  (107, 06, '2017/12/22', 2500, 36547823);

insert into
  compras_itens (
    sequencial,
    codcompra,
    coditem,
    quantidade,
    valor,
    valor_total
  )
values
  (01, 102, 03, 5, 4000, 4000);

insert into
  compras_itens (
    sequencial,
    codcompra,
    coditem,
    quantidade,
    valor,
    valor_total
  )
values
  (02, 103, 02, 2, 7000, 7000);

insert into
  compras_itens (
    sequencial,
    codcompra,
    coditem,
    quantidade,
    valor,
    valor_total
  )
values
  (03, 105, 07, 3, 4000, 4000);

insert into
  compras_itens (
    sequencial,
    codcompra,
    coditem,
    quantidade,
    valor,
    valor_total
  )
values
  (04, 103, 08, 7, 9000, 9000);

insert into
  compras_itens (
    sequencial,
    codcompra,
    coditem,
    quantidade,
    valor,
    valor_total
  )
values
  (05, 101, 04, 4, 8000, 8000);

insert into
  compras_itens (
    sequencial,
    codcompra,
    coditem,
    quantidade,
    valor,
    valor_total
  )
values
  (06, 106, 01, 2, 5000, 5000);

insert into
  compras_itens (
    sequencial,
    codcompra,
    coditem,
    quantidade,
    valor,
    valor_total
  )
values
  (07, 104, 06, 6, 15000, 15000);

insert into
  compras_itens (
    sequencial,
    codcompra,
    coditem,
    quantidade,
    valor,
    valor_total
  )
values
  (08, 107, 05, 9, 9000, 9000);

insert into
  contas_pagar (
    numero,
    num_boleto,
    tipo,
    data_vencimento,
    data_pagamento,
    valor_pago,
    valor,
    data_lancamento,
    compra
  )
values
  (
    01,
    2354,
    1,
    '2016/05/15',
    '2016/05/15',
    5000,
    5000,
    '2016/05/10',
    100
  );

insert into
  contas_pagar (
    numero,
    num_boleto,
    tipo,
    data_vencimento,
    data_pagamento,
    valor_pago,
    valor,
    data_lancamento,
    compra
  )
values
  (
    02,
    2664,
    1,
    '2017/02/22',
    '2017/02/22',
    5750,
    5750,
    '2017/02/18',
    103
  );

insert into
  contas_pagar (
    numero,
    num_boleto,
    tipo,
    data_vencimento,
    data_pagamento,
    valor_pago,
    valor,
    data_lancamento,
    compra
  )
values
  (
    03,
    2354,
    1,
    '2017/10/15',
    '2017/10/15',
    6000,
    6000,
    '2016/09/30',
    105
  );

insert into
  contas_pagar (
    numero,
    num_boleto,
    tipo,
    data_vencimento,
    data_pagamento,
    valor_pago,
    valor,
    data_lancamento,
    compra
  )
values
  (
    04,
    5689,
    1,
    '2017/11/23',
    '2017/11/23',
    2000,
    2000,
    '2017/11/17',
    106
  );

insert into
  contas_pagar (
    numero,
    num_boleto,
    tipo,
    data_vencimento,
    data_pagamento,
    valor_pago,
    valor,
    data_lancamento,
    compra
  )
values
  (
    05,
    1458,
    1,
    '2017/12/25',
    '2017/12/25',
    2500,
    2500,
    '2017/12/22',
    107
  );

insert into
  contas_pagar (
    numero,
    num_boleto,
    tipo,
    data_vencimento,
    data_pagamento,
    valor_pago,
    valor,
    data_lancamento,
    compra
  )
values
  (
    06,
    6985,
    1,
    '2017/09/26',
    '2017/09/26',
    7500,
    7500,
    '2016/09/16',
    101
  );

insert into
  contas_pagar (
    numero,
    num_boleto,
    tipo,
    data_vencimento,
    data_pagamento,
    valor_pago,
    valor,
    data_lancamento,
    compra
  )
values
  (
    07,
    7584,
    2,
    '2016/05/27',
    '2016/05/27',
    20000,
    20000,
    '2017/12/23',
    102
  );

insert into
  contas_pagar (
    numero,
    num_boleto,
    tipo,
    data_vencimento,
    data_pagamento,
    valor_pago,
    valor,
    data_lancamento,
    compra
  )
values
  (
    08,
    3658,
    2,
    '2017/05/10',
    '2017/05/30',
    7200,
    7200,
    '2017/05/26',
    104
  );

insert into
  despesas (codigo, descricao)
values
  (01, 'água');

insert into
  despesas (codigo, descricao)
values
  (02, 'luz');

insert into
  despesas (codigo, descricao)
values
  (03, 'funcionários');

insert into
  despesas (codigo, descricao)
values
  (04, 'produtos de limpeza');

insert into
  despesas (codigo, descricao)
values
  (05, 'material de escritório');

insert into
  despesas (codigo, descricao)
values
  (06, 'telefone');

insert into
  despesas (codigo, descricao)
values
  (07, 'limpeza');

insert into
  despesas (codigo, descricao)
values
  (08, 'seguraça');