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
),
-- Criar treinos
new_workouts AS (
  INSERT INTO workouts (name, description, scheduled_at, coach_id, environment_id)
  SELECT * FROM (VALUES
    -- Treinos do Carlos Oliveira (Time Performance A)
    ('Treino de Resistência', 'Foco em melhorar a resistência cardiovascular com séries longas', '2024-01-15 07:00:00'::timestamp, (SELECT id FROM new_users WHERE name = 'Carlos Oliveira' AND role = 'coach'::"USER_ROLE"), (SELECT id FROM new_env)),
    ('Treino de Velocidade', 'Séries curtas e intensas para melhorar explosão', '2024-01-17 18:00:00'::timestamp, (SELECT id FROM new_users WHERE name = 'Carlos Oliveira' AND role = 'coach'::"USER_ROLE"), (SELECT id FROM new_env)),
    ('Treino Técnico', 'Perfeiçoamento da técnica dos quatro estilos', '2024-01-20 08:00:00'::timestamp, (SELECT id FROM new_users WHERE name = 'Carlos Oliveira' AND role = 'coach'::"USER_ROLE"), (SELECT id FROM new_env)),
    
    -- Treinos da Ana Costa (Time Performance B)
    ('Treino de Força', 'Exercícios específicos para fortalecimento muscular', '2024-01-16 07:30:00'::timestamp, (SELECT id FROM new_users WHERE name = 'Ana Costa' AND role = 'coach'::"USER_ROLE"), (SELECT id FROM new_env)),
    ('Treino de Recuperação', 'Sessão leve para recuperação muscular', '2024-01-18 17:00:00'::timestamp, (SELECT id FROM new_users WHERE name = 'Ana Costa' AND role = 'coach'::"USER_ROLE"), (SELECT id FROM new_env)),
    ('Treino de Competição', 'Simulação de prova com ritmo de competição', '2024-01-21 06:00:00'::timestamp, (SELECT id FROM new_users WHERE name = 'Ana Costa' AND role = 'coach'::"USER_ROLE"), (SELECT id FROM new_env)),
    
    -- Treinos do Pedro Lima (Time Iniciantes)
    ('Treino Básico', 'Introdução aos fundamentos da natação', '2024-01-15 16:00:00'::timestamp, (SELECT id FROM new_users WHERE name = 'Pedro Lima' AND role = 'coach'::"USER_ROLE"), (SELECT id FROM new_env)),
    ('Treino de Adaptação', 'Adaptação ao meio líquido e respiração', '2024-01-17 16:30:00'::timestamp, (SELECT id FROM new_users WHERE name = 'Pedro Lima' AND role = 'coach'::"USER_ROLE"), (SELECT id FROM new_env)),
    ('Treino Lúdico', 'Atividades recreativas na água', '2024-01-19 15:00:00'::timestamp, (SELECT id FROM new_users WHERE name = 'Pedro Lima' AND role = 'coach'::"USER_ROLE"), (SELECT id FROM new_env))
  ) AS t(name, description, scheduled_at, coach_id, environment_id)
  RETURNING id, name, coach_id
),
-- Adicionar atletas aos times
team_assignments AS (
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
    )
  RETURNING team_id, user_id
)
-- Associar treinos aos times correspondentes
INSERT INTO workout_teams (workout_id, team_id)
SELECT 
  w.id,
  t.id
FROM new_workouts w
JOIN new_teams t ON (
  (w.coach_id = (SELECT id FROM new_users WHERE name = 'Carlos Oliveira' AND role = 'coach'::"USER_ROLE") AND t.name = 'Time Performance A')
  OR (w.coach_id = (SELECT id FROM new_users WHERE name = 'Ana Costa' AND role = 'coach'::"USER_ROLE") AND t.name = 'Time Performance B')
  OR (w.coach_id = (SELECT id FROM new_users WHERE name = 'Pedro Lima' AND role = 'coach'::"USER_ROLE") AND t.name = 'Time Iniciantes')
);