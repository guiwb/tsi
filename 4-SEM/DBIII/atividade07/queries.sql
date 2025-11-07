-- 1. Registrar em uma tabela de log (deve ser criada), o nome do usuário que efetuar operações de inserção, de alteração ou de exclusão de dados na tabela itens. Na tabela de log deve ser também registrada, juntamente com o nome do usuário, a operação realizada e a data de realização da operação.
create table logs (
    id serial primary key,
    user_name varchar(255),
    action varchar(255),
    created_at timestamp default current_timestamp
);

create or replace function log_item_changes()
returns trigger as $$
begin
    insert into logs (user_name, action) values (current_user, tg_op);

    if (tg_op = 'DELETE') then
      return old;
    else
      return new;
    end if;
end;
$$ language plpgsql;

create trigger item_changes_trigger
after insert or update or delete on itens
for each row execute function log_item_changes();

insert into
  itens (codigo, valor, custo, descricao, tipo, estoque)
values
  (100, 200, 160, 'aparelho de pressão 1', 'p', 500),
  (101, 200, 160, 'aparelho de pressão 2', 'p', 500),
  (102, 200, 160, 'aparelho de pressão 3', 'p', 500);


update itens set descricao = 'aparelho de pressão 1 novo' where codigo = 100;

delete from itens where codigo in(101, 102);

select * from logs;

-- 2. Ao deletar uma venda, apague também os itens relacionados a essa venda.

create or replace function delete_venda_items()
returns trigger as $$
begin
    delete from venda_itens where codvenda = old.codigo;
    return old;
end;
$$ language plpgsql;

create trigger venda_delete_trigger
before delete on vendas
for each row execute function delete_venda_items();

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
  (100, 750, '2020/05/11', 200, 101, 01);

insert into
  venda_itens (sequencial, codvenda, codigo, quantidade, valor)
values
  (01, 100, 01, 20, 4000);

select * from venda_itens where codvenda = 100;

delete from vendas where codigo = 100;

select * from venda_itens where codvenda = 100;

-- 3. A partir da venda de um item, atualize a quantidade em estoque deste item.
create or replace function update_item_stock()
returns trigger as $$
begin
    update itens set estoque = estoque - new.quantidade where codigo = new.codigo;
    return new;
end;
$$ language plpgsql;

create trigger venda_item_insert_trigger
after insert on venda_itens
for each row execute function update_item_stock();

insert into
  itens (codigo, valor, custo, descricao, tipo, estoque)
values
  (200, 150, 100, 'item estoque', 'p', 300);

insert into
  venda_itens (sequencial, codvenda, codigo, quantidade, valor)
values
  (101, 1, 200, 10, 1500);

select * from itens where codigo = 200;

-- 4. A partir da quantidade comprada de um determinado item, sua quantidade em estoque seja atualizada.
create or replace function update_estoque_from_compra()
returns trigger as $$
begin
  update itens set estoque = estoque + new.quantidade where codigo = new.coditem;
  return new; 
end;
$$ language plpgsql; 

create trigger update_estoque_from_compra_trigger
after insert on compras_itens
for each row execute function update_estoque_from_compra();

select estoque from itens where codigo = 200;

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
  (100, 102, 200, 10, 4000, 4000);

select estoque from itens where codigo = 200;

-- 5. Baseado nos itens de uma venda (tabela vendas_itens), calcule o “valor total” dessa venda (tabela vendas).
create or replace function calc_valor_total_of_venda()
returns trigger as $$
begin
  update vendas set valor_total_venda = valor_total_venda + new.valor where codigo = new.codvenda;
  return new;
end;
$$ language plpgsql;

create trigger update_valor_total_venda_on_insert_venda_itens
after insert on venda_itens
for each row execute function calc_valor_total_of_venda();

select valor_total_venda from vendas where codigo = 1;

insert into
  venda_itens (sequencial, codvenda, codigo, quantidade, valor)
values
  (104, 1, 200, 10, 50);

select valor_total_venda from vendas where codigo = 1;