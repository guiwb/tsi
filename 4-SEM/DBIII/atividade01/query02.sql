select i.codigo, i.descricao from itens i join venda_itens vi on vi.codigo = i.codigo

union

select i.codigo, i.descricao from itens i join ordens_itens oi on oi.codigo = i.codigo