-- 1. Crie uma função para a qual seja informado o código do fornecedor e seja devolvido os produtos entregues por ele.
create or replace function display_delivered_products(int codigo_fornecedor)
returns table as $$
  res itens%ROWTYPE
begin
  select i.* into res from itens i
    join compras_itens ci on ci.coditem = i.codigo
    join compras c on c.codigo = ci.codcompra
  where c.codfornecedor = codigo_fornecedor;

  return res;
end;
$$ language plgsql;

-- 2. Crie o procedimento armazenado que calcula o total de vendas para cada produto (tabela: vendas_itens – atributo: valor). Observação: para a verificação da funcionalidade da função, deve ser inserida uma nova venda.


-- 3. Crie um procedimento armazenado que ao ser inserida uma venda, para todos os itens que compõem essa venda, sejam atualizadas as quantidade disponíveis na tabela "itens".


-- 4. Crie um procedimento armazenado que utilize “loop” para atualizar os preços de todos os produtos (tabela itens) fornecidos por um fornecedor específico. O procedimento recebe como parâmetros de entrada o código do fornecedor e o percentual de reajuste.