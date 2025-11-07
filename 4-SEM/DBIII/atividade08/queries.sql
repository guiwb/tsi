-- 1. Crie uma visão com as seguintes informações: código do item, descrição do item, valor do item, código do fornecedor do item, descricao do fornecedor.
create view
  item_view (
    codigo_item,
    decricao_item,
    valor_item,
    codigo_fornecedor,
    descricao_fornecedor
  ) as
select
  i.codigo,
  i.descricao,
  i.valor,
  f.codigo,
  f.descricao
from
  itens i
  join compras_itens ci on ci.coditem = i.codigo
  join compras c on c.codigo = ci.codcompra
  join fornecedores f on f.codigo = c.codfornecedor;


-- 2. Liste o conteúdo da visão criada na questão anterior.
select * from item_view;


-- 3. Tente atualize o valor de um item da visão criada na questão 1. Descreva o que ocorreu.
update item_view set valor_item = 300 where codigo_item = 3;
-- Ocorreu um erro: cannot update view "item_view"


-- 4. Atualize o valor de um item da tabela item. Visualize o alteração.
update itens set valor = 300 where codigo = 3;
select * from itens where codigo = 3;
-- O valor atualizou.


-- 5. Liste o conteúdo da visão criada na questão 1. Descreva o que ocorreu com os dados da visão após a realização da questão 4.
select * from valor_item;
-- O valor_item veio atualizado;


-- 6. Crie uma visão materializada com as seguintes informações: número da ordem de serviço, data da ordem de serviço, status, nome do cliente, nome do funcionário.

create materialized view item_materialized_view
  (
    numero_ordem_servico,
    data_ordem_servico,
    status_ordem_servico,
    nome_cliente,
    nome_funcionario
  ) as
select
  os.numero,
  os.data,
  os.status,
  c.nome,
  f.nome
from
  ordens_servico os
  join clientes c on c.codcliente = os.codcliente
  join funcionarios f on f.codfunc = os.codfunc;


-- 7. Liste o conteúdo da visão materializada criada na questão 6.
select * from item_materialized_view;


-- 8. Atualize o status da ordem de serviço de código 1, da tabela ordens_servico, para ‘a’.
update ordens_servico set status = 'a' where numero = 1;

-- 9. Liste o conteúdo da tabela ordens_servico e verifique se o status da ordem de serviço de código 1 foi alterado para ‘a’.
select * from ordens_servico;
-- Foi alterado;

-- 10. Liste o conteúdo da visão materializada. Descreva o que você observa em relação ao status da ordem de serviço de código 1.
select * from item_materialized_view;
-- Não foi alterado;

-- 11. Atualize a visão materializada.
refresh materialized view item_materialized_view;

-- 12. Liste o conteúdo da visão materializada. Descreva o que aconteceu após sua atualização.
select * from item_materialized_view;
-- Atualizou o campo alterado;
