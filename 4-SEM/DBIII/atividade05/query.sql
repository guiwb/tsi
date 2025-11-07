-- 1) Receba como parâmetro de entrada o código de um item e notifique se este item possui estoque superior a 150 unidades.
create function tem150OuMaisItens(id int) returns boolean as $$
declare
  total itens.estoque%TYPE;
begin
  select estoque into total from itens where codigo = id;
  return total > 150;
end;
$$ language plpgsql;

select tem150OuMaisItens(1); -- true
select tem150OuMaisItens(3); -- false

-- 2) Receba como parâmetro de entrada o código de um fornecedor e informe quando foi a última compra que a empresa fez com esse fornecedor.
create function ultimaCompra(id_fornecedor int) returns date as $$
declare
  data_compra compras.data%TYPE;
begin
  select data into data_compra from compras where codfornecedor = id_fornecedor order by data desc;

  return data_compra;
end;
$$ language plpgsql;

select ultimaCompra(1); -- 2016-05-12
select ultimaCompra(5000); -- null

-- 3) Crie um procedimento que receba como parâmetro de entrada o código de um item e um percentual de reajuste; que aplique esse reajuste ao valor do item de código igual ao do parâmetro de entrada.
create procedure procReajustaValor(id int, percentual float) language plpgsql as $$
begin
  update itens set valor = valor + (valor * (percentual/100)) where codigo = id;
end;
$$;

select valor from itens where codigo = 1; -- 200.00
call procReajustaValor(1, 10);
select * from itens where codigo = 1; -- 220.00
call procReajustaValor(1, 11.5);
select * from itens where codigo = 1; -- 245.30

-- 4) Crie um procedimento armazenado que informe o número de clientes sem telefone. Observação: essa função não possui parâmetro de entrada.
create function totalSemTelefone() returns int language plpgsql as $$
  declare
    total_clientes int;
    total_com_telefone int;
  begin
    select count(*) into total_clientes from clientes;
    select count(*) into total_com_telefone from fones_clientes group by cliente;
    
    return total_clientes - total_com_telefone;
  end;
$$;

select totalSemTelefone(); -- 8


-- 5) Crie um procedimento armazenado que receba como parâmetro de entrada o código de um item e que inclua em uma tabela chamada relacao_item_fornecedor (essa tabela deve ser criada antes da criação do procedimento), o código, a descrição e o valor do item que tiver código igual ao parâmetro de entrada, assim como, o código e a descrição do fornecedor referente a esse código de item.
create table relacao_item_fornecedor (
  codigo serial primary key,
  codigo_item int,
  descricao_item varchar,
  valor_item float,
  codigo_fornecedor int,
  descricao_fornecedor varchar,
  FOREIGN KEY (codigo_item) REFERENCES itens(codigo),
  FOREIGN KEY (codigo_fornecedor) REFERENCES fornecedores(codigo)
);

create procedure populaRelacaoItemFornecedor(id int) language plpgsql as $$
  declare
    item itens%ROWTYPE;
    fornecedor fornecedores%ROWTYPE;
  begin
    select * into item from itens where codigo = id;
    select * into fornecedor from fornecedores f
      join compras c on c.codfornecedor = f.codigo
      join compras_itens ci on ci.codcompra = c.codigo and ci.coditem = item.codigo;

    insert into relacao_item_fornecedor(codigo_item, descricao_item, valor_item, codigo_fornecedor, descricao_fornecedor) values(item.codigo, item.descricao, item.valor, fornecedor.codigo, fornecedor.descricao);
  end;
$$;

call populaRelacaoItemFornecedor(1);

select * from relacao_item_fornecedor;
