select
  c.codcliente,
  c.nome
from
  clientes c
  join vendas v on v.codcliente = c.codcliente
  join venda_itens vi on vi.codvenda = v.codigo
  join itens i on i.codigo = vi.codigo
where
  i.tipo = 's'
  
intersect

select
  c.codcliente,
  c.nome
from
  clientes c
  join vendas v on v.codcliente = c.codcliente
  join venda_itens vi on vi.codvenda = v.codigo
  join itens i on i.codigo = vi.codigo
where
  i.tipo = 'p'
  
order by nome