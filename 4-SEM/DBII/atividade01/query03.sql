select i.codigo, i.descricao from itens i

except

select i.codigo, i.descricao from itens i join venda_itens vi on vi.codigo = i.codigo