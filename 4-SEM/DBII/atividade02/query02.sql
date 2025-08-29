select
  c.nome
from
  clientes c
  inner join ordens_servico os on os.codcliente = c.codcliente
  
except

select
  c.nome
from
  clientes c
  inner join vendas v on v.codcliente = c.codcliente