-- Inserir ambiente
WITH new_env AS (
  INSERT INTO environments (name, logo_url)
  VALUES ('Academia Performance', 'https://example.com/logo.png')
  RETURNING id
),
-- Inserir usuários com diferentes cargos
new_users AS (
  INSERT INTO users (name, email, password, role, environment_id)
  SELECT * FROM (VALUES
    -- Admins
    ('Guilherme Barbosa', 'guui.wb@gmail.com', '$2y$10$hj8Xw2OEGo2iI4HIHv2s4OCKIY7Im7zU.3K.UEDQt4u5r2an6x.o6', 'admin'::"USER_ROLE", (SELECT id FROM new_env)),
    
    -- Coaches
    ('Carlos Oliveira', 'carlos.oliveira@academia.com', '$2y$10$hj8Xw2OEGo2iI4HIHv2s4OCKIY7Im7zU.3K.UEDQt4u5r2an6x.o6', 'coach'::"USER_ROLE", (SELECT id FROM new_env)),
    ('Ana Costa', 'ana.costa@academia.com', '$2y$10$hj8Xw2OEGo2iI4HIHv2s4OCKIY7Im7zU.3K.UEDQt4u5r2an6x.o6', 'coach'::"USER_ROLE", (SELECT id FROM new_env)),
    ('Pedro Lima', 'pedro.lima@academia.com', '$2y$10$hj8Xw2OEGo2iI4HIHv2s4OCKIY7Im7zU.3K.UEDQt4u5r2an6x.o6', 'coach'::"USER_ROLE", (SELECT id FROM new_env)),
    
    -- Athletes
    ('Lucas Ferreira', 'lucas.ferreira@email.com', '$2y$10$hj8Xw2OEGo2iI4HIHv2s4OCKIY7Im7zU.3K.UEDQt4u5r2an6x.o6', 'athlete'::"USER_ROLE", (SELECT id FROM new_env)),
    ('Juliana Almeida', 'juliana.almeida@email.com', '$2y$10$hj8Xw2OEGo2iI4HIHv2s4OCKIY7Im7zU.3K.UEDQt4u5r2an6x.o6', 'athlete'::"USER_ROLE", (SELECT id FROM new_env)),
    ('Rafael Souza', 'rafael.souza@email.com', '$2y$10$hj8Xw2OEGo2iI4HIHv2s4OCKIY7Im7zU.3K.UEDQt4u5r2an6x.o6', 'athlete'::"USER_ROLE", (SELECT id FROM new_env)),
    ('Fernanda Rocha', 'fernanda.rocha@email.com', '$2y$10$hj8Xw2OEGo2iI4HIHv2s4OCKIY7Im7zU.3K.UEDQt4u5r2an6x.o6', 'athlete'::"USER_ROLE", (SELECT id FROM new_env)),
    ('Diego Martins', 'diego.martins@email.com', '$2y$10$hj8Xw2OEGo2iI4HIHv2s4OCKIY7Im7zU.3K.UEDQt4u5r2an6x.o6', 'athlete'::"USER_ROLE", (SELECT id FROM new_env)),
    ('Camila Pereira', 'camila.pereira@email.com', '$2y$10$hj8Xw2OEGo2iI4HIHv2s4OCKIY7Im7zU.3K.UEDQt4u5r2an6x.o6', 'athlete'::"USER_ROLE", (SELECT id FROM new_env)),
    ('Thiago Silva', 'thiago.silva@email.com', '$2y$10$hj8Xw2OEGo2iI4HIHv2s4OCKIY7Im7zU.3K.UEDQt4u5r2an6x.o6', 'athlete'::"USER_ROLE", (SELECT id FROM new_env)),
    ('Bianca Santos', 'bianca.santos@email.com', '$2y$10$hj8Xw2OEGo2iI4HIHv2s4OCKIY7Im7zU.3K.UEDQt4u5r2an6x.o6', 'athlete'::"USER_ROLE", (SELECT id FROM new_env)),
    ('Gabriel Costa', 'gabriel.costa@email.com', '$2y$10$hj8Xw2OEGo2iI4HIHv2s4OCKIY7Im7zU.3K.UEDQt4u5r2an6x.o6', 'athlete'::"USER_ROLE", (SELECT id FROM new_env)),
    ('Isabela Lima', 'isabela.lima@email.com', '$2y$10$hj8Xw2OEGo2iI4HIHv2s4OCKIY7Im7zU.3K.UEDQt4u5r2an6x.o6', 'athlete'::"USER_ROLE", (SELECT id FROM new_env))
  ) AS t(name, email, password, role, environment_id)
  RETURNING id, name, role
),
-- Criar times
new_teams AS (
  INSERT INTO teams (name, environment_id, coach_id)
  SELECT 
    'Time Performance A',
    (SELECT id FROM new_env),
    (SELECT id FROM new_users WHERE name = 'Carlos Oliveira' AND role = 'coach'::"USER_ROLE")
  UNION ALL
  SELECT 
    'Time Performance B',
    (SELECT id FROM new_env),
    (SELECT id FROM new_users WHERE name = 'Ana Costa' AND role = 'coach'::"USER_ROLE")
  UNION ALL
  SELECT 
    'Time Iniciantes',
    (SELECT id FROM new_env),
    (SELECT id FROM new_users WHERE name = 'Pedro Lima' AND role = 'coach'::"USER_ROLE")
  RETURNING id, name
)
-- Adicionar atletas aos times
INSERT INTO team_users (team_id, user_id)
SELECT 
  t.id,
  u.id
FROM new_teams t
CROSS JOIN new_users u
WHERE u.role = 'athlete'::"USER_ROLE"
  AND (
    (t.name = 'Time Performance A' AND u.name IN ('Lucas Ferreira', 'Juliana Almeida', 'Rafael Souza', 'Fernanda Rocha'))
    OR (t.name = 'Time Performance B' AND u.name IN ('Diego Martins', 'Camila Pereira', 'Thiago Silva'))
    OR (t.name = 'Time Iniciantes' AND u.name IN ('Bianca Santos', 'Gabriel Costa', 'Isabela Lima'))
  );