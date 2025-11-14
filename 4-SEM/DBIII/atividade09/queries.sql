-- 1. Crie os usuários: Ana, Bernardo, Carlos, Daniela. Ao cria-los, defina uma senha para cada um deles.
create role ana login password 'ana';
create role bernardo login password 'bernardo';
create role carlos login password 'carlos';
create role daniela login password 'daniela';

-- 2. Crie o grupo: vendedores.
create role vendedores nologin;

-- 3. Crie o grupo: adm.
create role adm nologin;

-- 4. Inclua os usuários Ana e Carlos no grupo vendedores.
grant vendedores to ana, carlos;

-- 5. Inclua os usuários Bernardo e Daniela no grupo adm.
grant adm to bernardo, daniela;

-- 6. Fazer o usuário Daniela ser superusuário.
alter user daniela with superuser;

-- 7. Dê todos os privilégios da tabela clientes para o usuário Bernardo.
grant all privileges on clientes to bernardo;

-- 8. Dê todos os privilégios no banco de dados para o grupo adm.
grant all privileges on database db2 to adm;

-- 9. Permita que a usuária ana possa atribuir a outros usuários direito de acesso à leitura em relação à tabela vendas.
grant select on vendas to ana with grant option;

-- 10. Dê acesso às tabelas clientes, vendas, venda_itens, ordens_servico, ordens_itens para o grupo vendedoras. Permita que os usuários desse grupo consultem, incluam, alterem e excluam registros dessas tabelas.
grant select, insert, update, delete on clientes, vendas, venda_itens, ordens_servico, ordens_itens to vendedores;

-- 11. Dê acesso às tabelas compras e compras_itens para o usuário Carlos. Permita que ele consulte, insira, altere e exclua dados e, também, que ele possa conceder privilégios de acesso a essas tabelas para outros usuários.
grant select, insert, update, delete on compras, compras_itens to carlos with grant option;

-- 12. Para todos os usuários, dê permissão de leitura à tabela itens.
grant select on itens to public;

-- 13. Para o usuário Carlos, dê permissão de acesso somente às colunas codigo, data e valor_total da tabela compras.
create view compras_view as select codigo, data, valor_total from compras;
grant select on compras_view to carlos;

-- 14. Teste o acesso de consulta do usuário Carlos à tabela ordens_servico e à ordens_itens.
select * from ordens_servico;
select * from ordens_itens;
-- retornou resultados

-- 15. Remova todos os privilégios de acesso do usuário Carlos às tabelas ordens_servico e ordens_itens. Para isso, você de estar logado como superusuário.
revoke all privileges on ordens_servico from carlos;
revoke all privileges on ordens_itens from carlos;
revoke vendedores from carlos;

-- 16. Teste o acesso do usuário Carlos à tabela ordens_servico e à ordens_itens
select * from ordens_servico;
select * from ordens_itens;